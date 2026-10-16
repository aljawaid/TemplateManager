<?php

/**
 * Verifies project template isolation, CRUD behaviour and global-template independence.
 *
 * Related file: Model/ProjectTemplateModel.php.
 */

$firstProjectId = $container['projectModel']->create(array('name' => 'Template project one'));
$secondProjectId = $container['projectModel']->create(array('name' => 'Template project two'));

templateManagerAssertTrue($firstProjectId > 0, 'The first fixture project must be created.');
templateManagerAssertTrue($secondProjectId > 0, 'The second fixture project must be created.');

$globalTemplateId = $container['globalTemplateModel']->createGlobalTemplate(
    'Application guidance',
    'This remains available application-wide.',
    'Guidance',
    'Administrator managed.',
    'Use where applicable.'
);
templateManagerAssertTrue($globalTemplateId > 0, 'The global template fixture must be created.');

$templateId = $container['projectTemplateModel']->createProjectTemplate(
    $firstProjectId,
    'Customer follow-up',
    'Contact the customer with the agreed update.',
    'Customer care',
    'Use after reviewing the task history.',
    'Replace the bracketed details before using this template.'
);

templateManagerAssertTrue($templateId > 0, 'A project template must be created.');
templateManagerAssertSame(1, count($container['projectTemplateModel']->getAll($firstProjectId)), 'The owning project must see its template.');
templateManagerAssertSame(0, count($container['projectTemplateModel']->getAll($secondProjectId)), 'Other projects must not see the template.');
templateManagerAssertSame(null, $container['projectTemplateModel']->getById($secondProjectId, $templateId), 'Cross-project lookup must fail closed.');

$updated = $container['projectTemplateModel']->updateProjectTemplate(
    $firstProjectId,
    $templateId,
    'Customer progress update',
    'Contact the customer with the latest agreed update.',
    'Customer care',
    'Use after reviewing the full task history.',
    'Replace the bracketed details before using this template.'
);

templateManagerAssertTrue($updated, 'The owning project must be able to update its template.');
templateManagerAssertSame(
    'Customer progress update',
    $container['projectTemplateModel']->getById($firstProjectId, $templateId)['title'],
    'The updated project template title must be persisted.'
);
templateManagerAssertSame(1, count($container['globalTemplateModel']->getAll()), 'Project templates must not alter the global template catalogue.');
templateManagerAssertSame(
    'Application guidance',
    $container['globalTemplateModel']->getById($globalTemplateId)['title'],
    'The global template record must remain unchanged.'
);

$container['projectModel']->remove($firstProjectId);
templateManagerAssertSame(0, count($container['projectTemplateModel']->getAll($firstProjectId)), 'Deleting a project must cascade to its templates.');
