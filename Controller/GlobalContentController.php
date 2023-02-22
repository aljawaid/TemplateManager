<?php

namespace Kanboard\Plugin\TemplateManager\Controller;

use Kanboard\Controller\BaseController;
use Kanboard\Core\Plugin\Directory;
use Kanboard\Core\Controller\PageNotFoundException;

/**
 * Plugin TemplateManager
 * Class GlobalContentController
 * @author aljawaid
 */

class GlobalContentController extends BaseController
{
    public function create(array $values = array(), array $errors = array())
    {
        $this->response->html($this->template->render('templateManager:global_template/create', array(
            'values' => $values,
            'errors' => $errors,
        )));
    }

    public function save()
    {
        $values = $this->request->getValues();

        list($valid, $errors) = $this->predefinedTaskDescriptionValidator->validate($values);

        if ($valid) {
            if ($this->globalTemplateModel->createGlobalTemplate($values['title'], $values['description'], $values['topic'], $values['note'], $values['instructions']) !== false) {
                $this->flash->success(t('Template created successfully'));
            } else {
                $this->flash->failure(t('Unable to create this template'));
            }

            $this->response->redirect($this->helper->url->to('GlobalTemplateController', 'show', array('plugin' => 'TemplateManager')), true);
        } else {
            $this->create($values, $errors);
        }
    }

    public function edit(array $values = array(), array $errors = array())
    {
        $template = $this->globalTemplateModel->getById($this->request->getIntegerParam('id'));

        $this->response->html($this->template->render('templateManager:global_template/edit', array(
            'values' => empty($values) ? $template : $values,
            'template' => $template,
            'errors' => $errors,
        )));
    }

    public function update()
    {
        $template = $this->globalTemplateModel->getById($this->request->getIntegerParam('id'));
        $values = $this->request->getValues();

        list($valid, $errors) = $this->predefinedTaskDescriptionValidator->validate($values);

        if ($valid) {
            if ($this->globalTemplateModel->updateGlobalTemplate($template['id'], $values['title'], $values['description'], $values['topic'], $values['note'], $values['instructions']) !== false) {
                $this->flash->success(t('Template updated successfully'));
            } else {
                $this->flash->failure(t('Unable to update this template'));
            }

            $this->response->redirect($this->helper->url->to('GlobalTemplateController', 'show', array('plugin' => 'TemplateManager')), true);
        } else {
            $this->edit($values, $errors);
        }
    }

    public function confirm()
    {
        $template = $this->getTemplate();

        $this->response->html($this->template->render('templateManager:global_template/remove', array(
            'template' => $template,
        )));
    }

    public function remove()
    {
        $this->checkCSRFParam();
        $template = $this->getTemplate();

        if ($this->globalTemplateModel->deleteGlobalTemplate($template['id'])) {
            $this->flash->success(t('Template deleted successfully'));
        } else {
            $this->flash->failure(t('Unable to delete this template'));
        }

        $this->response->redirect($this->helper->url->to('GlobalTemplateController', 'show', array('plugin' => 'TemplateManager')), true);
    }

    protected function getTemplate()
    {
        $template = $this->globalTemplateModel->getById($this->request->getIntegerParam('id'));

        if (empty($template)) {
            throw new PageNotFoundException();
        }

        return $template;
    }

    public function viewTemplate()
    {
        $template = $this->getTemplate();

        $this->response->html($this->template->render('templateManager:global_template/show', array(
            'template' => $template,
        )));
    }
}
