<fieldset id="TemplateSettings" class="panel template-manager-settings">
    <h3 class="">
        <svg width="26px" height="26px" class="template-manager-icon" viewBox="0 0 24 24" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <g stroke-width="0"/>
            <g stroke-linecap="round" stroke-linejoin="round"/>
            <g>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M3 3V9H21V3H3ZM19 5H5V7H19V5Z" fill="#000000"/>
                <path fill-rule="evenodd" clip-rule="evenodd" d="M3 11V21H11V11H3ZM9 13H5V19H9V13Z" fill="#000000"/>
                <path d="M21 11H13V13H21V11Z" fill="#0DB388"/>
                <path d="M13 15H21V17H13V15Z" fill="#0DB388"/>
                <path d="M21 19H13V21H21V19Z" fill="#0DB388"/>
            </g>
        </svg>
        <?= t('Template Manager') ?>
    </h3>
    <fieldset class="">
        <legend><?= t('Global Templates') ?></legend>
        <div class="template-options-section-radios">
            <div class="template-radio-options">
                <?= $this->form->radio('global_templates', t('Enable'), 'enable', true, isset($values['global_templates']) && $values['global_templates'] == 'enable') ?>
                <?= $this->form->radio('global_templates', t('Disable'), 'disable', isset($values['global_templates']) && $values['global_templates'] == 'disable') ?>
                <p class="form-help"><?= t('Existing templates are not deleted through this setting') ?></p>
            </div>
        </div>
        <button type="submit" class="btn btn-blue" title="<?= t('Saves any changes made on this page') ?>"><?= t('Save Settings') ?></button>
    </fieldset>
</fieldset>



