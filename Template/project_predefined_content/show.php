<div class="template-manager-page-margin">
    <div class="template-manager-page-header">
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
    <p class="page-intro">
        <?= t('Content templates are useful for repetitive content. Templates listed here apply to this project only. Each section describes how users should use the saved templates.') ?>
    </p>
    <fieldset class="task-desc-section">
        <legend class="">
            <svg width="20px" height="20px" class="description-icon" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve">
                <g stroke-width="0"/>
                <g stroke-linecap="round" stroke-linejoin="round"/>
                <g>
                    <g>
                        <path d="M256,0C114.609,0,0,114.609,0,256s114.609,256,256,256s256-114.609,256-256S397.391,0,256,0z M256,472 c-119.297,0-216-96.703-216-216S136.703,40,256,40s216,96.703,216,216S375.297,472,256,472z"/>
                        <path fill="#055D20" d="M320,128H160v256h192V164.578L320,128z M176,368V144h128v32h32v192H176z"/>
                        <rect fill="#055D20" x="192" y="272" width="128" height="16"/>
                        <rect fill="#055D20" x="192" y="240" width="128" height="16"/>
                        <rect fill="#055D20" x="192" y="192" width="64" height="16"/>
                        <rect fill="#055D20" x="192" y="160" width="32" height="16"/>
                        <rect fill="#055D20" x="192" y="304" width="128" height="16"/>
                        <rect fill="#055D20" x="192" y="336" width="128" height="16"/>
                    </g>
                </g>
            </svg> <?= t('Task Description Templates') ?>
        </legend>
        <p class="section-intro">
            <?= t('These templates are used as descriptions for tasks in each project. When you create a task, you can choose from a list of these templates in the task creation form (below the description editor box).') ?>
        </p>
        <?php if (! empty($predefined_task_descriptions)): ?>
            <table class="template-table">
                <thead>
                    <tr class="">
                        <th class="column-2"><?= t('ID') ?></th>
                        <th class="column-42"><?= t('Title') ?></th>
                        <?php if (file_exists('plugins/TemplateTitle')): ?>
                            <th class=""><?= t('CSS Styling Class') ?></th>
                            <th class=""><?= t('CSS Reference') ?></th>
                        <?php endif ?>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($predefined_task_descriptions as $template): ?>
                    <tr class="">
                        <td class=""><?= $this->text->e($template['id']) ?></td>
                        <td class="">
                            <?= $this->text->e($template['title']) ?>
                            <?= $this->app->tooltipMarkdown($template['description']) ?>
                        </td>
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

    <fieldset class="task-comments-section">
        <legend class="">
            <svg width="20px" height="20px" class="comment-templates-icon" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve">
                <g stroke-width="0"/>
                <g stroke-linecap="round" stroke-linejoin="round"/>
                <g>
                    <g>
                        <path d="M256,0C114.609,0,0,114.609,0,256s114.609,256,256,256s256-114.609,256-256S397.391,0,256,0z M256,472 c-119.297,0-216-96.703-216-216S136.703,40,256,40s216,96.703,216,216S375.297,472,256,472z"/>
                        <path fill="#808080" d="M310.875,254.734c-40.438,0-73.172,22.078-73.172,49.234c0,12.094,10.172,25.875,20.922,34.469L248.188,368l31.703-19.469 c9.453,2.969,19.891,4.656,30.984,4.656c40.391,0,73.125-22,73.125-49.219C384,276.812,351.266,254.734,310.875,254.734z"/>
                        <path fill="#055D20" d="M256,144c-70.688,0-128,40.234-128,89.891c0,22.062,17.781,47.234,36.562,62.922l-18.266,53.969l55.547-35.562 c7.25,2.375,14.938,4.25,22.844,5.656c-3.234-6.344-5.25-12.938-5.25-19.125c0-35.484,40.938-64.219,91.438-64.219 c27.062,0,51.188,8.422,67.938,21.578c3.312-8,5.188-16.469,5.188-25.219C384,184.234,326.688,144,256,144z"/>
                    </g>
                </g>
            </svg> <?= t('Task Comment Templates') ?>
        </legend>
        <p class="section-intro">
            <?= t('These templates are used as comments for each task in each project. In the comments section of each task, a templates bar will show listing all the associated comment templates which are available to the task.') ?>
        </p>
        <?php if (! empty($saved_comment_templates)): ?>
            <table class="template-table">
                <thead>
                    <tr class="">
                        <th class="column-2"><?= t('ID') ?></th>
                        <th class="column-42"><?= t('Title') ?></th>
                        <?php if (file_exists('plugins/TemplateTitle')): ?>
                            <th class=""><?= t('CSS Styling Class') ?></th>
                            <th class=""><?= t('CSS Reference') ?></th>
                        <?php endif ?>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($saved_comment_templates as $commentTemplate): ?>
                    <tr class="">
                        <td class=""><?= $this->text->e($commentTemplate['id']) ?></td>
                        <td class="">
                            <?= $this->text->e($commentTemplate['title']) ?>
                            <?= $this->helper->app->tooltipMarkdown($commentTemplate['description']) ?>
                        </td>
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

    <fieldset class="email-subject-section">
        <legend class="">
            <svg width="20px" height="20px" class="mail-plus-icon" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve">
                <g stroke-width="0"/>
                <g stroke-linecap="round" stroke-linejoin="round"/>
                <g>
                    <g>
                        <path d="M256,0C114.609,0,0,114.609,0,256s114.609,256,256,256s256-114.609,256-256S397.391,0,256,0z M256,472 c-119.297,0-216-96.703-216-216S136.703,40,256,40s216,96.703,216,216S375.297,472,256,472z"/>
                        <g>
                            <path fill="#055D20" d="M368,234.375v74.438l-54.5-59.422l16.719-11.312c-5.984-1.531-11.641-3.922-16.688-7.203L256,271.75L166.281,208H256 h37.625c-2.391-16-4-16-4.812-16H256H128v160h128h128V223.062C379.422,227.75,373.969,231.531,368,234.375z M144,212.531 l54.5,36.859L144,308.812V212.531z M256,336h-92.406l45.562-79.422L256,288.25l46.844-31.656L348.406,336H256z"/>
                        </g>
                        <g>
                            <path fill="#055D20" d="M344,144c-22.094,0-40,17.906-40,40s17.906,40,40,40s40-17.906,40-40S366.094,144,344,144z M368,192h-16v16h-16v-16h-16 v-16h16v-16h16v16h16V192z"/>
                        </g>
                    </g>
                </g>
            </svg> <?= t('Email Subject Templates') ?>
        </legend>
        <p class="section-intro">
            <?= t('Subjects for emails are used both by tasks and automatic actions which can help in creating automated emails (as confirmations, reports or for auditing activity).') ?>
        </p>
        <div class="email-form-wrapper" style="width: 30%;">
            <form method="post" class="email-subject-form" action="<?= $this->url->href('ProjectPredefinedContentController', 'update', array('project_id' => $project['id'], 'redirect' => 'edit')) ?>" autocomplete="off">
                <?= $this->form->csrf() ?>

                <?= $this->form->textarea('predefined_email_subjects', $values, $errors, array('tabindex="1"')) ?>
                <p class="form-help"><?= t('Write one subject per line') ?></p>

                <?= $this->modal->submitButtons(array('tabindex' => 2)) ?>
            </form>
        </div>
        <div class="email-form-wrapper" style="width: 69%;">
            <div class="section-intro">
                <div class="email-section-wrapper">
                    <fieldset class="email-section-task">
                        <legend class="email-section-task-title" style="line-height: 1;"><?= t('Inside a task') ?></legend>
                        <?= t('Use the \'Send by email\' option from the task side menu') ?>
                    </fieldset>
                    <fieldset class="email-section-action">
                        <legend class="email-section-action-title" style="margin-bottom: 0;"><?= t('Using Automatic Actions') ?></legend>
                        <?= t('Choose the \'Send a task by email to someone\' action') ?>
                        <div class="email-section-example">
                            <?= t('This option can use templates with interpolation expressions (double braces). Follow the example below:') ?>
                            <div class="example-result">
                                <span class="example-detail">
                                    <span><?= t('Activity Result:') ?></span> <i><?= t('The task was moved to the \'Done\' column by the user') ?></i>
                                </span>
                                <span class="example-detail">
                                    <span><?= t('Email Subject Received:') ?></span> <code><?= t('Done: Make Sales Report (#101)') ?></code>
                                </span>
                            </div>
                            <div class="example-steps">
                                <div class="steps-title"><?= t('Automatic Action Procedure:') ?></div>
                                <ol class="steps-list">
                                    <li class=""><?= t('Send a task by email to someone') ?></li>
                                    <li class=""><?= t('Event Name:') ?> <i><?= t('Move a task to another column') ?></i></li>
                                    <li class=""><?= t('Column:') ?> <i><?= t('Done') ?></i></li>
                                    <li class=""><?= t('User that will receive the email:') ?> <i><?= t('User') ?></i></li>
                                    <li class=""><?= t('Email Subject:') ?> <code><strong><span>{{column_title}}</span>: <span>{{title}}</span> (#<span>{{id}}</span>)</strong></code></li>
                                </ol>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>
    </fieldset>
</div>
