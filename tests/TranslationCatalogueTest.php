<?php

/**
 * Verifies complete English coverage for TemplateManager-specific interface strings.
 *
 * Related files: Locale/en_GB/translations.php and Locale/en_US/translations.php.
 */

$requiredTranslations = array(
    'Manage reusable task descriptions, comments, email subjects and project templates in one place. Administrators maintain global guidance for every project, while project managers maintain templates for their own projects.',
    'Project template created successfully',
    'Unable to create this project template',
    'Project template updated successfully',
    'Unable to update this project template',
    'Project template deleted successfully',
    'Unable to delete this project template',
    'Add Project Template',
    'Project Templates',
    'Create Project Template',
    'Edit Project Template',
    'Delete Project Template',
    'Reusable Templates & Actions',
    'Global templates are set by administrators. Project templates are set by project managers.',
    'Copied',
    'Copy failed',
);

foreach (array('en_GB', 'en_US') as $locale) {
    $catalogue = require dirname(__DIR__) . '/Locale/' . $locale . '/translations.php';

    foreach ($requiredTranslations as $source) {
        templateManagerAssertTrue(
            isset($catalogue[$source]) && trim($catalogue[$source]) !== '',
            $locale . ' must translate: ' . $source
        );
    }
}
