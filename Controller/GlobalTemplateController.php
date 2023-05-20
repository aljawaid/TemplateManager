<?php

namespace Kanboard\Plugin\TemplateManager\Controller;

use Kanboard\Controller\BaseController;
use Kanboard\Core\Plugin\Directory;

/**
 * Plugin TemplateManager
 * Class GlobalTemplateController
 * @author aljawaid
 */

class GlobalTemplateController extends \Kanboard\Controller\ConfigController
{
   /**
     * Display the Settings Page
     * Use this function to create a page showing your template content.
     * This function must be checked with 'Views - Add Menu Item - Template Hook' in Plugin.php
     * This function must be checked with 'Extra Page - Routes' in Plugin.php
     * Use: $this->helper->layout->config for config settings menu sidebar
     * Use: $this->helper->layout->plugin for plugin menu sidebar
     * @access public
     */

    public function show(array $values = array(), array $errors = array())
    {
        $global_template = $this->globalTemplateModel->getById($this->request->getIntegerParam('id'));

        $this->response->html($this->helper->layout->config('templateManager:config/global-templates', array(
            'title' => t('Settings') . ' &#10562; Template Manager',
            'values' => empty($values) ? $global_template : $values,
            'errors' => $errors,
            'saved_global_templates' => $this->globalTemplateModel->getAll(),
        )));
    }
}
