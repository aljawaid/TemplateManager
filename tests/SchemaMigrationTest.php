<?php

/**
 * Verifies TemplateManager's SQLite schema for fresh installations and upgrades.
 *
 * Related files: Schema/Sqlite.php and Model/ProjectTemplateModel.php.
 */

$projectColumns = $container['db']->getConnection()->query('PRAGMA table_info(project_templates)')->fetchAll(PDO::FETCH_ASSOC);
$projectColumnNames = array_column($projectColumns, 'name');

templateManagerAssertSame(
    array('id', 'project_id', 'title', 'topic', 'description', 'note', 'instructions'),
    $projectColumnNames,
    'The project template table must expose the complete template contract.'
);

$globalColumns = $container['db']->getConnection()->query('PRAGMA table_info(global_templates)')->fetchAll(PDO::FETCH_ASSOC);
$globalColumnNames = array_column($globalColumns, 'name');

templateManagerAssertFalse(
    in_array('project_id', $globalColumnNames, true),
    'Existing global templates must remain application-wide.'
);

$indexes = $container['db']->getConnection()->query('PRAGMA index_list(project_templates)')->fetchAll(PDO::FETCH_ASSOC);
templateManagerAssertTrue(
    in_array('project_templates_project_id_idx', array_column($indexes, 'name'), true),
    'Project template lookups must have a project_id index.'
);

$foreignKeys = $container['db']->getConnection()->query('PRAGMA foreign_key_list(project_templates)')->fetchAll(PDO::FETCH_ASSOC);
$projectForeignKey = array_values(array_filter($foreignKeys, function (array $foreignKey) {
    return $foreignKey['from'] === 'project_id' && $foreignKey['table'] === 'projects';
}));

templateManagerAssertSame(1, count($projectForeignKey), 'Project templates must reference the projects table.');
templateManagerAssertSame('CASCADE', $projectForeignKey[0]['on_delete'], 'Project deletion must remove its templates.');

// Model a version 1 installation to verify that the additive upgrade preserves global content.
$upgradeDatabase = new PDO('sqlite::memory:');
$upgradeDatabase->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$upgradeDatabase->exec('PRAGMA foreign_keys = ON');
$upgradeDatabase->exec('CREATE TABLE projects (id INTEGER PRIMARY KEY, name TEXT NOT NULL)');
$upgradeDatabase->exec('CREATE TABLE global_templates (
    id INTEGER PRIMARY KEY,
    title TEXT NOT NULL,
    topic TEXT,
    description TEXT NOT NULL,
    note TEXT NOT NULL,
    instructions TEXT NOT NULL
)');
$upgradeDatabase->exec("INSERT INTO global_templates (title, topic, description, note, instructions)
    VALUES ('Upgrade fixture', 'Upgrade', 'Preserve this application-wide content.', 'Fixture', 'No action required.')");

\Kanboard\Plugin\TemplateManager\Schema\version_2($upgradeDatabase);

$preservedTitle = $upgradeDatabase->query('SELECT title FROM global_templates WHERE id = 1')->fetchColumn();
$upgradeProjectColumns = $upgradeDatabase->query('PRAGMA table_info(project_templates)')->fetchAll(PDO::FETCH_ASSOC);
templateManagerAssertSame('Upgrade fixture', $preservedTitle, 'The version 2 upgrade must preserve existing global templates.');
templateManagerAssertTrue(
    in_array('project_id', array_column($upgradeProjectColumns, 'name'), true),
    'The version 2 upgrade must add project template storage.'
);
