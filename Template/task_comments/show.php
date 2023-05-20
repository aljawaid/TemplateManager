<details class="accordion-section" <?= empty($comments) ? '' : 'open' ?>>
    <summary class="accordion-title acc-comments-title">
        <i class="fa fa-comments-o"></i> <?= t('Comments') ?>
        <?php if (!empty($comments)): ?>
            <span class="">(<?= count($comments) ?>)</span>
        <?php endif ?>
    </summary>
    <div class="accordion-content comments" id="comments">
        <?php if (empty($comments)): ?>
            <div class="no-data"><?= t('No comments') ?></div>
        <?php endif ?>
        <?php if (!isset($is_public) || !$is_public): ?>
            <div class="comment-sorting">
                <small>
                    <?= $this->url->icon('sort', t('Change sorting'), 'CommentController', 'toggleSorting', array('task_id' => $task['id'], 'csrf_token' => $this->app->getToken()->getReusableCSRFToken())) ?>
                    <?php if ($editable): ?>
                        <?= $this->modal->medium('paper-plane', t('Send by email'), 'CommentMailController', 'create', array('task_id' => $task['id'])) ?>
                    <?php endif ?>
                </small>
            </div>
        <details class="accordion-section" <?= empty($comments) ? '' : 'open' ?>>
            <summary class="acc-comments-title">
                <span class="pp-grey" style="cursor: pointer;"><i class="fa fa-commenting-o fa-fw" aria-hidden="true"></i> <?= t('Add a comment') ?></span>
            </summary>
        <?php endif ?>
        <?php if ($editable): ?>
            <div id="commentsEditor" class="accordion-content comments">
            <?= $this->render('task_comments/create', array(
                'values'   => array(
                    'user_id' => $this->user->getId(),
                    'task_id' => $task['id'],
                    'project_id' => $task['project_id'],
                ),
                'errors'   => array(),
                'task'     => $task,
            )) ?>
            </div>
            <?php if (!empty($saved_comment_templates)): ?>
                <div class="quick-templates-bar">
                    <div class="quick-templates-header">
                        <?php if ($this->user->hasProjectAccess('ProjectEditController', 'show', $project['id'])): ?>
                            <a href="<?= $this->url->href('TemplateContentController', 'show', array('project_id' => $project['id'], 'plugin' => 'TemplateManager'), false, '', false) ?>" class="" title="Manage Templates">
                        <?php endif ?>
                        <svg width="30px" height="30px" class="comment-templates-icon" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve">
                            <g stroke-width="0"/><g stroke-linecap="round" stroke-linejoin="round"/><g><g><path d="M256,0C114.609,0,0,114.609,0,256s114.609,256,256,256s256-114.609,256-256S397.391,0,256,0z M256,472 c-119.297,0-216-96.703-216-216S136.703,40,256,40s216,96.703,216,216S375.297,472,256,472z"/><path fill="#808080" d="M310.875,254.734c-40.438,0-73.172,22.078-73.172,49.234c0,12.094,10.172,25.875,20.922,34.469L248.188,368l31.703-19.469 c9.453,2.969,19.891,4.656,30.984,4.656c40.391,0,73.125-22,73.125-49.219C384,276.812,351.266,254.734,310.875,254.734z"/><path fill="#055D20" d="M256,144c-70.688,0-128,40.234-128,89.891c0,22.062,17.781,47.234,36.562,62.922l-18.266,53.969l55.547-35.562 c7.25,2.375,14.938,4.25,22.844,5.656c-3.234-6.344-5.25-12.938-5.25-19.125c0-35.484,40.938-64.219,91.438-64.219 c27.062,0,51.188,8.422,67.938,21.578c3.312-8,5.188-16.469,5.188-25.219C384,184.234,326.688,144,256,144z"/></g></g>
                        </svg>
                        <span class="comments-header-title"><?= t('Comment Templates') ?></span>
                        <?php if ($this->user->hasProjectAccess('ProjectEditController', 'show', $project['id'])): ?>
                            </a>
                        <?php endif ?>
                    </div>
                    <?php foreach ($saved_comment_templates as $commentTemplate): ?>
                        <?php if (!empty($commentTemplate['note'])): ?>
                        <div class="quick-templates-label relative template-note" data-tooltip="<?= $this->text->e($commentTemplate['note']) ?>">
                        <?php else: ?>
                        <div class="quick-templates-label relative">
                        <?php endif ?>
                            <span class="fixed-title" title="<?= $commentTemplate['title'] ?>"><?= $commentTemplate['title'] ?></span>
                            <div id="CommentTemplate<?= $commentTemplate['id'] ?>" class="copy-comment-template quick-templates-title" data-clipboard-text="<?= htmlspecialchars($commentTemplate['description']) ?>" title="<?= t('Copy to Clipboard') ?>">
                                <i class="fa fa-clipboard" aria-hidden="true"></i>
                            </div>
                            <div class="quick-template-content">
                                <?= $this->helper->app->tooltipMarkdown($commentTemplate['description']) ?>
                            </div>
                            <div class="quick-templates-info">
                                <?php if (!empty($commentTemplate['topic'])): ?>
                                    <span class="template-topic" title="<?= ($commentTemplate['topic']) ?>"><?= ($commentTemplate['topic']) ?></span>
                                <?php endif ?>
                                <a href="<?= $this->url->href('CommentTemplateController', 'viewTemplate', array('project_id' => $project['id'], 'id' => $commentTemplate['id'], 'plugin' => 'TemplateManager'), false, '', false) ?>" class="icon-btn js-modal-medium" title="<?=t('View Template') ?>">
                                    <svg width="21px" height="21px" class="comment-templates-icon" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve">
                                        <g stroke-width="0"/>
                                        <g stroke-linecap="round" stroke-linejoin="round"/>
                                        <g>
                                            <g>
                                                <path d="M256,0C114.609,0,0,114.609,0,256s114.609,256,256,256s256-114.609,256-256S397.391,0,256,0z M256,472 c-119.297,0-216-96.703-216-216S136.703,40,256,40s216,96.703,216,216S375.297,472,256,472z"/>
                                                <path fill="#808080" d="M310.875,254.734c-40.438,0-73.172,22.078-73.172,49.234c0,12.094,10.172,25.875,20.922,34.469L248.188,368l31.703-19.469 c9.453,2.969,19.891,4.656,30.984,4.656c40.391,0,73.125-22,73.125-49.219C384,276.812,351.266,254.734,310.875,254.734z"/>
                                                <path fill="#055D20" d="M256,144c-70.688,0-128,40.234-128,89.891c0,22.062,17.781,47.234,36.562,62.922l-18.266,53.969l55.547-35.562 c7.25,2.375,14.938,4.25,22.844,5.656c-3.234-6.344-5.25-12.938-5.25-19.125c0-35.484,40.938-64.219,91.438-64.219 c27.062,0,51.188,8.422,67.938,21.578c3.312-8,5.188-16.469,5.188-25.219C384,184.234,326.688,144,256,144z"/>
                                            </g>
                                        </g>
                                    </svg>
                                </a>
                                <a href="#" class="mr-10 icon-btn js-template-comment" data-template-target="textarea[name=comment]" data-template="<?= htmlspecialchars($commentTemplate['description']) ?>" title="<?= t('Paste to Text Editor') ?>">
                                    <svg fill="currentColor" class="text-icon" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="21px" height="21px" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve">
                                        <g stroke-width="0"/>
                                        <g stroke-linecap="round" stroke-linejoin="round"/>
                                        <g>
                                            <path d="M256,0C114.609,0,0,114.609,0,256s114.609,256,256,256s256-114.609,256-256S397.391,0,256,0z M256,472 c-119.297,0-216-96.703-216-216S136.703,40,256,40s216,96.703,216,216S375.297,472,256,472z"/>
                                            <g>
                                                <rect fill="#055D20" x="144" y="336" width="224" height="32"/>
                                                <rect fill="#055D20" x="176" y="272" width="160" height="32"/>
                                                <rect fill="#055D20" x="176" y="208" width="160" height="32"/>
                                                <rect fill="#055D20" x="144" y="144" width="224" height="32"/>
                                            </g>
                                        </g>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    <?php endforeach ?>
                </div>
            <?php endif ?>
        <?php endif ?>
        </details>
        <hr>
        <?php foreach ($comments as $comment): ?>
            <?= $this->render('comment/show', array(
                'comment'   => $comment,
                'task'      => $task,
                'project'   => $project,
                'editable'  => $editable,
                'is_public' => isset($is_public) && $is_public,
            )) ?>
        <?php endforeach ?>

    </div>
</details>
