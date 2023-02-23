<div id="ProjectSidebar" class="sidebar">
    <ul class="project-sidebar-menu">
        <li <?= $this->app->checkMenuSelection('ProjectViewController', 'show') ?>>
            <?= $this->url->link(t('Summary'), 'ProjectViewController', 'show', array('project_id' => $project['id'])) ?>
        </li>

        <?= $this->hook->render('template:project:sidebar:top', array('project' => $project)) ?>

        <?php if ($this->user->hasProjectAccess('ProjectEditController', 'show', $project['id'])): ?>
            <li <?= $this->app->checkMenuSelection('ProjectEditController') ?>>
                <?= $this->url->link(t('Edit Project'), 'ProjectEditController', 'show', array('project_id' => $project['id'])) ?>
            </li>
            <li <?= $this->app->checkMenuSelection('TemplateContentController') ?>>
                <?= $this->url->link(t('Template Manager'), 'TemplateContentController', 'show', array('project_id' => $project['id'], 'plugin' => 'TemplateManager')) ?>
            </li>
            <li <?= $this->app->checkMenuSelection('CategoryController') ?>>
                <?= $this->url->link(t('Categories'), 'CategoryController', 'index', array('project_id' => $project['id'])) ?>
            </li>
            <li <?= $this->app->checkMenuSelection('ProjectTagController') ?>>
                <?= $this->url->link(t('Tags'), 'ProjectTagController', 'index', array('project_id' => $project['id'])) ?>
            </li>
            <li <?= $this->app->checkMenuSelection('ColumnController') ?>>
                <?= $this->url->link(t('Columns'), 'ColumnController', 'index', array('project_id' => $project['id'])) ?>
            </li>
            <li <?= $this->app->checkMenuSelection('SwimlaneController') ?>>
                <?= $this->url->link(t('Swimlanes'), 'SwimlaneController', 'index', array('project_id' => $project['id'])) ?>
            </li>
            <li <?= $this->app->checkMenuSelection('ActionController') ?>>
                <?= $this->url->link(t('Automatic Actions'), 'ActionController', 'index', array('project_id' => $project['id'])) ?>
            </li>
        <?php endif ?>
        <?php if ($this->user->hasProjectAccess('CustomFilterController', 'index', $project['id'])): ?>
            <li <?= $this->app->checkMenuSelection('CustomFilterController') ?>>
                <?= $this->url->link(t('Custom Filters'), 'CustomFilterController', 'index', array('project_id' => $project['id'])) ?>
            </li>
        <?php endif ?>
        <?php if ($this->user->hasProjectAccess('ProjectEditController', 'show', $project['id'])): ?>
            <li <?= $this->app->checkMenuSelection('ProjectViewController', 'share') ?>>
                <?= $this->url->link(t('Public Access'), 'ProjectViewController', 'share', array('project_id' => $project['id'])) ?>
            </li>
            <li <?= $this->app->checkMenuSelection('ProjectViewController', 'notifications') ?>>
                <?= $this->url->link(t('Notifications'), 'ProjectViewController', 'notifications', array('project_id' => $project['id'])) ?>
            </li>
            <li <?= $this->app->checkMenuSelection('ProjectViewController', 'integrations') ?>>
                <?= $this->url->link(t('Integrations'), 'ProjectViewController', 'integrations', array('project_id' => $project['id'])) ?>
            </li>
            <?php if ($project['is_private'] == 0): ?>
                <li <?= $this->app->checkMenuSelection('ProjectPermissionController') ?>>
                    <?= $this->url->link(t('Permissions'), 'ProjectPermissionController', 'index', array('project_id' => $project['id'])) ?>
                </li>
                <li <?= $this->app->checkMenuSelection('ProjectRoleController') ?>>
                    <?= $this->url->link(t('Custom Roles'), 'ProjectRoleController', 'show', array('project_id' => $project['id'])) ?>
                </li>
            <?php endif ?>
            <li <?= $this->app->checkMenuSelection('ProjectViewController', 'importTasks') ?>>
                <?= $this->url->link(t('Import Tasks'), 'ProjectViewController', 'importTasks', array('project_id' => $project['id'])) ?>
            </li>
        <?php endif ?>

        <?= $this->hook->render('template:project:sidebar', array('project' => $project)) ?>

        <?php if ($this->user->hasProjectAccess('ProjectEditController', 'show', $project['id'])): ?>
            <?php if ($project['is_active']): ?>
                <li class="project-close" title="<?= t('Closing this project will make it read only') ?>">
                    <?= $this->modal->confirmLink(t('Close Project'), 'ProjectStatusController', 'confirmDisable', array('project_id' => $project['id'])) ?>
                </li>
            <?php else: ?>
                <li class="project-open">
                    <?= $this->modal->confirmLink(t('Open Project'), 'ProjectStatusController', 'confirmEnable', array('project_id' => $project['id'])) ?>
                </li>
            <?php endif ?>
            <li <?= $this->app->checkMenuSelection('ProjectViewController', 'duplicate') ?>>
                <?= $this->url->link(t('Duplicate Project'), 'ProjectViewController', 'duplicate', array('project_id' => $project['id'])) ?>
            </li>
            <?php if ($this->user->hasProjectAccess('ProjectStatusController', 'remove', $project['id'])): ?>
                <li class="project-delete">
                    <?= $this->modal->confirmLink(t('Delete Project'), 'ProjectStatusController', 'confirmRemove', array('project_id' => $project['id'])) ?>
                </li>
            <?php endif ?>
        <?php endif ?>

        <?= $this->hook->render('template:project:sidebar:bottom', array('project' => $project)) ?>

    </ul>
</div>
