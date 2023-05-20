<div class="template-manager-page-margin">
    <div class="template-manager-page-header">
        <h2 class="">
            <svg width="24px" height="24px" class="globe-icon" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve">
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
            </svg> <?= t('Global Templates') ?>
            <?php if (!empty($saved_global_templates)): ?>
                <span class="templates-menu-count"><?= count($saved_global_templates) ?></span>
            <?php endif ?>
        </h2>
    </div>
    <ul class="add-templates-bar">
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
    </ul>
    <p class="section-intro">
        <?= t('These templates are used to guide users in their workflow. Global templates are available throughout the application. Templates are shown above the comments section of each task. Use topics to group and label similar templates. Use notes to describe the template.') ?>
    </p>
    <?php if (!empty($saved_global_templates)): ?>
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
            <?php foreach ($saved_global_templates as $globalTemplate): ?>
                <tr class="">
                    <td class="template-row pt-5 pl-3 text-center table-corner-bl pp-grey"><?= $this->text->e($globalTemplate['id']) ?></td>
                    <td class="template-row template-title"><?= $this->text->e($globalTemplate['title']) ?></td>
                    <td class="template-row template-note"><?= $this->text->e($globalTemplate['note']) ?></td>
                    <td class="template-row"><?= $this->text->e($globalTemplate['topic']) ?></td>
                    <td class="template-row table-corner-br">
                        <div class="btn-wrapper">
                            <?= $this->helper->app->tooltipMarkdown($globalTemplate['description']) ?>
                            <a id="ViewDescTemplate" href="<?= $this->url->href('GlobalContentController', 'viewTemplate', array('id' => $globalTemplate['id'], 'plugin' => 'TemplateManager'), false, '', false) ?>" class="btn view-comment-template-btn js-modal-medium" title="<?=t('View Template') ?>">
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
                                </svg> <?= t('View') ?>
                            </a>
                            <a id="EditCommentTemplate" href="<?= $this->url->href('GlobalContentController', 'edit', array('id' => $globalTemplate['id'], 'plugin' => 'TemplateManager'), false, '', false) ?>" class="btn edit-comment-template-btn js-modal-medium" title="<?=t('Edit Template') ?>">
                                <svg fill="currentColor" width="20px" height="20px" class="edit-icon" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <g stroke-width="0"/>
                                    <g stroke-linecap="round" stroke-linejoin="round"/>
                                    <g>
                                        <path d="M12.5,10.2071068 L8,14.7071068 L8,16 L9.29289322,16 L13.7928932,11.5 L12.5,10.2071068 Z M13.2071068,9.5 L14.5,10.7928932 L15.7928932,9.5 L14.5,8.20710678 L13.2071068,9.5 Z M12,22 C6.4771525,22 2,17.5228475 2,12 C2,6.4771525 6.4771525,2 12,2 C17.5228475,2 22,6.4771525 22,12 C22,17.5228475 17.5228475,22 12,22 Z M12,21 C16.9705627,21 21,16.9705627 21,12 C21,7.02943725 16.9705627,3 12,3 C7.02943725,3 3,7.02943725 3,12 C3,16.9705627 7.02943725,21 12,21 Z"/>
                                        <path fill="none" stroke="#055D20" d=" M14.8535534,7.14644661 L16.8535534,9.14644661 C17.0488155,9.34170876 17.0488155,9.65829124 16.8535534,9.85355339 L9.85355339,16.8535534 C9.7597852,16.9473216 9.63260824,17 9.5,17 L7.5,17 C7.22385763,17 7,16.7761424 7,16.5 L7,14.5 C7,14.3673918 7.05267842,14.2402148 7.14644661,14.1464466 L14.1464466,7.14644661 C14.3417088,6.95118446 14.6582912,6.95118446 14.8535534,7.14644661 Z"/>
                                    </g>
                                </svg> <?= t('Edit') ?>
                            </a>
                            <a id="DeleteCommentTemplate" href="<?= $this->url->href('GlobalContentController', 'confirm', array('id' => $globalTemplate['id'], 'plugin' => 'TemplateManager'), false, '', false) ?>" class="btn delete-comment-template-btn js-modal-confirm" title="<?=t('Delete Template') ?>">
                                <svg width="20px" height="20px" class="delete-icon" fill="currentColor" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" enable-background="new 0 0 512 512" xml:space="preserve">
                                    <g stroke-width="0"/>
                                    <g stroke-linecap="round" stroke-linejoin="round"/>
                                    <g>
                                        <polygon fill="#055D20" points="335.188,154.188 256,233.375 176.812,154.188 154.188,176.812 233.375,256 154.188,335.188 176.812,357.812 256,278.625 335.188,357.812 357.812,335.188 278.625,256 357.812,176.812 "/>
                                        <path d="M256,0C114.609,0,0,114.609,0,256s114.609,256,256,256s256-114.609,256-256S397.391,0,256,0z M256,472 c-119.297,0-216-96.703-216-216S136.703,40,256,40s216,96.703,216,216S375.297,472,256,472z"/>
                                    </g>
                                </svg> <?= t('Delete') ?>
                            </a>
                        </div>
                    </td>
                </tr>
            <?php endforeach ?>
            </tbody>
        </table>
    <?php else: ?>
        <span class="no-templates global-none"><?= t('Add a template to get started') ?></span>
    <?php endif ?>
</div>
