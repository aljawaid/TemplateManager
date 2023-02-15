<li <?= $this->app->checkMenuSelection('GlobalTemplateController', 'show', 'TemplateManager') ?>>
    <?= $this->url->link(t('Global Templates'), 'GlobalTemplateController', 'show', ['plugin' => 'TemplateManager']) ?>
</li>
