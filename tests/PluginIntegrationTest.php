<?php

/**
 * Verifies TemplateManager metadata and model registration against Kanboard.
 *
 * Related file: Plugin.php.
 */

$plugin = $loadedPlugins['TemplateManager'];

templateManagerAssertSame('3.0.2', $plugin->getPluginVersion(), 'The theme-aware dual-scope feature set must expose version 3.0.2.');
templateManagerAssertSame('>=1.2.54', $plugin->getCompatibleVersion(), 'Compatibility must match the tested Kanboard baseline.');
templateManagerAssertTrue(isset($container['projectTemplateModel']), 'The project template model must be registered.');

$pluginSource = file_get_contents(dirname(__DIR__) . '/Plugin.php');
templateManagerAssertNotContains(
    'clipboard-v2.0.11.min.js',
    $pluginSource,
    'The retired ClipboardJS bundle must not be loaded.'
);
