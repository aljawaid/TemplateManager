<div class="modal-page-header">
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
        </svg><?= t('Template Manager') ?>
    </h2>
</div>
<div id="DeleteModal" class="modal-contents">
    <h3 class=""><?= t('Delete Task Description Template') ?></h3>
    <div class="confirm">
        <p class="confirm-notice">
            <?= t('Click on the button to confirm you would like to remove the template from the database') ?>
            <div class="template-contents">
                <div class="template-title">
                    <?= $template['title'] ?> <?php if (!empty($template['topic'])): ?> (<?= $template['topic'] ?>) <?php endif ?>
                </div>
                <?= $this->text->markdown($template['description']) ?>
            </div>
        </p>

    <?= $this->modal->confirmButtons(
        'TaskDescriptionTemplateController',
        'remove',
        array('project_id' => $project['id'], 'id' => $template['id'], 'plugin' => 'TemplateManager'),
        t('Delete')
    ) ?>
    </div>
</div>
