<?php

namespace Kanboard\Plugin\TemplateManager\Schema;

use PDO;

const VERSION = 2;

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

function version_2(PDO $pdo)
{
    // Store project-managed templates separately so existing global templates remain application-wide.
    $pdo->exec('CREATE TABLE IF NOT EXISTS project_templates (
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

    // Keep project-scoped template lookups efficient as installations grow.
    $pdo->exec('CREATE INDEX IF NOT EXISTS project_templates_project_id_idx ON project_templates(project_id)');
}
