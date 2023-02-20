<?php

namespace Kanboard\Plugin\TemplateManager\Model;

use Kanboard\Core\Base;

/**
 * Class Kanboard\Plugin\TemplateManager\Model;
 *
 * Duplicates and extends PredefinedTaskDescriptionModel to include topics feature
 */

class TaskDescriptionTemplateModel extends Base
{
    const TABLE = 'predefined_task_descriptions';

    public function getAll($projectId)
    {
        return $this->db->table(self::TABLE)->eq('project_id', $projectId)->asc('title')->findAll();
    }

    public function getList($projectId)
    {
        return array('' => t('None')) + $this->db->hashtable(self::TABLE)->eq('project_id', $projectId)->getAll('id', 'title', 'topic', 'note', 'instructions');
    }

    public function getById($projectId, $id)
    {
        return $this->db->table(self::TABLE)->eq('project_id', $projectId)->eq('id', $id)->findOne();
    }

    public function getDescriptionById($projectId, $id)
    {
        return $this->db->table(self::TABLE)->eq('project_id', $projectId)->eq('id', $id)->findOneColumn('description');
    }

    public function create($projectId, $title, $description, $topic, $note, $instructions)
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

    public function update($projectId, $id, $title, $description, $topic, $note, $instructions)
    {
        return $this->db->table(self::TABLE)->eq('project_id', $projectId)->eq('id', $id)->update(array(
            'title' => $title,
            'description' => $description,
            'topic' => $topic,
            'note' => $note,
            'instructions' => $instructions,
        ));
    }

    public function remove($projectId, $id)
    {
        return $this->db->table(self::TABLE)->eq('project_id', $projectId)->eq('id', $id)->remove();
    }
}
