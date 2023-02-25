# TemplateManager

#### _Plugin for [Kanboard](https://github.com/fguillot/kanboard "Kanboard - Kanban Project Management Software")_

Predefined Contents is replaced by the Template Manager. Improve consistency of your project data and save time for repetitive comments using saved templates. Project Editors can create, update and delete templates for each project including adding notes and instructions separate to the template content to help keep content neat. 

Templates can be created for task descriptions (core feature), comments (new feature), global templates (new feature) and email subjects (core feature) all in one place. The global templates feature shows for every project and can be used as a way to guide and advise users within tasks.  Templates can also be useful in environments where auditing is required.

Features
-------------

- Improved and extended the layout, modal and form designs for the `predefined contents` section
- Renamed the `predefined contents` section to `Template Manager`
- Show the total template count in the project dropdown menu directly linking to the Template Manager
- Show individual counts for each template section
- Compatibility with [ApplicationBranding](https://github.com/aljawaid/ApplicationBranding)
  - Total number of templates are shown in the Admin Dashboard
- Add pretty URLs _[(if globally configured)](https://docs.kanboard.org/v1/admin/url-rewriting/ "URL Rewriting must be configured for this feature to work")_
  - `https://mydomain.com/project/[project_id]/templates`
    - _Links to the relevant project's Template Manager section_
  - `https://mydomain.com/global-templates`
    - _Links to the Global Templates section_
  - _Tasks:_
    - `https://mydomain.com/project/[project_id]/templates/tasks/add`
    - `https://mydomain.com/project/[project_id]/templates/tasks/view/[template_id]`
    - `https://mydomain.com/project/[project_id]/templates/tasks/edit/[template_id]`
    - `https://mydomain.com/project/[project_id]/templates/tasks/delete/[template_id]`
  - _Comments:_
    - `https://mydomain.com/project/[project_id]/templates/comments/add`
    - `https://mydomain.com/project/[project_id]/templates/comments/view/[template_id]`
    - `https://mydomain.com/project/[project_id]/templates/comments/edit/[template_id]`
    - `https://mydomain.com/project/[project_id]/templates/comments/delete/[template_id]`
  - _Global Templates:_
    - `https://mydomain.com/global-templates/add`
    - `https://mydomain.com/global-templates/view/[template_id]`
    - `https://mydomain.com/global-templates/edit/[template_id]`
    - `https://mydomain.com/global-templates/delete/[template_id]`    
- Revised Email Subject Templates
  - Added user instructions related to tasks and automatic actions
- **Template Previews** - Preview just the template without the instructions
- **Topics** - Label common templates into topics to help group them together
- **Notes** - Add a short note to describe each template (notes appear as tooltips)
- **Instructions** - Add optional instructions for each template (instructions show in view mode only)
- **This plugin replicates and extends the features from [TemplateTitle](https://github.com/creecros/TemplateTitle). It is safe to uninstall _TemplateTitle_ after installing _TemplateManager_**
- All data is saved in the database

**Task Description Templates**
- Revised `predefined contents` as `Task Description Templates`
- Automatically populate the title of the template into the task title when creating or modifying tasks - imported [TemplateTitle](https://github.com/creecros/TemplateTitle) feature
- Show the template notes to end users in a tooltip when selecting the task description

**NEW Comment Templates**
- Add, update or delete templates for your regular comments which can be used repetitively in any task
- Templates utilise the Markdown Editor to enable complete formatting of comments

**NEW Global Templates**
- Show generic templates common to your personal or organisational workflow (to your end users)
- Inside tasks, global templates are shown under a new **General Templates & Actions** accordion section
- These templates are visible to all user roles and are not restricted by project

**Task Comments**
- Show total number of comments created
- Saved comment templates can be quickly copied from each task
- Global templates are shown in each task above the comments section
- Shows the template notes to end users in a tooltip

**Revised Project Sidebar**
- Replaced the default code to extend the functionality of the project sidebar menu
  - Moved the core hook `'template:project:sidebar'`
    - _Now shows before the Close Project menu link to show content to **all users**_
  - Changed the sort order of the sidebar menu for faster access to project configuration sections
- Add a new hook `'template:project:sidebar:top'`
  - _Displays_ after the Summary menu link to show content to **all users**_
- Add a new hook `'template:project:sidebar:bottom'`
  - _Displays_ after the Delete Project menu link to show content to **all users**_


Screenshots
----------

**Template Manager** - Interface  

![Template Manager](../master/Screenshots/screenshot-template-manager.png "All templates in one place")

![Template Manager](../master/Screenshots/screenshot-template-manager-global-templates.png "All templates in one place")

**Task Description Templates** - Frontend  

![Template Manager](../master/Screenshots/screenshot-task-description-dropdown-frontend.png "Task Description Templates Dropdown")

**Comment Templates** - Frontend  

![Template Manager](../master/Screenshots/screenshot-comments-bar-frontend.png "Comment Templates Quick Usage")

**Global Templates** - Frontend  

![Template Manager](../master/Screenshots/screenshot-global-comments-frontend.png "Global Templates Usage")

**Comment Templates** - View  

![Template Manager](../master/Screenshots/screenshot-view-comment-template.png "View Comment Template")

**Task Description Templates** - Create  

![Template Manager](../master/Screenshots/screenshot-create-task-description-template.png "Create Task Description Template")

**Global Templates** - Edit  

![Template Manager](../master/Screenshots/screenshot-edit-global-template.png "Edit Global Template")

**Comment Templates** - Delete  

![Template Manager](../master/Screenshots/screenshot-delete-comment-template.png "Delete Comment Template")


Usage
-------------

- Go to `Settings` &#10562; About 
  - _To view global totals for your saved templates_
  - _Requires [ApplicationBranding](https://github.com/aljawaid/ApplicationBranding "Remove Kanboard brnading and whitelabel your application using this plugin")_
- Go to any `Project` &#10562; `Project Settings` &#10562; Template Manager
  - _To manage your templates_
- Go to any `Project` &#10562; `Task` &#10562; Create Task
  - _To use your task description templates_
- Go to any `Project` &#10562; `Task` &#10562; Add Comment
  - _To use your comment templates_
- Go to `Settings` &#10562; `Global Templates`
  - _To manage your global templates_
- Go to any `Task` &#10562; General Templates & Actions
  - _To use your global templates_


Compatibility
-------------

- Requires [Kanboard](https://github.com/fguillot/kanboard "Kanboard - Kanban Project Management Software") ≥`1.2.20`

#### Other Plugins & Action Plugins
- _No known issues_
- Compatible with [KanboardCSS](https://github.com/aljawaid/KanboardCSS), [TemplateTitle](https://github.com/creecros/TemplateTitle), [ApplicationBranding](https://github.com/aljawaid/ApplicationBranding), [Glancer](https://github.com/aljawaid/Glancer), [Group_assign](https://github.com/creecros/Group_assign)
#### Core Files & Templates
- `04` Template overrides
- Database Changes:
  - `01` New database table created as `comment_templates`
  - `01` New database table created as `global_templates`
  - `03` New columns added to the `predefined_task_descriptions` table as `topic` `note` `instructions`


Changelog
---------

Read the full [**Changelog**](../master/changelog.md "See changes")
 

Installation
------------

- **Install via the [Kanboard](https://github.com/fguillot/kanboard "Kanboard - Kanban Project Management Software") Plugin Directory**
  - _Go to:_
    - Kanboard: `Plugins` &#10562; `Plugin Directory`
  - _or with [PluginManager](https://github.com/aljawaid/PluginManager) installed:_
    - Kanboard: `Settings` &#10562; `Plugins` &#10562; `Plugin Directory`

**_or_**

- **Install via the [Releases](../master/Releases/ "A copy of each release is saved in the folder") folder**
  - A copy of each release is saved in the `/Releases` folder of the repository
  - Simply extract the `.zip` file into the `/plugins` directory

**_or_**

- **Install via [GitHub](https://github.com/aljawaid "Find the correct plugin from the list of repositories")**
  - Download the `.zip` file and decompress everything under the directory `/plugins`
  - The folder inside the `.zip` must not contain any branch names and must be exact case (matching the plugin name)

_Note: The `/plugins` folder is case-sensitive._

**_or_**

- **Install using Git CLI**
  - `git clone` (_or ftp upload_) and extract the `.zip` file into this folder: `.\plugins\` (must be exact case)


Translations
------------

- _Contributors welcome_
- _Starter template available_

Authors & Contributors
----------------------

- [@aljawaid](https://github.com/aljawaid) - Author
- [Craig Crosby](https://github.com/creecros) - Contributor
- _Contributors welcome_


License
-------
- This project is distributed under the [MIT License](../master/LICENSE "Read The MIT license")
