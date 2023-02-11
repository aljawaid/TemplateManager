# TemplateManager

#### _Plugin for [Kanboard](https://github.com/fguillot/kanboard "Kanboard - Kanban Project Management Software")_

Predefined Contents becomes the new Template Manager. A new interface allows you to create, update and delete new comment templates for each project. This new feature brings task description templates, predefined email subjects and the new comment templates together in one section for each project.


Features
-------------

- Revised `predefined contents` as `Task Description Templates`
- Improved layout
- Renamed the `predefined contents` section to `Template Manager`
- Show total template count in project dropdown with a link to the Template Manager
- Compatibility with [ApplicationBranding](https://github.com/aljawaid/ApplicationBranding)
  - Total number of templates are shown in the Admin Dashboard
- Add pretty URLs _(if globally configured)_
  - `https://mydomain.com/project/[project_id]/templates`
     - _Links to the relevant project's Template Manager section_
  - _Tasks:_
    - `https://mydomain.com/project/[project_id]/templates/tasks/add`
    - `https://mydomain.com/project/[project_id]/templates/tasks/edit/[template_id]`
    - `https://mydomain.com/project/[project_id]/templates/tasks/delete/[template_id]`
  - _Comments:_
    - `https://mydomain.com/project/[project_id]/templates/comments/add`
    - `https://mydomain.com/project/[project_id]/templates/comments/edit/[template_id]`
    - `https://mydomain.com/project/[project_id]/templates/comments/delete/[template_id]`
- Revised Email Subject Templates
  - Added user instructions related to tasks and automatic actions

**NEW Comment Templates**
- Add, update or delete templates for your regular comments which can be used repeatedly in any task
- Templates utilise the Markdown Editor to enable complete formatting of comments
- NEW **Topics** for Comment Templates
  - Label common templates into topics to help group them together
- Templates and topics are saved in the database

**NEW Global Templates**
- Show generic templates common to you personal or organisation workflow to your users
- These templates are visible to all user roles and are not restricted by project
- Global templates are shown in each task above the comments section

**Task Comments**
- Show total number of comments created
- Saved comment templates can be selected from each task through a `Favourites` bar

**Revised Project Sidebar**
- Replaced default code to extend the functionality of the project sidebar menu
  - Moved the core hook `'template:project:sidebar'`
    - _Now shows before the Close Project menu link to show content to **all users**_
  - Changed sort order of menu for faster access to project configuration sections
- Add new hook `'template:project:sidebar:top'`
  - _Shows after the Summary menu link to show content to **all users**_
- Add new hook `'template:project:sidebar:bottom'`
  - _Shows after the Delete Project menu link to show content to **all users**_


Screenshots
----------

**Template Manager**  

![Template Manager](../master/Screenshots/screenshot-name.png "Read Screenshot Name")


Usage
-------------

- Go to `Settings` &#10562; About 
  - _To view your global totals for your saved templates_
  - _Requires [ApplicationBranding](https://github.com/aljawaid/ApplicationBranding "Remove Kanboard brnading and whitelabel your application using this plugin")_
- Go to any `Project` &#10562; `Project Settings` &#10562; Template Manager
  - _To manage your templates_
- Go to any `Project` &#10562; `Task` &#10562; Add Comment
  - _To use your comment templates_


Compatibility
-------------

- Requires [Kanboard](https://github.com/fguillot/kanboard "Kanboard - Kanban Project Management Software") ≥`1.2.20`

#### Other Plugins & Action Plugins
- _No known issues_
- Compatible with [KanboardCSS](https://github.com/aljawaid/KanboardCSS), [TemplateTitle](https://github.com/creecros/TemplateTitle), [ApplicationBranding](https://github.com/aljawaid/ApplicationBranding)
#### Core Files & Templates
- `04` Template overrides
- Database Changes:
  - `01` New database table created as `comment_templates`
  - `01` New column added to `predefined_task_descriptions` as `topic`


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
- _Contributors welcome_


License
-------
- This project is distributed under the [MIT License](../master/LICENSE "Read The MIT license")
