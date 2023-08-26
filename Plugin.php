<?php

namespace Kanboard\Plugin\TemplateManager;

use Kanboard\Core\Plugin\Base;
use Kanboard\Core\Translator;

class Plugin extends Base
{
    public function initialize()
    {
        // Layout - Template Hook - Override name should start lowercase e.g. pluginNameExampleCamelCase
        $this->template->hook->attach('template:config:application', 'templateManager:config/settings');

        // Template Override
        //  - Override name should be camelCase e.g. pluginNameExampleCamelCase
        $this->template->setTemplateOverride('project_predefined_content/show', 'templateManager:project_predefined_content/show');
        $this->template->setTemplateOverride('project/sidebar', 'templateManager:project/sidebar');
        $this->template->setTemplateOverride('task_comments/show', 'templateManager:task_comments/show');
        $this->template->setTemplateOverride('task/show', 'templateManager:task/show');

        // CSS - Asset Hook
        //  - Keep filename lowercase
        $this->hook->on('template:layout:css', array('template' => 'plugins/TemplateManager/Assets/css/template-manager.css'));
        $this->hook->on('template:layout:css', array('template' => 'plugins/TemplateManager/Assets/css/tooltips.css'));

        // JS - Asset Hook
        //  - Keep filename lowercase
        if (!file_exists('plugins/Glancer') || !file_exists('plugins/PluginManager')) {
            $this->hook->on('template:layout:js', array('template' => 'plugins/TemplateManager/Assets/js/clipboard-v2.0.11.min.js'));
        }
        $this->hook->on('template:layout:js', array('template' => 'plugins/TemplateManager/Assets/js/template-manager.js'));

        // Views - Add Menu Item - Template Hook
        //  - Override name should start lowercase e.g. pluginNameExampleCamelCase
        $this->template->hook->attach('template:project:dropdown', 'templateManager:project_header/dropdown');
        if ($this->configModel->get('global_templates', '') == 'enable') {
            $this->template->hook->attach('template:task:show:before-comments', 'templateManager:task/global-templates');
            $this->template->hook->attach('template:config:sidebar', 'templateManager:config/sidebar');
        }
        if (!file_exists('plugins/Group_assign') && !file_exists('plugins/TemplateTitle')) {
            $this->template->hook->attach('template:task:form:first-column', 'templateManager:task_creation_modification/show');
        } elseif (file_exists('plugins/Group_assign') && !file_exists('plugins/TemplateTitle')) {
            $this->template->hook->attach('template:task:form:first-column', 'templateManager:task_creation_modification/show');
        }

        // Extra Page - Routes
        //  - Example: $this->route->addRoute('/my/custom/route', 'MyController', 'show', 'PluginNameExampleStudlyCaps');
        //  - Must have the corresponding action in the matching controller
        $this->route->addRoute('project/:project_id/templates', 'TemplateContentController', 'show', 'TemplateManager');
        $this->route->addRoute('project/:project_id/templates/tasks/add', 'TaskDescriptionTemplateController', 'create', 'TemplateManager');
        $this->route->addRoute('project/:project_id/templates/tasks/view/:id', 'TaskDescriptionTemplateController', 'viewTemplate', 'TemplateManager');
        $this->route->addRoute('project/:project_id/templates/tasks/edit/:id', 'TaskDescriptionTemplateController', 'edit', 'TemplateManager');
        $this->route->addRoute('project/:project_id/templates/tasks/delete/:id', 'TaskDescriptionTemplateController', 'confirm', 'TemplateManager');
        $this->route->addRoute('project/:project_id/templates/comments/add', 'CommentTemplateController', 'create', 'TemplateManager');
        $this->route->addRoute('project/:project_id/templates/comments/view/:id', 'CommentTemplateController', 'viewTemplate', 'TemplateManager');
        $this->route->addRoute('project/:project_id/templates/comments/edit/:id', 'CommentTemplateController', 'edit', 'TemplateManager');
        $this->route->addRoute('project/:project_id/templates/comments/delete/:id', 'CommentTemplateController', 'confirm', 'TemplateManager');
        $this->route->addRoute('/settings/global-templates', 'GlobalTemplateController', 'show', 'TemplateManager');
        $this->route->addRoute('/settings/global-templates/add', 'GlobalContentController', 'create', 'TemplateManager');
        $this->route->addRoute('/settings/global-templates/view/:id', 'GlobalContentController', 'viewTemplate', 'TemplateManager');
        $this->route->addRoute('/settings/global-templates/edit/:id', 'GlobalContentController', 'edit', 'TemplateManager');
        $this->route->addRoute('/settings/global-templates/delete/:id', 'GlobalContentController', 'confirm', 'TemplateManager');

        // Helper
        //  - Example: $this->helper->register('helperClassNameCamelCase', '\Kanboard\Plugin\PluginNameExampleStudlyCaps\Helper\HelperNameExampleStudlyCaps');
        //  - Add each Helper in the 'use' section at the top of this file
        $this->helper->register('templateTitleHelper', '\Kanboard\Plugin\TemplateManager\Helper\TemplateTitleHelper');
    }

    public function onStartup()
    {
        Translator::load($this->languageModel->getCurrentLanguage(), __DIR__ . '/Locale');
    }

    public function getClasses()
    {
        return [
            'Plugin\TemplateManager\Model' => [
                'TaskCommentTemplateModel', 'GlobalTemplateModel', 'TaskDescriptionTemplateModel',
            ],
        ];
    }

    public function getPluginName()
    {
        // Plugin Name MUST be identical to namespace for Plugin Directory to detect updated versions - do not translate the plugin name here
        return 'TemplateManager';
    }

    public function getPluginDescription()
    {
        return t('Speed through your tasks replacing Predefined Contents with the new Template Manager. Users can impove consistency of project data whilst saving time creating repetitive comments using saved templates. Project Editors can easily manage their template content for each project. Templates can be created for task descriptions (core feature), comments (new feature), global templates (new feature) and email subjects (core feature) all in one place including adding notes and instructions separate to the template content to help keep content neat. The global templates feature displays for every project and can be used as a way to guide and advise users within tasks. Templates can also be useful in environments where auditing or standardization is required.');
    }

    public function getPluginAuthor()
    {
        return 'aljawaid';
    }

    public function getPluginVersion()
    {
        return '2.9.0';
    }

    public function getCompatibleVersion()
    {
        // Examples: '>=1.0.37' '<1.0.37' '<=1.0.37'
        // Tested on KB v1.2.20 upto plugin v2.7.0, then KB v1.2.32+
        return '>=1.2.20';
    }

    public function getPluginHomepage()
    {
        return 'https://github.com/aljawaid/TemplateManager';
    }
}
