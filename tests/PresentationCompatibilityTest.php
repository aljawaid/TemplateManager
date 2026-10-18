<?php

/**
 * Verifies responsive, theme-aware and privacy-preserving interface contracts.
 *
 * Related files: Assets/css/template-manager.css, Assets/js/template-manager.js,
 * Template/config/global-templates.php, Template/task/global-templates.php and
 * Template/project_predefined_content/show.php.
 */

$root = dirname(__DIR__);
$stylesheet = file_get_contents($root . '/Assets/css/template-manager.css');
$javascript = file_get_contents($root . '/Assets/js/template-manager.js');
$globalCatalogue = file_get_contents($root . '/Template/config/global-templates.php');
$taskCatalogue = file_get_contents($root . '/Template/task/global-templates.php');
$projectCatalogue = file_get_contents($root . '/Template/project_predefined_content/show.php');
$projectDropdown = file_get_contents($root . '/Template/project_header/dropdown.php');
$taskComments = file_get_contents($root . '/Template/task_comments/show.php');

$presentationContracts = array(
    '@media screen and (max-width: 780px)',
    '@media (prefers-reduced-motion: reduce)',
    '--tm-transition: 160ms ease-in-out',
    '--tm-surface: var(--body-background-color)',
    '--tm-text: var(--color-primary)',
    '--tm-muted: var(--color-primary)',
    '.template-form-grid',
    '.template-table-wrap',
);

foreach ($presentationContracts as $contract) {
    templateManagerAssertContains($contract, $stylesheet, 'The presentation contract is incomplete.');
}

templateManagerAssertNotContains('light-dark(', $stylesheet, 'Theme colours must follow Kanboard rather than the operating-system preference.');
templateManagerAssertNotContains('color-scheme: light dark', $stylesheet, 'The plug-in must not override Kanboard\'s selected colour scheme.');
templateManagerAssertContains('navigator.clipboard.writeText(text)', $javascript, 'Modern clipboard support must be used.');
templateManagerAssertContains("document.execCommand('copy')", $javascript, 'A clipboard fallback must remain available.');
templateManagerAssertNotContains('console.', $javascript, 'Template content must never be written to browser logs.');
templateManagerAssertNotContains('ClipboardJS', $javascript, 'The bundled clipboard dependency must not be required.');
templateManagerAssertContains('class="template-table-wrap"', $globalCatalogue, 'The global catalogue must contain wide tables on narrow viewports.');
templateManagerAssertContains('type="button" class="copy-global-template', $taskCatalogue, 'Copy controls must be accessible buttons.');
templateManagerAssertContains("projectTemplateModel->getAll(\$task['project_id'])", $taskCatalogue, 'Task pages must load project-scoped templates.');
templateManagerAssertContains("configModel->get('global_templates', '') === 'enable'", $taskCatalogue, 'The global visibility setting must not hide project templates.');
templateManagerAssertContains('$this->user->isAdmin()', $projectCatalogue, 'Global template administration links must remain administrator-only.');
templateManagerAssertNotContains('id="ViewDescTemplate"', $projectCatalogue, 'Repeated table actions must not reuse HTML IDs.');
templateManagerAssertNotContains('id="EditCommentTemplate"', $projectCatalogue, 'Repeated table actions must not reuse HTML IDs.');
templateManagerAssertContains('projectTemplateModel->getAll', $projectDropdown, 'The project shortcut count must include project templates.');
templateManagerAssertContains('button type="button"', $taskComments, 'Comment template copy controls must support keyboard interaction.');

$presentationProjectId = $container['projectModel']->create(array('name' => 'Presentation fixture'));
$container['projectTemplateModel']->createProjectTemplate(
    $presentationProjectId,
    'Project-only guidance',
    'Visible even when global templates are disabled.',
    'Guidance',
    'Project scoped.',
    'Use for this project.'
);
$container['configModel']->save(array('global_templates' => 'disable'));
$renderedCatalogue = $container['template']->render('templateManager:task/global-templates', array(
    'task' => array('project_id' => $presentationProjectId),
));

templateManagerAssertContains('Project-only guidance', $renderedCatalogue, 'Project templates must render when global templates are disabled.');
templateManagerAssertNotContains('ClipboardJS', $renderedCatalogue, 'Rendered task catalogues must not depend on ClipboardJS.');
