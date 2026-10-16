<?php

namespace Kanboard\Plugin\TemplateManager;

use Kanboard\Core\Plugin\Base;
use Kanboard\Core\Security\Role;
use Kanboard\Core\Translator;

class Plugin extends Base
{
    public function initialize()
    {
        // Global template administration is application-wide and restricted to administrators.
        $this->applicationAccessMap->add('GlobalTemplateController', '*', Role::APP_ADMIN);
        $this->applicationAccessMap->add('GlobalContentController', '*', Role::APP_ADMIN);

        // Project template catalogues are managed by project managers and read from task views by project viewers.
        $this->projectAccessMap->add('TemplateContentController', '*', Role::PROJECT_MANAGER);
        $this->projectAccessMap->add('TaskDescriptionTemplateController', '*', Role::PROJECT_VIEWER);
        $this->projectAccessMap->add(
            'TaskDescriptionTemplateController',
            array('create', 'save', 'edit', 'update', 'confirm', 'remove'),
            Role::PROJECT_MANAGER
        );
        $this->projectAccessMap->add('CommentTemplateController', '*', Role::PROJECT_VIEWER);
        $this->projectAccessMap->add(
            'CommentTemplateController',
            array('create', 'save', 'edit', 'update', 'confirm', 'remove'),
            Role::PROJECT_MANAGER
        );
        $this->projectAccessMap->add('ProjectTemplateController', '*', Role::PROJECT_VIEWER);
        $this->projectAccessMap->add(
            'ProjectTemplateController',
            array('create', 'save', 'edit', 'update', 'confirm', 'remove'),
            Role::PROJECT_MANAGER
        );

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
        $this->hook->on('template:layout:js', array('template' => 'plugins/TemplateManager/Assets/js/template-manager.js'));

        // Views - Add Menu Item - Template Hook
        //  - Override name should start lowercase e.g. pluginNameExampleCamelCase
        $this->template->hook->attach('template:project:dropdown', 'templateManager:project_header/dropdown');
        $this->template->hook->attach('template:task:show:before-comments', 'templateManager:task/global-templates');
        $this->template->hook->attach('template:config:sidebar', 'templateManager:config/sidebar');
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
        $this->route->addRoute('project/:project_id/templates/project/add', 'ProjectTemplateController', 'create', 'TemplateManager');
        $this->route->addRoute('project/:project_id/templates/project/view/:id', 'ProjectTemplateController', 'viewTemplate', 'TemplateManager');
        $this->route->addRoute('project/:project_id/templates/project/edit/:id', 'ProjectTemplateController', 'edit', 'TemplateManager');
        $this->route->addRoute('project/:project_id/templates/project/delete/:id', 'ProjectTemplateController', 'confirm', 'TemplateManager');
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
        // Load a complete English fallback before applying an available locale override.
        Translator::load('en_US', __DIR__ . '/Locale');

        $language = $this->languageModel->getCurrentLanguage();
        if ($language !== 'en_US') {
            Translator::load($language, __DIR__ . '/Locale');
        }
    }

    public function getClasses()
    {
        return [
            'Plugin\TemplateManager\Model' => [
                'TaskCommentTemplateModel', 'GlobalTemplateModel', 'ProjectTemplateModel', 'TaskDescriptionTemplateModel',
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
        return t('Manage reusable task descriptions, comments, email subjects and project templates in one place. Administrators maintain global guidance for every project, while project managers maintain templates for their own projects.');
    }

    public function getPluginAuthor()
    {
        return 'aljawaid';
    }

    public function getPluginVersion()
    {
        return '3.0.0';
    }

    public function getCompatibleVersion()
    {
        // The compatibility workflow and focused regression suite run against this baseline.
        return '>=1.2.54';
    }

    public function getPluginHomepage()
    {
        return 'https://github.com/aljawaid/TemplateManager';
    }
}
