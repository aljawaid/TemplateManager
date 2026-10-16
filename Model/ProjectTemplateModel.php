<?php

namespace Kanboard\Plugin\TemplateManager\Model;

use Kanboard\Core\Base;

/**
 * Stores reusable templates that belong to one Kanboard project.
 *
 * Related test: tests/ProjectTemplateModelTest.php
 */
class ProjectTemplateModel extends Base
{
    public const TABLE = 'project_templates';

    public function getAll($projectId)
    {
        return $this->db->table(self::TABLE)
            ->eq('project_id', $projectId)
            ->asc('title')
            ->findAll();
    }

    public function getById($projectId, $templateId)
    {
        return $this->db->table(self::TABLE)
            ->eq('project_id', $projectId)
            ->eq('id', $templateId)
            ->findOne();
    }

    public function createProjectTemplate($projectId, $title, $description, $topic, $note, $instructions)
    {
        return $this->db->table(self::TABLE)->persist(array(
            'project_id' => $projectId,
            'title' => $title,
            'description' => $description,
            'topic' => $topic,
            'note' => $note,
            'instructions' => $instructions,
        ));
    }

    public function updateProjectTemplate($projectId, $templateId, $title, $description, $topic, $note, $instructions)
    {
        return $this->db->table(self::TABLE)
            ->eq('project_id', $projectId)
            ->eq('id', $templateId)
            ->update(array(
                'title' => $title,
                'description' => $description,
                'topic' => $topic,
                'note' => $note,
                'instructions' => $instructions,
            ));
    }

    public function deleteProjectTemplate($projectId, $templateId)
    {
        return $this->db->table(self::TABLE)
            ->eq('project_id', $projectId)
            ->eq('id', $templateId)
            ->remove();
    }
}
