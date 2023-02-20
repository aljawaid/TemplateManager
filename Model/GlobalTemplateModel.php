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

    public function getAll()
    {
        return $this->db->table(self::TABLE)->asc('title')->findAll();
    }

    public function getList($global_template)
    {
        return array('' => t('None')) + $this->db->hashtable(self::TABLE)->eq('id', $global_template)->getAll('id', 'title', 'topic', 'note', 'instructions');
    }

    public function getById($global_template)
    {
        return $this->db->table(self::TABLE)->eq('id', $global_template)->findOne();
    }

    public function getDescriptionById($global_template)
    {
        return $this->db->table(self::TABLE)->eq('id', $global_template)->eq('id', $global_template)->findOneColumn('description');
    }

    public function createGlobalTemplate($title, $description, $topic, $note, $instructions)
    {
        return $this->db->table(self::TABLE)->persist(array(
            'title' => $title,
            'description' => $description,
            'topic' => $topic,
            'note' => $note,
            'instructions' => $instructions,
        ));
    }

    public function updateGlobalTemplate($global_template, $title, $description, $topic, $note, $instructions)
    {
        return $this->db->table(self::TABLE)->eq('id', $global_template)->update(array(
            'title' => $title,
            'description' => $description,
            'topic' => $topic,
            'note' => $note,
            'instructions' => $instructions,
        ));
    }

    public function deleteGlobalTemplate($global_template)
    {
        return $this->db->table(self::TABLE)->eq('id', $global_template)->remove();
    }
}
