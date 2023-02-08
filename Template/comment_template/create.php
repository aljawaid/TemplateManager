<div class="page-header">
    <h2><?= t('Create Comment Template') ?></h2>
</div>
<form method="post" action="<?= $this->url->href('CommentTemplateController', 'save', array('project_id' => $project['id'], 'plugin' => 'TemplateManager')) ?>" autocomplete="off">
    <?= $this->form->csrf() ?>

    <?= $this->form->label(t('Title'), 'title') ?>
    <?= $this->form->text('title', $values, $errors, array('autofocus', 'required', 'tabindex="1"')) ?>

    <?= $this->form->label(t('Template Content'), 'template_content') ?>
    <?= $this->form->textEditor('template_content', $values, $errors, array('tabindex' => 2)) ?>

    <?= $this->modal->submitButtons() ?>
</form>
