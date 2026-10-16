<?php

/**
 * Renders the project template editing modal for project managers.
 */

?>
<div class="modal-page-header template-manager-modal-header">
    <h2>
        <i class="fa fa-folder-open" aria-hidden="true"></i>
        <?= t('Edit Project Template') ?> <span class="modal-template-id">#<?= $this->text->e($template['id']) ?></span>
    </h2>
</div>
<div class="modal-contents template-manager-modal-contents">
    <p class="template-scope-help">
        <?= t('This template is available only in this project. Global templates remain controlled by administrators.') ?>
    </p>
    <form id="TemplateForm" class="template-form" method="post" action="<?= $this->url->href('ProjectTemplateController', 'update', array('project_id' => $project['id'], 'id' => $template['id'], 'plugin' => 'TemplateManager')) ?>" autocomplete="on">
        <?= $this->form->csrf() ?>

        <div class="template-form-grid">
            <div class="template-form-field">
                <?= $this->form->label(t('Title'), 'title') ?>
                <?= $this->form->text('title', $values, $errors, array('autofocus', 'required', 'tabindex="1"', 'placeholder="' . t('My Template Title') . '"')) ?>
            </div>
            <div class="template-form-field">
                <?= $this->form->label(t('Topic'), 'topic') ?>
                <?= $this->form->text('topic', $values, array(), array('tabindex="2"', 'placeholder="' . t('e.g. General') . '"')) ?>
                <p class="form-help"><?= t('Topics can help group and label similar templates') ?></p>
            </div>
            <div class="template-form-field">
                <?= $this->form->label(t('Note'), 'note') ?>
                <?= $this->form->text('note', $values, array(), array('tabindex="3"', 'placeholder="' . t('This note has specific instructions') . '"')) ?>
                <p class="form-help"><?= t('Add a short note to describe this template') ?></p>
            </div>
        </div>

        <div class="text-editor-wrapper relative">
            <?= $this->form->label(t('Instructions'), 'instructions') ?>
            <?= $this->form->textEditor('instructions', $values, array(), array('tabindex' => 4)) ?>
            <p class="form-help"><?= t('Add some useful instructions on how to use this template') ?></p>
        </div>

        <div class="text-editor-wrapper relative">
            <?= $this->form->label(t('Template Content'), 'description') ?>
            <?= $this->form->textEditor('description', $values, $errors, array('tabindex' => 5)) ?>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn create-btn" title="<?= t('Saves any changes made on this page') ?>"><i class="fa fa-save" aria-hidden="true"></i> <?= t('Save') ?></button>
            <a class="btn cancel-btn js-modal-close" href="#"><?= t('Cancel') ?></a>
            <button type="reset" class="btn reset-btn" title="<?= t('Clear any changes made on this page') ?>"><?= t('Reset') ?></button>
        </div>
    </form>
</div>
