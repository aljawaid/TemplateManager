<?php

/**
 * Renders a project-scoped template preview.
 */

?>
<div class="modal-page-header template-manager-modal-header">
    <h2>
        <i class="fa fa-folder-open" aria-hidden="true"></i>
        <?= t('Project Template') ?> <span class="modal-template-id">#<?= $this->text->e($template['id']) ?></span>
    </h2>
</div>
<div class="modal-contents template-manager-modal-contents">
    <fieldset id="TemplateView" class="template-view">
        <?php if (!empty($template['topic'])): ?>
            <legend class="template-view-topic"><?= $this->text->e($template['topic']) ?></legend>
        <?php endif ?>
        <h3 class="template-view-title"><?= $this->text->e($template['title']) ?></h3>
        <?php if (!empty($template['note'])): ?>
            <fieldset class="template-view-note">
                <legend><?= t('Note') ?></legend>
                <?= $this->text->markdown($template['note']) ?>
            </fieldset>
        <?php endif ?>
        <?php if (!empty($template['instructions'])): ?>
            <fieldset class="template-view-instructions">
                <legend><?= t('Instructions') ?></legend>
                <?= $this->text->markdown($template['instructions']) ?>
            </fieldset>
        <?php endif ?>
        <fieldset class="template-view-description">
            <legend><?= t('Template') ?></legend>
            <?= $this->text->markdown($template['description']) ?>
        </fieldset>
        <div class="form-actions">
            <a class="btn cancel-btn js-modal-close" href="#"><?= t('Close') ?></a>
        </div>
    </fieldset>
</div>
