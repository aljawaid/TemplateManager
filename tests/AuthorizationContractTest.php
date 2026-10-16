<?php

/**
 * Verifies global administrator and project-manager template boundaries.
 *
 * Related files: Plugin.php and controllers under Controller/.
 */

use Kanboard\Core\Security\Role;

$pluginSource = file_get_contents(dirname(__DIR__) . '/Plugin.php');
$globalController = file_get_contents(dirname(__DIR__) . '/Controller/GlobalContentController.php');
$projectController = file_get_contents(dirname(__DIR__) . '/Controller/ProjectTemplateController.php');

$accessContracts = array(
    "applicationAccessMap->add('GlobalTemplateController', '*', Role::APP_ADMIN)",
    "applicationAccessMap->add('GlobalContentController', '*', Role::APP_ADMIN)",
    "projectAccessMap->add('TemplateContentController', '*', Role::PROJECT_MANAGER)",
    "projectAccessMap->add('ProjectTemplateController', '*', Role::PROJECT_VIEWER)",
    "array('create', 'save', 'edit', 'update', 'confirm', 'remove')",
);

foreach ($accessContracts as $contract) {
    templateManagerAssertContains($contract, $pluginSource, 'A required role boundary is missing.');
}

templateManagerAssertContains(
    'if (!$this->userSession->isAdmin())',
    $globalController,
    'Global template mutations must retain an explicit administrator guard.'
);
templateManagerAssertContains(
    "->eq('project_id', \$projectId)",
    file_get_contents(dirname(__DIR__) . '/Model/ProjectTemplateModel.php'),
    'Project template operations must always be scoped by project_id.'
);
templateManagerAssertContains(
    '$template = $this->getTemplate($project[\'id\']);',
    $projectController,
    'Project template mutations must load records through the scoped lookup.'
);

templateManagerAssertTrue(
    in_array(Role::APP_ADMIN, $container['applicationAccessMap']->getRoles('GlobalContentController', 'save'), true),
    'Global template writes must require an application administrator at runtime.'
);
templateManagerAssertTrue(
    in_array(Role::PROJECT_MANAGER, $container['projectAccessMap']->getRoles('ProjectTemplateController', 'save'), true),
    'Project template writes must require a project manager at runtime.'
);
templateManagerAssertTrue(
    in_array(Role::PROJECT_VIEWER, $container['projectAccessMap']->getRoles('ProjectTemplateController', 'viewTemplate'), true),
    'Project viewers must be allowed to preview project templates.'
);
