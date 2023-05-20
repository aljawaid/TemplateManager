<?php
$taskTemplatesCount = $this->task->taskDescriptionTemplateModel->getAll($project['id']);
$taskTemplatesCountTotal = count($taskTemplatesCount);
$commentTemplatesCount = $this->task->taskCommentTemplateModel->getAll($project['id']);
$commentTemplatesCountTotal = count($commentTemplatesCount);
$emailSubjectsCount = (!empty($project['predefined_email_subjects']) && !is_null($project['predefined_email_subjects'])) ? count(explode("\r\n", trim($project['predefined_email_subjects']))) : 0;
$allTemplatesCount = ($taskTemplatesCountTotal + $commentTemplatesCountTotal + $emailSubjectsCount);
?>

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
            <span class="templates-menu-count"><?= $allTemplatesCount ?></span>
        </h2>
        <ul class="add-templates-bar">
            <li class="">
                <a id="AddDescTemplate" href="<?= $this->url->href('TaskDescriptionTemplateController', 'create', array('project_id' => $project['id'], 'plugin' => 'TemplateManager'), false, '', false) ?>" class="btn add-desc-template-btn js-modal-medium" title="<?= t('Add Template') ?>">
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
            </li>
            <li class="">
                <a id="AddCommentTemplate" href="<?= $this->url->href('CommentTemplateController', 'create', array('project_id' => $project['id'], 'plugin' => 'TemplateManager'), false, '', false) ?>" class="btn add-comment-template-btn js-modal-medium" title="<?=t('Add Template') ?>">
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
            </li>
            <li class="">
                <a id="AddGlobalTemplate" href="<?= $this->url->href('GlobalContentController', 'create', array('plugin' => 'TemplateManager'), false, '', false) ?>" class="btn add-comment-template-btn js-modal-medium" title="<?=t('Add Template') ?>">
                    <svg width="20px" height="20px" class="plus-circle-icon" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve">
                        <g stroke-width="0"/>
                        <g stroke-linecap="round" stroke-linejoin="round"/>
                        <g>
                            <g>
                                <polygon fill="#055D20" points="272,128 240,128 240,240 128,240 128,272 240,272 240,384 272,384 272,272 384,272 384,240 272,240 "/>
                                <path d="M256,0C114.609,0,0,114.609,0,256s114.609,256,256,256s256-114.609,256-256S397.391,0,256,0z M256,472 c-119.297,0-216-96.703-216-216S136.703,40,256,40s216,96.703,216,216S375.297,472,256,472z"/>
                            </g>
                        </g>
                    </svg> <?= t('Add Global Template') ?>
                </a>
            </li>
            <li class="">
                <a id="ViewGlobalTemplates" href="<?= $this->url->href('GlobalTemplateController', 'show', array('plugin' => 'TemplateManager'), false, '', false) ?>" class="btn add-global-template-btn">
                    <svg width="20px" height="20px" class="globe-icon" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve">
                        <g stroke-width="0"/>
                        <g stroke-linecap="round" stroke-linejoin="round"/>
                        <g>
                            <g stroke="#055D20">
                                <path d="M256,0C114.609,0,0,114.609,0,256s114.609,256,256,256s256-114.609,256-256S397.391,0,256,0z M256,472 c-119.297,0-216-96.703-216-216S136.703,40,256,40s216,96.703,216,216S375.297,472,256,472z"/>
                                <path d="M288,128c-53.016,0-96,42.984-96,96c0,0.531,0.047,1.047,0.062,1.609C155.531,232.984,128,265.266,128,304 c0,44.188,35.797,80,80,80c38.719,0,71.016-27.531,78.422-64.094c0.531,0.016,1.047,0.094,1.578,0.094c53.016,0,96-42.984,96-96 S341.016,128,288,128z M208,368c-35.281,0-64-28.719-64-64c0-30.359,21.281-55.734,49.719-62.25 c7.25,38.766,37.766,69.281,76.531,76.531C263.719,346.719,238.344,368,208,368z"/>
                                <path fill="#0DB388" d="M209.672,240.156 c33.906,0.875,61.297,28.234,62.156,62.203C240.688,295.922,216.047,271.344,209.672,240.156z M288,304c0-44.172-35.797-80-80-80 c0-44.109,35.906-80,80-80s80,35.891,80,80S332.094,304,288,304z"/>
                                <path d="M160,224c17.656,0,32-14.344,32-32s-14.344-32-32-32s-32,14.344-32,32S142.344,224,160,224z M160,176 c8.812,0,16,7.188,16,16s-7.188,16-16,16s-16-7.188-16-16S151.188,176,160,176z"/>
                            </g>
                        </g>
                    </svg> <?= t('View Global Templates') ?>
                    <?php
                    $globalTemplatesCount = $this->task->globalTemplateModel->getAll();
                    ?>
                    <span class="templates-menu-count"><?= count($globalTemplatesCount) ?></span>
                </a>
            </li>
        </ul>
    </div>
    <p class="page-intro">
        <?= t('Content templates are useful for repetitive content. Templates listed here apply to this project only. Each section describes how users should use the saved templates.') ?>
    </p>
    <fieldset class="task-desc-section">
        <?php if (!empty($predefined_task_descriptions)): ?>
            <span class="count-badge"><?= count($predefined_task_descriptions) ?></span>
        <?php endif ?>
        <legend id="TaskDescTemplates" class="">
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
            <?= t('These templates are used as descriptions for tasks in projects. When you create a task, you can choose from a list of these templates in the task creation form. Topics can help group and label similar templates. Notes are used to describe the template.') ?>
        </p>
        <?php if (!empty($predefined_task_descriptions)): ?>
            <table class="template-table">
                <thead>
                    <tr class="">
                        <th class="template-header column-3 text-center pl-3 table-corner-tl"><?= t('ID') ?></th>
                        <th class="template-header pl-10"><?= t('Title') ?></th>
                        <th class="template-header column-25 pl-10"><?= t('Note') ?></th>
                        <th class="template-header column-15 pl-10"><?= t('Topic') ?></th>
                        <th class="template-header actions-column table-corner-tr pl-10"><?= t('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($predefined_task_descriptions as $template): ?>
                    <tr class="">
                        <td class="template-row pt-5 pl-3 text-center table-corner-bl pp-grey"><?= $this->text->e($template['id']) ?></td>
                        <td class="template-row template-title"><?= $this->text->e($template['title']) ?></td>
                        <td class="template-row template-note"><?= $this->text->e($template['note']) ?></td>
                        <td class="template-row"><?= $this->text->e($template['topic']) ?></td>
                        <td class="template-row table-corner-br">
                            <div class="btn-wrapper">
                                <?= $this->app->tooltipMarkdown($template['description']) ?>
                                <a id="ViewDescTemplate" href="<?= $this->url->href('TaskDescriptionTemplateController', 'viewTemplate', array('project_id' => $project['id'], 'id' => $template['id'], 'plugin' => 'TemplateManager'), false, '', false) ?>" class="btn view-desc-template-btn js-modal-medium" title="<?=t('View Template') ?>">
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
                                    </svg> <?= t('View') ?>
                                </a>
                                <a id="EditDescTemplate" href="<?= $this->url->href('TaskDescriptionTemplateController', 'edit', array('project_id' => $project['id'], 'id' => $template['id'], 'plugin' => 'TemplateManager'), false, '', false) ?>" class="btn edit-desc-template-btn js-modal-medium" title="<?=t('Edit Template') ?>">
                                    <svg fill="currentColor" width="20px" height="20px" class="edit-icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <g stroke-width="0"/>
                                        <g stroke-linecap="round" stroke-linejoin="round"/>
                                        <g>
                                            <path d="M12.5,10.2071068 L8,14.7071068 L8,16 L9.29289322,16 L13.7928932,11.5 L12.5,10.2071068 Z M13.2071068,9.5 L14.5,10.7928932 L15.7928932,9.5 L14.5,8.20710678 L13.2071068,9.5 Z M12,22 C6.4771525,22 2,17.5228475 2,12 C2,6.4771525 6.4771525,2 12,2 C17.5228475,2 22,6.4771525 22,12 C22,17.5228475 17.5228475,22 12,22 Z M12,21 C16.9705627,21 21,16.9705627 21,12 C21,7.02943725 16.9705627,3 12,3 C7.02943725,3 3,7.02943725 3,12 C3,16.9705627 7.02943725,21 12,21 Z"/>
                                            <path fill="none" stroke="#055D20" d=" M14.8535534,7.14644661 L16.8535534,9.14644661 C17.0488155,9.34170876 17.0488155,9.65829124 16.8535534,9.85355339 L9.85355339,16.8535534 C9.7597852,16.9473216 9.63260824,17 9.5,17 L7.5,17 C7.22385763,17 7,16.7761424 7,16.5 L7,14.5 C7,14.3673918 7.05267842,14.2402148 7.14644661,14.1464466 L14.1464466,7.14644661 C14.3417088,6.95118446 14.6582912,6.95118446 14.8535534,7.14644661 Z"/>
                                        </g>
                                    </svg> <?= t('Edit') ?>
                                </a>
                                <?php if ($this->user->hasProjectAccess('ProjectEditController', 'show', $project['id'])): ?>
                                    <a id="DeleteDescTemplate" href="<?= $this->url->href('TaskDescriptionTemplateController', 'confirm', array('project_id' => $project['id'], 'id' => $template['id'], 'plugin' => 'TemplateManager'), false, '', false) ?>" class="btn delete-desc-template-btn js-modal-confirm" title="<?=t('Delete Template') ?>">
                                        <svg width="20px" height="20px" class="delete-icon" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve">
                                            <g stroke-width="0"/>
                                            <g stroke-linecap="round" stroke-linejoin="round"/>
                                            <g>
                                                <polygon fill="#055D20" points="335.188,154.188 256,233.375 176.812,154.188 154.188,176.812 233.375,256 154.188,335.188 176.812,357.812 256,278.625 335.188,357.812 357.812,335.188 278.625,256 357.812,176.812 "/>
                                                <path d="M256,0C114.609,0,0,114.609,0,256s114.609,256,256,256s256-114.609,256-256S397.391,0,256,0z M256,472 c-119.297,0-216-96.703-216-216S136.703,40,256,40s216,96.703,216,216S375.297,472,256,472z"/>
                                            </g>
                                        </svg> <?= t('Delete') ?>
                                    </a>
                                <?php endif ?>
                            </div>
                        </td>
                    </tr>
                <?php endforeach ?>
                </tbody>
            </table>
        <?php else: ?>
            <span class="no-templates"><?= t('Add a template to get started') ?></span>
        <?php endif ?>
    </fieldset>

    <fieldset class="task-comments-section">
        <?php if (!empty($saved_comment_templates)): ?>
            <span class="count-badge"><?= count($saved_comment_templates) ?></span>
        <?php endif ?>
        <legend id="CommentTemplates" class="">
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
            <?= t('These templates are available as comments for any task in a project. In the comments section of a task, select your template from the associated comment templates. Topics can help group and label similar templates. Notes are used to describe the template.') ?>
        </p>
        <?php if (!empty($saved_comment_templates)): ?>
            <table class="template-table">
                <thead>
                    <tr class="">
                        <th class="template-header column-3 pl-3 text-center table-corner-tl"><?= t('ID') ?></th>
                        <th class="template-header pl-10"><?= t('Title') ?></th>
                        <th class="template-header column-25 pl-10"><?= t('Note') ?></th>
                        <th class="template-header column-15 pl-10"><?= t('Topic') ?></th>
                        <th class="template-header actions-column table-corner-tr pl-10"><?= t('Actions') ?></th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($saved_comment_templates as $commentTemplate): ?>
                    <tr class="">
                        <td class="template-row pt-5 pl-3 text-center table-corner-bl pp-grey"><?= $this->text->e($commentTemplate['id']) ?></td>
                        <td class="template-row template-title"><?= $this->text->e($commentTemplate['title']) ?></td>
                        <td class="template-row template-note"><?= $this->text->e($commentTemplate['note']) ?></td>
                        <td class="template-row"><?= $this->text->e($commentTemplate['topic']) ?></td>
                        <td class="template-row table-corner-br">
                            <div class="btn-wrapper">
                                <?= $this->helper->app->tooltipMarkdown($commentTemplate['description']) ?>
                                <a id="ViewDescTemplate" href="<?= $this->url->href('CommentTemplateController', 'viewTemplate', array('project_id' => $project['id'], 'id' => $commentTemplate['id'], 'plugin' => 'TemplateManager'), false, '', false) ?>" class="btn view-comment-template-btn js-modal-medium" title="<?=t('View Template') ?>">
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
                                    </svg> <?= t('View') ?>
                                </a>
                                <a id="EditCommentTemplate" href="<?= $this->url->href('CommentTemplateController', 'edit', array('project_id' => $project['id'], 'id' => $commentTemplate['id'], 'plugin' => 'TemplateManager'), false, '', false) ?>" class="btn edit-comment-template-btn js-modal-medium" title="<?=t('Edit Template') ?>">
                                    <svg fill="currentColor" width="20px" height="20px" class="edit-icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <g stroke-width="0"/>
                                        <g stroke-linecap="round" stroke-linejoin="round"/>
                                        <g>
                                            <path d="M12.5,10.2071068 L8,14.7071068 L8,16 L9.29289322,16 L13.7928932,11.5 L12.5,10.2071068 Z M13.2071068,9.5 L14.5,10.7928932 L15.7928932,9.5 L14.5,8.20710678 L13.2071068,9.5 Z M12,22 C6.4771525,22 2,17.5228475 2,12 C2,6.4771525 6.4771525,2 12,2 C17.5228475,2 22,6.4771525 22,12 C22,17.5228475 17.5228475,22 12,22 Z M12,21 C16.9705627,21 21,16.9705627 21,12 C21,7.02943725 16.9705627,3 12,3 C7.02943725,3 3,7.02943725 3,12 C3,16.9705627 7.02943725,21 12,21 Z"/>
                                            <path fill="none" stroke="#055D20" d=" M14.8535534,7.14644661 L16.8535534,9.14644661 C17.0488155,9.34170876 17.0488155,9.65829124 16.8535534,9.85355339 L9.85355339,16.8535534 C9.7597852,16.9473216 9.63260824,17 9.5,17 L7.5,17 C7.22385763,17 7,16.7761424 7,16.5 L7,14.5 C7,14.3673918 7.05267842,14.2402148 7.14644661,14.1464466 L14.1464466,7.14644661 C14.3417088,6.95118446 14.6582912,6.95118446 14.8535534,7.14644661 Z"/>
                                        </g>
                                    </svg> <?= t('Edit') ?>
                                </a>
                                <?php if ($this->user->hasProjectAccess('ProjectEditController', 'show', $project['id'])): ?>
                                    <a id="DeleteCommentTemplate" href="<?= $this->url->href('CommentTemplateController', 'confirm', array('project_id' => $project['id'], 'id' => $commentTemplate['id'], 'plugin' => 'TemplateManager'), false, '', false) ?>" class="btn delete-comment-template-btn js-modal-confirm" title="<?=t('Delete Template') ?>">
                                        <svg width="20px" height="20px" class="delete-icon" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve">
                                            <g stroke-width="0"/>
                                            <g stroke-linecap="round" stroke-linejoin="round"/>
                                            <g>
                                                <polygon fill="#055D20" points="335.188,154.188 256,233.375 176.812,154.188 154.188,176.812 233.375,256 154.188,335.188 176.812,357.812 256,278.625 335.188,357.812 357.812,335.188 278.625,256 357.812,176.812 "/>
                                                <path d="M256,0C114.609,0,0,114.609,0,256s114.609,256,256,256s256-114.609,256-256S397.391,0,256,0z M256,472 c-119.297,0-216-96.703-216-216S136.703,40,256,40s216,96.703,216,216S375.297,472,256,472z"/>
                                            </g>
                                        </svg> <?= t('Delete') ?>
                                    </a>
                                <?php endif ?>
                            </div>
                        </td>
                    </tr>
                <?php endforeach ?>
                </tbody>
            </table>
        <?php else: ?>
            <span class="no-templates"><?= t('Add a template to get started') ?></span>
        <?php endif ?>
    </fieldset>

    <fieldset class="email-subject-section">
        <?php if (!empty($project['predefined_email_subjects'])): ?>
            <span class="count-badge"><?= count(explode("\r\n", trim($project['predefined_email_subjects']))) ?></span>
        <?php endif ?>
        <legend id="EmailSubjectTemplates" class="">
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
            <form method="post" class="email-subject-form" action="<?= $this->url->href('TemplateContentController', 'update', array('project_id' => $project['id'], 'redirect' => 'edit', 'plugin' => 'TemplateManager')) ?>" autocomplete="off">
                <?= $this->form->csrf() ?>

                <?= $this->form->textarea('predefined_email_subjects', $values, $errors, array('tabindex="1"')) ?>
                <p class="form-help"><?= t('One subject per line only') ?></p>

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
