<?php

namespace Kanboard\Plugin\TemplateManager\Helper;

use Kanboard\Helper\TaskHelper;
use Kanboard\Plugin\TemplateManager\Model;
use Kanboard\Core\Base;

/**
 * TemplateTitle Helper adjusted for TemplateManager
 *
 * @package helper
 * @author  Craig Crosby
 */
class TemplateTitleHelper extends TaskHelper
{
    public function renderDescriptionAndTitleTemplateDropdown()
    {
        $projectId = $this->request->getIntegerParam('project_id');
        $templates = $this->taskDescriptionTemplateModel->getAll($projectId);

        if (!empty($templates)) {
            $html = '<div id="TaskDescDropdownWrapper" class="dropdown">';
            $html .= '<a href="#"  id="TaskDescDropdown" class="dropdown-menu dropdown-menu-link-icon" title="' . t('Use a task description template') . '"><span class="template-manager-icon-dropdown" aria-hidden="true"></span> <span class="caret-dropdown" aria-hidden="true"></span></a>';
            $html .= '<ul class="task-desc-template-list">';
            $html .= '<span class="template-list-title-tm"><span class="task-desc-icon-dropdown" aria-hidden="true"></span> ' . t('Task Description Templates') . '</span>';
            $html .= '<span class="template-list-title">' . t('Templates available for this project') . '</span>';

            foreach ($templates as $template) {
                $html .= '<li id="TaskTemplate-' . $this->helper->text->e($template['id']) . '" class="predefined-template-item">';
                $html .= '<a href="#" data-template-target="textarea[name=description]" data-template="' . $this->helper->text->e($template['description']) . '" data-templatetitle-target="input[name=title]" data-templatetitle="' . $this->helper->text->e($template['title']) . '" class="js-template-title" ';
                if (!empty($template['note'])) {
                    $html .= 'data-tooltip="' . $this->helper->text->e($template['note']) . '"';
                };
                $html .= '>';
                $html .= $this->helper->text->e($template['title']);
                $html .= '</a>';
                $html .= '</li>';
            }

            $html .= '</ul></div>';
            return $html;
        }

        return '';
    }
}
