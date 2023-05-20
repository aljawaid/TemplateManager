<?php // phpcs:disable PSR12.Files.FileHeader.SpacingAfterBlock
$taskTemplatesCount = $this->task->taskDescriptionTemplateModel->getAll($project['id']);
$taskTemplatesCountTotal = count($taskTemplatesCount);
$commentTemplatesCount = $this->task->taskCommentTemplateModel->getAll($project['id']);
$commentTemplatesCountTotal = count($commentTemplatesCount);
$emailSubjectsCount = (!empty($project['predefined_email_subjects']) && !is_null($project['predefined_email_subjects'])) ? count(explode("\r\n", trim($project['predefined_email_subjects']))) : 0;
$allTemplatesCount = ($taskTemplatesCountTotal + $commentTemplatesCountTotal + $emailSubjectsCount);
// phpcs:enable
?>

<li <?= $this->app->checkMenuSelection('TemplateContentController') ?>>
    <?= $this->url->link('
        <svg width="20px" height="20px" class="template-manager-icon" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <g stroke-width="0"/>
            <g stroke-linecap="round" stroke-linejoin="round"/>
            <g>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M3 3V9H21V3H3ZM19 5H5V7H19V5Z" fill="#000000"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M3 11V21H11V11H3ZM9 13H5V19H9V13Z" fill="#000000"/>
                <path d="M21 11H13V13H21V11Z" fill="#0DB388"/>
                <path d="M13 15H21V17H13V15Z" fill="#0DB388"/>
                <path d="M21 19H13V21H21V19Z" fill="#0DB388"/>
            </g>
        </svg>' . t('Template Manager') . '<span class="templates-menu-count">' . $allTemplatesCount . '</span>', 'TemplateContentController', 'show', array('project_id' => $project['id'], 'plugin' => 'TemplateManager'), false, 'template-manager-menu') ?>
</li>
