<?php

namespace Kanboard\Plugin\TemplateManager\Schema;

use PDO;

const VERSION = 1;

function version_1(PDO $pdo)
{
    $pdo->exec('CREATE TABLE IF NOT EXISTS comment_templates (
        id INT NOT NULL AUTO_INCREMENT,
        project_id INT NOT NULL,
        title TEXT NOT NULL,
        topic TEXT,
        description TEXT NOT NULL,
        note TEXT NOT NULL,
        instructions TEXT NOT NULL,
        FOREIGN KEY(project_id) REFERENCES projects(id) ON DELETE CASCADE,
        PRIMARY KEY(id)
    ) COMMENT "Template Manager plugin table" ENGINE = InnoDB CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;');

    $pdo->exec('CREATE TABLE IF NOT EXISTS global_templates (
        id INT NOT NULL AUTO_INCREMENT,
        title TEXT NOT NULL,
        topic TEXT,
        description TEXT NOT NULL,
        note TEXT NOT NULL,
        instructions TEXT NOT NULL,
        PRIMARY KEY(id)
    ) COMMENT "Template Manager plugin table" ENGINE = InnoDB CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;');

    /* IF THE PLUGIN IS NOT INSTALLING, DELETE IF THIS COLUMN EXISTS */
    $pdo->exec('ALTER TABLE `predefined_task_descriptions` ADD COLUMN `topic` TEXT, ADD COLUMN `note` TEXT, ADD COLUMN `instructions` TEXT');
}
