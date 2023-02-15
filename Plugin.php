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
        $this->template->setTemplateOverride('predefined_task_description/create', 'templateManager:predefined_task_description/create');
        $this->template->setTemplateOverride('predefined_task_description/edit', 'templateManager:predefined_task_description/edit');
        $this->template->setTemplateOverride('predefined_task_description/remove', 'templateManager:predefined_task_description/remove');

        // CSS - Asset Hook
        //  - Keep filename lowercase
        $this->hook->on('template:layout:css', array('template' => 'plugins/TemplateManager/Assets/css/template-manager.css'));

        // JS - Asset Hook
        //  - Keep filename lowercase
        if (!file_exists('plugins/Glancer')) {
            $this->hook->on('template:layout:js', array('template' => 'plugins/TemplateManager/Assets/js/clipboard-v2.0.11.min.js'));
        }
        $this->hook->on('template:layout:js', array('template' => 'plugins/TemplateManager/Assets/js/template-manager.js'));

        // Views - Add Menu Item - Template Hook
        //  - Override name should start lowercase e.g. pluginNameExampleCamelCase
        $this->template->hook->attach('template:project:dropdown', 'templateManager:project_header/dropdown');
        $this->template->hook->attach('template:task:show:before-comments', 'templateManager:task/global-templates');
        $this->template->hook->attach('template:config:sidebar', 'templateManager:config/sidebar');

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
        $this->route->addRoute('/settings/global-templates', 'GlobalTemplateController', 'show', 'TemplateManager');
    }

    public function onStartup()
    {
        Translator::load($this->languageModel->getCurrentLanguage(), __DIR__.'/Locale');
    }

    public function getClasses()
    {
        return [
            'Plugin\TemplateManager\Model' => [
                'TaskCommentTemplateModel', 'GlobalTemplateModel',
            ],
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
        return t('Predefined Contents is replaced by the Template Manager. Save templates in this new interface improving consistency and content formatting of your project data. Project Editors can create, update and delete templates for each project. Templates can be created for task descriptions (core feature), comments (new feature), global templates (new feature) and email subjects (core feature) all in one place. The Global Templates feature shows for every project and can be used as a way to guide and advise users within tasks.  Templates can also be useful in environments where auditing is required.');
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
