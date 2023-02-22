<?php

namespace Kanboard\Plugin\TemplateManager\Controller;

use Kanboard\Controller\BaseController;
use Kanboard\Core\Plugin\Directory;

/**
 * Plugin TemplateManager
 * Class TemplateContentController
 * @author aljawaid
 */

class TemplateContentController extends BaseController
{
    public function show(array $values = array(), array $errors = array())
    {
        $project = $this->getProject();

        $this->response->html($this->helper->layout->project('templateManager:project_predefined_content/show', array(
            'values' => empty($values) ? $project : $values,
            'errors' => $errors,
            'project' => $project,
            'predefined_task_descriptions' => $this->taskDescriptionTemplateModel->getAll($project['id']),
            'saved_comment_templates' => $this->taskCommentTemplateModel->getAll($project['id']),
            'title' => 'Template Manager',
        )));
    }

    public function update()
    {
        $project = $this->getProject();
        $values = $this->request->getValues();

        $values = array(
            'id' => $project['id'],
            'name' => $project['name'],
            'predefined_email_subjects' => isset($values['predefined_email_subjects']) ? $values['predefined_email_subjects'] : '',
        );

        list($valid, $errors) = $this->projectValidator->validateModification($values);

        if ($valid) {
            if ($this->projectModel->update($values)) {
                $this->flash->success(t('Email subject templates updated successfully'));
                return $this->response->redirect($this->helper->url->to('TemplateContentController', 'show', array('project_id' => $project['id'], 'plugin' => 'TemplateManager')), true);
            } else {
                $this->flash->failure(t('Unable to update email subject templates'));
            }
        }

        return $this->show($values, $errors);
    }
}
