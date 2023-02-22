<?php

namespace Kanboard\Plugin\TemplateManager\Controller;

use Kanboard\Controller\BaseController;
use Kanboard\Core\Plugin\Directory;
use Kanboard\Core\Controller\PageNotFoundException;

/**
 * Predefined Task Description Controller
 *
 * @package  Kanboard\Controller
 * Duplicates and extends PredefinedTaskDescriptionController to include topics feature
 */
class TaskDescriptionTemplateController extends BaseController
{
    public function create(array $values = array(), array $errors = array())
    {
        $project = $this->getProject();

        $this->response->html($this->template->render('templateManager:predefined_task_description/create', array(
            'values' => $values,
            'errors' => $errors,
            'project' => $project,
        )));
    }

    public function save()
    {
        $project = $this->getProject();
        $values = $this->request->getValues();

        list($valid, $errors) = $this->predefinedTaskDescriptionValidator->validate($values);

        if ($valid) {
            if ($this->taskDescriptionTemplateModel->create($project['id'], $values['title'], $values['description'], $values['topic'], $values['note'], $values['instructions']) !== false) {
                $this->flash->success(t('Template created successfully'));
            } else {
                $this->flash->failure(t('Unable to create this template'));
            }

            $this->response->redirect($this->helper->url->to('TemplateContentController', 'show', array('project_id' => $project['id'], 'plugin' => 'TemplateManager')), true);
        } else {
            $this->create($values, $errors);
        }
    }

    public function edit(array $values = array(), array $errors = array())
    {
        $project = $this->getProject();
        $template = $this->taskDescriptionTemplateModel->getById($project['id'], $this->request->getIntegerParam('id'));

        $this->response->html($this->template->render('templateManager:predefined_task_description/edit', array(
            'values' => empty($values) ? $template : $values,
            'template' => $template,
            'errors' => $errors,
            'project' => $project,
        )));
    }

    public function update()
    {
        $project = $this->getProject();
        $template = $this->getTemplate($project);
        $values = $this->request->getValues();

        list($valid, $errors) = $this->predefinedTaskDescriptionValidator->validate($values);

        if ($valid) {
            if ($this->taskDescriptionTemplateModel->update($project['id'], $template['id'], $values['title'], $values['description'], $values['topic'], $values['note'], $values['instructions']) !== false) {
                $this->flash->success(t('Template updated successfully'));
            } else {
                $this->flash->failure(t('Unable to update this template'));
            }

            $this->response->redirect($this->helper->url->to('TemplateContentController', 'show', array('project_id' => $project['id'], 'plugin' => 'TemplateManager')), true);
        } else {
            $this->edit($values, $errors);
        }
    }

    public function confirm()
    {
        $project = $this->getProject();
        $template = $this->getTemplate($project);

        $this->response->html($this->template->render('templateManager:predefined_task_description/remove', array(
            'template' => $template,
            'project' => $project,
        )));
    }

    public function remove()
    {
        $this->checkCSRFParam();
        $project = $this->getProject();
        $template = $this->getTemplate($project);

        if ($this->taskDescriptionTemplateModel->remove($project['id'], $template['id'])) {
            $this->flash->success(t('Template deleted successfully'));
        } else {
            $this->flash->failure(t('Unable to delete this template'));
        }

        $this->response->redirect($this->helper->url->to('TemplateContentController', 'show', array('project_id' => $project['id'], 'plugin' => 'TemplateManager')), true);
    }

    protected function getTemplate(array $project)
    {
        $template = $this->taskDescriptionTemplateModel->getById($project['id'], $this->request->getIntegerParam('id'));

        if (empty($template)) {
            throw new PageNotFoundException();
        }

        return $template;
    }

    public function viewTemplate()
    {
        $project = $this->getProject();
        $template = $this->getTemplate($project);

        $this->response->html($this->template->render('templateManager:predefined_task_description/show', array(
            'template' => $template,
            'project' => $project,
        )));
    }
}
