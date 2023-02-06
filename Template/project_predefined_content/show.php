<div class="page-header">
    <h2 class=""><?= t('Content Templates') ?></h2>
    <ul class="">
        <li class="">
            <?= $this->modal->medium('plus', t('Add Task Description Template'), 'PredefinedTaskDescriptionController', 'create', array('project_id' => $project['id'])) ?>
        </li>
    </ul>
</div>

<?php if (! empty($predefined_task_descriptions)): ?>
    <fieldset class="">
        <legend class=""><?= t('Task Description Templates') ?></legend>
        <table class="template-table">
            <thead>
                <tr class="">
                    <th class=""><?= t('Title') ?></th>
                    <th class=""><?= t('ID') ?></th>
                    <?php if (file_exists('plugins/TemplateTitle')): ?>
                        <th class=""><?= t('CSS Styling Class') ?></th>
                        <th class=""><?= t('CSS Reference') ?></th>
                    <?php endif ?>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($predefined_task_descriptions as $template): ?>
                <tr class="">
                    <td class="">
                        <div class="dropdown">
                            <a href="#" class="dropdown-menu dropdown-menu-link-icon"><i class="fa fa-cog"></i><i class="fa fa-caret-down"></i></a>
                            <ul class="">
                                <li class="">
                                    <?= $this->modal->medium('edit', t('Edit'), 'PredefinedTaskDescriptionController', 'edit', array('project_id' => $project['id'], 'id' => $template['id'])) ?>
                                </li>
                                <li class="">
                                    <?= $this->modal->confirm('trash-o', t('Delete'), 'PredefinedTaskDescriptionController', 'confirm', array('project_id' => $project['id'], 'id' => $template['id'])) ?>
                                </li>
                            </ul>
                        </div>
                        <?= $this->text->e($template['title']) ?>
                        <?= $this->app->tooltipMarkdown($template['description']) ?>
                    </td>
                    <td class=""><?= $this->text->e($template['id']) ?></td>
                    <?php if (file_exists('plugins/TemplateTitle')): ?>
                        <td class=""><code>id="TaskTemplate-<?= $this->text->e($template['id']) ?></code></td>
                        <td class=""><code>#TaskTemplate-<?= $this->text->e($template['id']) ?></code></td>
                    <?php endif ?>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
    <?php endif ?>
</fieldset>

<form method="post" action="<?= $this->url->href('ProjectPredefinedContentController', 'update', array('project_id' => $project['id'], 'redirect' => 'edit')) ?>" autocomplete="off">
    <?= $this->form->csrf() ?>

    <fieldset class="">
        <legend class=""><?= t('Email Subject Templates') ?></legend>
        <?= $this->form->textarea('predefined_email_subjects', $values, $errors, array('tabindex="1"')) ?>
        <p class="form-help"><?= t('Write one subject by line.') ?></p>
        <?= $this->modal->submitButtons(array('tabindex' => 2)) ?>
    </fieldset>

</form>
