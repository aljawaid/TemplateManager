<?php
$saved_global_templates = $this->model->globalTemplateModel->getAll();
?>
<?php if (!empty($saved_global_templates)): ?>
    <details id="GlobalTemplatesViewAccordion" class="accordion-section">
        <summary class="accordion-title acc-templates-title">
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
            </svg> <?= t('General Templates & Actions') ?>
            <?php if (!empty($saved_global_templates)): ?>
                <span class="global-templates-menu-count">(<?= count($saved_global_templates) ?>)</span>
            <?php endif ?>
        </summary>
        <div class="accordion-content">
            <?php foreach ($saved_global_templates as $template): ?>
                <details class="global-template-section">
                    <summary class="global-template-section-title">
                        <?= $this->text->e($template['title']) ?>
                    </summary>
                    <div class="global-template-content">
                        <fieldset id="TemplateView-<?= $template['id'] ?>" class="template-view">
                            <?php if (!empty($template['topic'])): ?>
                                <legend class="template-view-topic"><?= $template['topic'] ?></legend>
                            <?php endif ?>
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
                                <legend align="right" id="GlobalTemplateCopy<?= $template['id'] ?>" class="copy-global-template copy-global-template-button" data-clipboard-text="<?= htmlspecialchars($template['description']) ?>" title="<?= t('Copy to Clipboard') ?>">
                                    <i class="fa fa-clipboard" aria-hidden="true"></i> <?= t('Copy') ?>
                                </legend>
                                <?= $this->text->markdown($template['description']) ?>
                            </fieldset>
                        </fieldset>
                        <hr class="top-btn-border-top">
                        <a class="top-btn" href="#GlobalTemplatesViewAccordion" title="<?= t('Go to the top of this section') ?>">
                            <i class="fa fa-level-up" aria-hidden="true"></i> <?= t('Section') ?>
                        </a>
                        <a class="top-btn float-right mr-10" href="#main" title="<?= t('Go to the top of this page') ?>">
                            <i class="fa fa-level-up" aria-hidden="true"></i> <?= t('Page') ?>
                        </a>
                        <hr class="top-btn-border-bottom">
                    </div>
                </details>
            <?php endforeach ?>
        </div>
    </details>
<?php endif ?>
