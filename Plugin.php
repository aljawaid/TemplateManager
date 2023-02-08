<?php

namespace Kanboard\Plugin\TemplateManager;

use Kanboard\Core\Plugin\Base;
use Kanboard\Core\Translator;

class Plugin extends Base
{
    public function initialize()
    {
        // Template Override
        //  - Override name should be camelCase e.g. pluginNameExampleCamelCase
        $this->template->setTemplateOverride('project_predefined_content/show', 'templateManager:project_predefined_content/show');
        $this->template->setTemplateOverride('project/sidebar', 'templateManager:project/sidebar');
        $this->template->setTemplateOverride('task_comments/show', 'templateManager:task_comments/show');
        $this->template->setTemplateOverride('task/show', 'templateManager:task/show');

        // CSS - Asset Hook
        //  - Keep filename lowercase
        $this->hook->on('template:layout:css', array('template' => 'plugins/TemplateManager/Assets/css/template-manager.css'));

        // JS - Asset Hook
        //  - Keep filename lowercase
        $this->hook->on('template:layout:js', array('template' => 'plugins/TemplateManager/Assets/js/template-manager.js'));

        // Views - Add Menu Item - Template Hook
        //  - Override name should start lowercase e.g. pluginNameExampleCamelCase
        $this->template->hook->attach('template:project:dropdown', 'templateManager:project_header/dropdown');

        // Extra Page - Routes
        //  - Example: $this->route->addRoute('/my/custom/route', 'MyController', 'show', 'PluginNameExampleStudlyCaps');
        //  - Must have the corresponding action in the matching controller
        $this->route->addRoute('project/:project_id/templates', 'TemplateContentController', 'show', 'TemplateManager');
        $this->route->addRoute('project/:project_id/templates/tasks/add', 'PredefinedTaskDescriptionController', 'create');
        $this->route->addRoute('project/:project_id/templates/tasks/edit/:id', 'PredefinedTaskDescriptionController', 'edit');
        $this->route->addRoute('project/:project_id/templates/tasks/delete/:id', 'PredefinedTaskDescriptionController', 'confirm');
        $this->route->addRoute('project/:project_id/templates/comments/add', 'CommentTemplateController', 'create', 'TemplateManager');
        $this->route->addRoute('project/:project_id/templates/comments/edit/:id', 'CommentTemplateController', 'edit', 'TemplateManager');
        $this->route->addRoute('project/:project_id/templates/comments/delete/:id', 'CommentTemplateController', 'confirm', 'TemplateManager');
    }

    public function onStartup()
    {
        Translator::load($this->languageModel->getCurrentLanguage(), __DIR__.'/Locale');
    }

    public function getClasses()
    {
        return [
            'Plugin\TemplateManager\Model' => [
                'TaskCommentTemplateModel',
            ]
        ];
    }

    public function getPluginName()
    {
        // Plugin Name MUST be identical to namespace for Plugin Directory to detect updated versions
        // Do not translate the plugin name here
        return 'TemplateManager';
    }

    public function getPluginDescription()
    {
        return t('Predefined Contents becomes the new Template Manager. A new interface allows you to create, update and delete new comment templates for each project. This new feature brings task description templates, predefined email subjects and the new comment templates together in one section for each project.');
    }

    public function getPluginAuthor()
    {
        return 'aljawaid';
    }

    public function getPluginVersion()
    {
        return '1.0.0';
    }

    public function getCompatibleVersion()
    {
        // Examples:
        // >=1.0.37
        // <1.0.37
        // <=1.0.37
        return '>=1.2.20';
    }

    public function getPluginHomepage()
    {
        return 'https://github.com/aljawaid/TemplateManager';
    }
}
