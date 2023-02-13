<?php

namespace Kanboard\Plugin\TemplateManager\Model;

use Kanboard\Core\Base;

/**
 * Class Kanboard\Plugin\TemplateManager\Model;
 *
 * @author aljawaid
 */

class GlobalTemplateModel extends Base
{
    /**
     * SQL table name for comment templates
     *
     * @var string
     */

    const TABLE = 'global_templates';

    public function getAll($id)
    {
        return $this->db->table(self::TABLE)->eq('id', $id)->findAll();
    }

    public function getList($id)
    {
        return array('' => t('None')) + $this->db->hashtable(self::TABLE)->eq('id', $id)->getAll('id', 'title');
    }

    public function getById($id, $id)
    {
        return $this->db->table(self::TABLE)->eq('id', $id)->eq('id', $id)->findOne();
    }

    public function getDescriptionById($id, $id)
    {
        return $this->db->table(self::TABLE)->eq('id', $id)->eq('id', $id)->findOneColumn('description');
    }

    public function createGlobalTemplate($title, $description, $topic)
    {
        return $this->db->table(self::TABLE)->persist(array(
            'title' => $title,
            'description' => $description,
            'topic' => $topic,
        ));
    }

    public function updateGlobalTemplate($id, $title, $description, $topic)
    {
        return $this->db->table(self::TABLE)->eq('project_id', $projectId)->eq('id', $id)->update(array(
            'title' => $title,
            'description' => $description,
            'topic' => $topic,
        ));
    }

    public function deleteGlobalTemplate($id)
    {
        return $this->db->table(self::TABLE)->eq('id', $id)->eq('id', $id)->remove();
    }
}
