<details class="accordion-section" <?= empty($comments) ? '' : 'open' ?>>
    <summary class="accordion-title acc-comments-title">
        <i class="fa fa-comments-o"></i> <?= t('Comments') ?>
        <?php if (! empty($comments)): ?>
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
            <div class="quick-templates-bar">
                <div class="quick-templates-header">
                    <i class="fa fa-star" aria-hidden="true"></i> <?= t('Comment Templates') ?>
                </div>
                <?php foreach ($saved_comment_templates as $commentTemplate): ?>
                    <div class="quick-templates-label">
                        <div class="quick-templates-title"><?= $commentTemplate['title'] ?></div>
                        <div class="quick-template-content"><?= $this->helper->app->tooltipMarkdown($commentTemplate['description']) ?></div>
                    </div>
                <?php endforeach ?>
            </div>
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
