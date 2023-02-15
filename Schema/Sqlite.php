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
        FOREIGN KEY(project_id) REFERENCES projects(id) ON DELETE CASCADE,
        PRIMARY KEY(id)
        )
    ');

    $pdo->exec('CREATE TABLE IF NOT EXISTS global_templates (
        id INT NOT NULL AUTO_INCREMENT,
        title TEXT NOT NULL,
        topic TEXT,
        description TEXT NOT NULL,
        PRIMARY KEY(id)
        )
    ');

    $pdo->exec("ALTER TABLE `predefined_task_descriptions` ADD COLUMN `topic` TEXT");
}
