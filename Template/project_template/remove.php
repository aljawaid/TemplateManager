<?php

/**
 * Renders the project template deletion confirmation.
 */

?>
<div class="modal-page-header template-manager-modal-header">
    <h2>
        <i class="fa fa-folder-open" aria-hidden="true"></i>
        <?= t('Delete Project Template') ?> <span class="modal-template-id">#<?= $this->text->e($template['id']) ?></span>
    </h2>
</div>
<div id="DeleteModal" class="modal-contents template-manager-modal-contents">
    <div class="confirm">
        <p class="confirm-notice"><?= t('Confirm that you want to delete this project template.') ?></p>
        <div class="template-contents">
            <div class="template-title">
                <?= $this->text->e($template['title']) ?>
                <?php if (!empty($template['topic'])): ?>
                    (<?= $this->text->e($template['topic']) ?>)
                <?php endif ?>
            </div>
            <?= $this->text->markdown($template['description']) ?>
        </div>
        <?= $this->modal->confirmButtons(
            'ProjectTemplateController',
            'remove',
            array('project_id' => $project['id'], 'id' => $template['id'], 'plugin' => 'TemplateManager'),
            t('Delete')
        ) ?>
    </div>
</div>
