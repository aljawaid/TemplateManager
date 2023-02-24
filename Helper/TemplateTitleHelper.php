<?php

namespace Kanboard\Plugin\TemplateManager\Helper;

use Kanboard\Helper\TaskHelper;
//use Kanboard\Model\PredefinedTaskDescriptionModel;
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
        public function renderDescriptionAndTitleTemplateDropdown($projectId)
    {
        $templates = $this->taskDescriptionTemplateModel->getAll($projectId);

        if (! empty($templates)) {
            $html = '<div id="TaskDescDropdownWrapper" class="dropdown">';
            $html .= '<a href="#"  id="TaskDescDropdown" class="dropdown-menu dropdown-menu-link-icon"><i class="fa fa-floppy-o fa-fw" aria-hidden="true"></i>'.t('Use a task description template').' <i class="fa fa-caret-down" aria-hidden="true"></i></a>';
            $html .= '<ul class="task-desc-template-list">';
            $html .= '<span class="template-list-title">Available templates for this project</span>';

            foreach ($templates as  $template) {
                $html .= '<li id="TaskTemplate-'. $this->helper->text->e($template['id']) .'" class="predefined-template-item">';
                $html .= '<a href="#" data-template-target="textarea[name=description]" data-template="'. $this->helper->text->e($template['description']) .'" data-templatetitle-target="input[name=title]" data-templatetitle="'. $this->helper->text->e($template['title']) .'" class="js-template-title" ';
                if (!empty($template['note'])) {
                    $html .= 'data-tooltip="'. $this->helper->text->e($template['note']) .'"';
                };
                $html .= '>';
                //$html .= '<a href="#" data-template-target="textarea[name=description]" data-template="'.$this->helper->text->e($template['description']).'" class="js-template">';
                //$html .= '<a href="#" data-template-target="input[name=title]" data-template="'.$this->helper->text->e($template['title']).'" class="js-template-title">';
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
