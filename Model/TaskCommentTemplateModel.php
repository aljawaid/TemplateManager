<?php

namespace Kanboard\Plugin\TemplateManager\Model;

use Kanboard\Core\Base;

/**
 * Class Kanboard\Plugin\TemplateManager\Model;
 *
 * @author aljawaid
 */

class TaskCommentTemplateModel extends Base
{
    /**
     * SQL table name for comment templates
     *
     * @var string
     */

    const TABLE = 'comment_templates';

    public function getAll($projectId)
    {
        return $this->db->table(self::TABLE)->eq('project_id', $projectId)->findAll();
    }

    public function getList($projectId)
    {
        return array('' => t('None')) + $this->db->hashtable(self::TABLE)->eq('project_id', $projectId)->getAll('id', 'title');
    }

    public function getByProjectId($projectId, $id)
    {
        return $this->db->table(self::TABLE)->eq('project_id', $projectId)->eq('id', $id)->findOne();
    }

    public function getDescriptionByProjectId($projectId, $id)
    {
        return $this->db->table(self::TABLE)->eq('project_id', $projectId)->eq('id', $id)->findOneColumn('description');
    }

    public function createCommentTemplate($projectId, $title, $description, $topic)
    {
        return $this->db->table(self::TABLE)->persist(array(
            'project_id' => $projectId,
            'title' => $title,
            'description' => $description,
            'topic' => $topic,
        ));
    }

    public function updateCommentTemplate($projectId, $id, $title, $description, $topic)
    {
        return $this->db->table(self::TABLE)->eq('project_id', $projectId)->eq('id', $id)->update(array(
            'title' => $title,
            'description' => $description,
            'topic' => $topic,
        ));
    }

    public function deleteCommentTemplate($projectId, $id)
    {
        return $this->db->table(self::TABLE)->eq('project_id', $projectId)->eq('id', $id)->remove();
    }
}
