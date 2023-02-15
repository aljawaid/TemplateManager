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
            if ($this->globalTemplateModel->createGlobalTemplate($values['title'], $values['description'], $values['topic']) !== false) {
                $this->flash->success(t('Template created successfully'));
            } else {
                $this->flash->failure(t('Unable to create this template'));
            }

            $this->response->redirect($this->helper->url->to('GlobalTemplateController', 'show', array('plugin' => 'TemplateManager')), true);
        } else {
            $this->create($values, $errors);
        }
    }
}
