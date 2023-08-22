<div class="modal-page-header template-manager-modal-header">
    <h2 class="relative">
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
        </svg> <?= t('Template Manager') ?>
        <span class="modal-title">
            <svg width="24px" height="24px" class="description-icon" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve">
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
            </svg> <?= t('Task Description Template') ?> <span class="modal-template-id">#<?= $template['id'] ?></span>
        </span>
    </h2>
</div>
<div class="modal-contents template-manager-modal-contents">
    <fieldset id="TemplateView" class="template-view">
        <?php if (!empty($template['topic'])): ?>
            <legend class="template-view-topic"><?= $template['topic'] ?></legend>
        <?php endif ?>
        <h3 class="template-view-title">
            <?= $template['title'] ?>
        </h3>
        <?php if (!empty($template['note'])): ?>
            <fieldset class="template-view-note">
                <legend><?= t('Note') ?></legend>
                <?= $this->text->markdown($template['note']) ?>
            </fieldset>
        <?php endif ?>
        <?php if (!empty($template['instructions'])): ?>
            <fieldset class="template-view-instructions">
                <legend><?= t('Instructions') ?></legend>
                <?= $this->text->markdown($template['instructions']) ?>
            </fieldset>
        <?php endif ?>
        <fieldset class="template-view-description">
            <legend><?= t('Template') ?></legend>
            <?= $this->text->markdown($template['description']) ?>
        </fieldset>
        <form id="TemplateForm" class="template-form">
            <div class="form-actions">
                <a class="btn cancel-btn js-modal-close" href="#"><?= t('Close') ?></a>
            </div>
        </form>
    </fieldset>
</div>
