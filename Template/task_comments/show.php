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
                <span class="pp-grey" style="cursor: pointer;"><i class="fa fa-commenting-o fa-fw" aria-hidden="true"></i> Add a comment</span>
            </summary>
        <?php endif ?>
        <?php if ($editable): ?>
            <?= $this->render('task_comments/create', array(
                'values'   => array(
                    'user_id' => $this->user->getId(),
                    'task_id' => $task['id'],
                    'project_id' => $task['project_id'],
                ),
                'errors'   => array(),
                'task'     => $task,
            )) ?>
        <?php endif ?>
        </details>
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
