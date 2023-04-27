<?php

namespace Kanboard\Plugin\TemplateManager\Schema;

use PDO;

const VERSION = 1;

function version_1(PDO $pdo)
{
    $pdo->exec('CREATE TABLE IF NOT EXISTS comment_templates (
        id SERIAL PRIMARY KEY,
        project_id INTEGER NOT NULL,
        title TEXT NOT NULL,
        topic TEXT,
        description TEXT NOT NULL,
        note TEXT NOT NULL,
        instructions TEXT NOT NULL,
        FOREIGN KEY(project_id) REFERENCES projects(id) ON DELETE CASCADE
        )
    ');

    $pdo->exec('CREATE TABLE IF NOT EXISTS global_templates (
        id SERIAL PRIMARY KEY,
        title TEXT NOT NULL,
        topic TEXT,
        description TEXT NOT NULL,
        note TEXT NOT NULL,
        instructions TEXT NOT NULL
        )
    ');

    $pdo->exec("ALTER TABLE predefined_task_descriptions ADD COLUMN topic TEXT, ADD COLUMN note TEXT, ADD COLUMN instructions TEXT");
}
