<?php

namespace Kanboard\Plugin\TemplateManager\Controller;

use Kanboard\Controller\BaseController;
use Kanboard\Core\Controller\PageNotFoundException;

/**
 * Manages reusable templates belonging to the current project.
 *
 * Related test: tests/AuthorizationContractTest.php
 */
class ProjectTemplateController extends BaseController
{
    public function create(array $values = array(), array $errors = array())
    {
        $project = $this->getProject();

        $this->response->html($this->template->render('templateManager:project_template/create', array(
            'values' => $values,
            'errors' => $errors,
            'project' => $project,
        )));
    }

    public function save()
    {
        $this->checkCSRFForm();
        $project = $this->getProject();
        $values = $this->request->getValues();

        list($valid, $errors) = $this->predefinedTaskDescriptionValidator->validate($values);

        if ($valid) {
            $created = $this->projectTemplateModel->createProjectTemplate(
                $project['id'],
                $values['title'],
                $values['description'],
                $values['topic'],
                $values['note'],
                $values['instructions']
            );

            if ($created !== false) {
                $this->flash->success(t('Project template created successfully'));
            } else {
                $this->flash->failure(t('Unable to create this project template'));
            }

            return $this->redirectToTemplates($project['id']);
        }

        return $this->create($values, $errors);
    }

    public function edit(array $values = array(), array $errors = array())
    {
        $project = $this->getProject();
        $template = $this->getTemplate($project['id']);

        $this->response->html($this->template->render('templateManager:project_template/edit', array(
            'values' => empty($values) ? $template : $values,
            'template' => $template,
            'errors' => $errors,
            'project' => $project,
        )));
    }

    public function update()
    {
        $this->checkCSRFForm();
        $project = $this->getProject();
        $template = $this->getTemplate($project['id']);
        $values = $this->request->getValues();

        list($valid, $errors) = $this->predefinedTaskDescriptionValidator->validate($values);

        if ($valid) {
            $updated = $this->projectTemplateModel->updateProjectTemplate(
                $project['id'],
                $template['id'],
                $values['title'],
                $values['description'],
                $values['topic'],
                $values['note'],
                $values['instructions']
            );

            if ($updated !== false) {
                $this->flash->success(t('Project template updated successfully'));
            } else {
                $this->flash->failure(t('Unable to update this project template'));
            }

            return $this->redirectToTemplates($project['id']);
        }

        return $this->edit($values, $errors);
    }

    public function confirm()
    {
        $project = $this->getProject();

        $this->response->html($this->template->render('templateManager:project_template/remove', array(
            'template' => $this->getTemplate($project['id']),
            'project' => $project,
        )));
    }

    public function remove()
    {
        $this->checkCSRFParam();
        $project = $this->getProject();
        $template = $this->getTemplate($project['id']);

        if ($this->projectTemplateModel->deleteProjectTemplate($project['id'], $template['id'])) {
            $this->flash->success(t('Project template deleted successfully'));
        } else {
            $this->flash->failure(t('Unable to delete this project template'));
        }

        return $this->redirectToTemplates($project['id']);
    }

    public function viewTemplate()
    {
        $project = $this->getProject();

        $this->response->html($this->template->render('templateManager:project_template/show', array(
            'template' => $this->getTemplate($project['id']),
            'project' => $project,
        )));
    }

    private function getTemplate($projectId)
    {
        $template = $this->projectTemplateModel->getById(
            $projectId,
            $this->request->getIntegerParam('id')
        );

        if (empty($template)) {
            throw new PageNotFoundException();
        }

        return $template;
    }

    private function redirectToTemplates($projectId)
    {
        return $this->response->redirect($this->helper->url->to(
            'TemplateContentController',
            'show',
            array('project_id' => $projectId, 'plugin' => 'TemplateManager')
        ), true);
    }
}
