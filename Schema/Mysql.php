<?php

namespace Kanboard\Plugin\TemplateManager\Schema;

use PDO;

const VERSION = 1;

function version_1(PDO $pdo)
{
    $pdo->exec('CREATE TABLE IF NOT EXISTS comment_templates (
        id INT NOT NULL AUTO_INCREMENT,
        project_id INT NOT NULL,
        topic TEXT,
        title TEXT NOT NULL,
        description TEXT NOT NULL,
        FOREIGN KEY(project_id) REFERENCES projects(id) ON DELETE CASCADE,
        PRIMARY KEY(id)
    ) COMMENT "Template Manager plugin table" ENGINE = InnoDB CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;');
}
