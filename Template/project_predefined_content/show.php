<div class="page-header">
    <h2 class="">
        <svg width="24px" height="24px" class="template-manager-icon" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <g stroke-width="0"/>
            <g stroke-linecap="round" stroke-linejoin="round"/>
            <g>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M3 3V9H21V3H3ZM19 5H5V7H19V5Z" fill="#000000"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M3 11V21H11V11H3ZM9 13H5V19H9V13Z" fill="#000000"/>
                <path d="M21 11H13V13H21V11Z" fill="#0DB388"/>
                <path d="M13 15H21V17H13V15Z" fill="#0DB388"/>
                <path d="M21 19H13V21H21V19Z" fill="#0DB388"/>
            </g>
        </svg> <?= t('Content Templates') ?>
    </h2>
        <ul class="add-templates-bar">
            <li class="">
                <div class="btn add-desc-template-btn">
                    <a id="<?= t('AddDescTemplate') ?>" href="<?= $this->url->href('PredefinedTaskDescriptionController', 'create', array('project_id' => $project['id']), false, '', false) ?>" class="js-modal-medium" title="<?=t('Add Template') ?>">
                        <svg width="20px" height="20px" class="plus-circle-icon" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve">
                            <g stroke-width="0"/>
                            <g stroke-linecap="round" stroke-linejoin="round"/>
                            <g>
                                <g>
                                    <polygon fill="#055D20" points="272,128 240,128 240,240 128,240 128,272 240,272 240,384 272,384 272,272 384,272 384,240 272,240 "/>
                                    <path d="M256,0C114.609,0,0,114.609,0,256s114.609,256,256,256s256-114.609,256-256S397.391,0,256,0z M256,472 c-119.297,0-216-96.703-216-216S136.703,40,256,40s216,96.703,216,216S375.297,472,256,472z"/>
                                </g>
                            </g>
                        </svg> <?= t('Add Task Description Template') ?>
                    </a>
                </div>
            </li>
            <li class="">
                <div class="btn add-comment-template-btn">
                    <a id="<?= t('AddCommentTemplate') ?>" href="<?= $this->url->href('CommentTemplateController', 'create', array('project_id' => $project['id'], 'plugin' => 'TemplateManager'), false, '', false) ?>" class="js-modal-medium" title="<?=t('Add Template') ?>">
                        <svg width="20px" height="20px" class="plus-circle-icon" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve">
                            <g stroke-width="0"/>
                            <g stroke-linecap="round" stroke-linejoin="round"/>
                            <g>
                                <g>
                                    <polygon fill="#055D20" points="272,128 240,128 240,240 128,240 128,272 240,272 240,384 272,384 272,272 384,272 384,240 272,240 "/>
                                    <path d="M256,0C114.609,0,0,114.609,0,256s114.609,256,256,256s256-114.609,256-256S397.391,0,256,0z M256,472 c-119.297,0-216-96.703-216-216S136.703,40,256,40s216,96.703,216,216S375.297,472,256,472z"/>
                                </g>
                            </g>
                        </svg> <?= t('Add Comment Template') ?>
                    </a>
                </div>
            </li>
        </ul>
    </div>

<fieldset class="">
    <legend class=""><?= t('Task Description Templates') ?></legend>
    <?php if (! empty($predefined_task_descriptions)): ?>
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
    <?php else: ?>
        <span class="no-templates"><?= t('No templates') ?></span>
    <?php endif ?>
</fieldset>

<fieldset class="">
    <legend class=""><?= t('Task Comment Templates') ?></legend>
    <?php if (! empty($saved_comment_templates)): ?>
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
            <?php foreach ($saved_comment_templates as $commentTemplate): ?>
                <tr class="">
                    <td class="">
                        <div class="dropdown">
                            <a href="#" class="dropdown-menu dropdown-menu-link-icon"><i class="fa fa-cog"></i><i class="fa fa-caret-down"></i></a>
                            <ul class="">
                                <li class="">
                                    <?= $this->modal->medium('edit', t('Edit'), 'CommentTemplateController', 'edit', array('project_id' => $project['id'], 'id' => $commentTemplate['id'], 'plugin' => 'TemplateManager')) ?>
                                </li>
                                <li class="">
                                    <?= $this->modal->confirm('trash-o', t('Delete'), 'CommentTemplateController', 'confirm', array('project_id' => $project['id'], 'id' => $commentTemplate['id'], 'plugin' => 'TemplateManager')) ?>
                                </li>
                            </ul>
                        </div>
                        <?= $this->text->e($commentTemplate['title']) ?>
                        <?= $this->helper->app->tooltipMarkdown($commentTemplate['description']) ?>
                    </td>
                    <td class=""><?= $this->text->e($commentTemplate['id']) ?></td>
                    <?php if (file_exists('plugins/TemplateTitle')): ?>
                        <td class=""><code>id="TaskTemplate-<?= $this->text->e($commentTemplate['id']) ?></code></td>
                        <td class=""><code>#TaskTemplate-<?= $this->text->e($commentTemplate['id']) ?></code></td>
                    <?php endif ?>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
    <?php else: ?>
        <span class="no-templates"><?= t('No templates') ?></span>
    <?php endif ?>
</fieldset>

<fieldset class="">
    <legend class=""><?= t('Email Subject Templates') ?></legend>
    <form method="post" action="<?= $this->url->href('ProjectPredefinedContentController', 'update', array('project_id' => $project['id'], 'redirect' => 'edit')) ?>" autocomplete="off">
        <?= $this->form->csrf() ?>

        <?= $this->form->textarea('predefined_email_subjects', $values, $errors, array('tabindex="1"')) ?>
        <p class="form-help"><?= t('Write one subject by line.') ?></p>

        <?= $this->modal->submitButtons(array('tabindex' => 2)) ?>
    </form>
</fieldset>
