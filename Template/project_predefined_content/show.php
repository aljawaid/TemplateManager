<div class="page-header">
    <h2 class=""><?= t('Predefined Contents') ?></h2>
    <ul class="">
        <li class="">
            <?= $this->modal->medium('plus', t('Add predefined task description'), 'PredefinedTaskDescriptionController', 'create', array('project_id' => $project['id'])) ?>
        </li>
    </ul>
</div>

<?php if (! empty($predefined_task_descriptions)): ?>
    <h3 class=""><?= t('Predefined Task Descriptions') ?></h3>
    <table class="">
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
                            <?= $this->modal->confirm('trash-o', t('Remove'), 'PredefinedTaskDescriptionController', 'confirm', array('project_id' => $project['id'], 'id' => $template['id'])) ?>
                        </li>
                    </ul>
                </div>
                <?= $this->text->e($template['title']) ?>
                <?= $this->app->tooltipMarkdown($template['description']) ?>
            </td>
        </tr>
        <?php endforeach ?>
    </table>
<?php endif ?>

<form method="post" action="<?= $this->url->href('ProjectPredefinedContentController', 'update', array('project_id' => $project['id'], 'redirect' => 'edit')) ?>" autocomplete="off">
    <?= $this->form->csrf() ?>

    <fieldset class="">
        <legend class=""><?= t('Predefined Email Subjects') ?></legend>
        <?= $this->form->textarea('predefined_email_subjects', $values, $errors, array('tabindex="1"')) ?>
        <p class="form-help"><?= t('Write one subject by line.') ?></p>
    </fieldset>

    <?= $this->modal->submitButtons(array('tabindex' => 2)) ?>
</form>
