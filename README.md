<h1 name="user-content-readme-top">TemplateManager</h1>
<p align="center">
    <a href="https://github.com/aljawaid/TemplateManager/releases">
        <img src="https://img.shields.io/github/v/release/aljawaid/TemplateManager?style=for-the-badge&color=brightgreen" alt="GitHub Latest Release (by date)" title="GitHub Latest Release (by date)">
    </a>
    <a href="https://github.com/aljawaid/TemplateManager/releases">
        <img src="https://img.shields.io/github/downloads/aljawaid/TemplateManager/total?style=for-the-badge&color=orange" alt="GitHub All Releases" title="GitHub All Downloads">
    </a>
    <a href="https://github.com/aljawaid/TemplateManager/releases">
        <img src="https://img.shields.io/github/directory-file-count/aljawaid/TemplateManager?style=for-the-badge&color=orange" alt="GitHub Repository File Count" title="GitHub Repository File Count">
    </a>
    <a href="https://github.com/aljawaid/TemplateManager/releases">
        <img src="https://img.shields.io/github/repo-size/aljawaid/TemplateManager?style=for-the-badge&color=orange" alt="GitHub Repository Size" title="GitHub Repository Size">
    </a>
    <a href="https://github.com/aljawaid/TemplateManager/releases">
        <img src="https://img.shields.io/github/languages/code-size/aljawaid/TemplateManager?style=for-the-badge&color=orange" alt="GitHub Code Size" title="GitHub Code Size">
    </a>
</p>
<p align="center">
    <a href="https://github.com/aljawaid/TemplateManager/discussions">
        <img src="https://img.shields.io/github/discussions/aljawaid/TemplateManager?style=for-the-badge&color=blue" alt="GitHub Discussions" title="Read Discussions">
    </a>
    <a href="https://github.com/aljawaid/TemplateManager/compare">
        <img src="https://img.shields.io/github/commits-since/aljawaid/TemplateManager/latest?include_prereleases&style=for-the-badge&color=blue" alt="GitHub Commits Since Last Release" title="GitHub Commits Since Last Release">
    </a>
    <a href="https://github.com/aljawaid/TemplateManager/compare">
        <img src="https://img.shields.io/github/commit-activity/m/aljawaid/TemplateManager?style=for-the-badge&color=blue" alt="GitHub Commit Monthly Activity" title="GitHub Commit Monthly Activity">
    </a>
    <a href="https://github.com/kanboard/kanboard" title="Kanboard - Kanban Project Management Software">
        <img src="https://img.shields.io/badge/Plugin%20for-kanboard-D40000?style=for-the-badge&labelColor=000000" alt="Kanboard">
    </a>
</p>

Speed through your tasks replacing Predefined Contents with the new Template Manager. Users can impove consistency of project data whilst saving time creating repetitive comments using saved templates. Project Editors can easily manage their template content for each project.

Templates can be created for task descriptions (core feature), comments (new feature), global templates (new feature) and email subjects (core feature) all in one place including adding notes and instructions separate to the template content to help keep content neat. The global templates feature displays for every project and can be used as a way to guide and advise users within tasks. Templates can also be useful in environments where auditing or standardization is required.

<p align="right">[<a href="#user-content-readme-bottom">&#8595; Bottom</a>] [<a href="#screenshots">&#8594; Next</a>] [<a href="#user-content-readme-top">&#8593; Top</a>]</p>

## Features

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
- Automatically populate the comment template to the text editor when creating comments

**NEW Global Templates**
- Show generic templates common to your personal or organisational workflow (to your end users)
- Inside tasks, global templates are shown under a new **General Templates & Actions** accordion section
- These templates are visible to all user roles and are not restricted by project
- Can be disabled through `Settings`

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

<p align="right">[<a href="#user-content-readme-bottom">&#8595; Bottom</a>] [<a href="#features">&#8592; Previous</a>] [<a href="#usage">&#8594; Next</a>] [<a href="#user-content-readme-top">&#8593; Top</a>]</p>

## Screenshots

**Template Manager** - Interface  

![Template Manager](../master/Screenshots/screenshot-template-manager.png "All templates in one place")

**Template Manager** - Settings  

![Template Manager](../master/Screenshots/screenshot-template-manager-settings.png "Disable Global Templates")


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

<p align="right">[<a href="#user-content-readme-bottom">&#8595; Bottom</a>] [<a href="#features">&#8592; Previous</a>] [<a href="#installation--compatibility">&#8594; Next</a>] [<a href="#user-content-readme-top">&#8593; Top</a>]</p>

## Usage

- Go to `Settings` &#10562; About
  - _To view global totals for your saved templates_
  - _Requires [ApplicationBranding](https://github.com/aljawaid/ApplicationBranding "Remove Kanboard brnading and whitelabel your application using this plugin")_
- Go to `Settings` &#10562; `Application` &#10562; Template Manager
  - _To manage settings_
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

<p align="right">[<a href="#user-content-readme-bottom">&#8595; Bottom</a>] [<a href="#screenshots">&#8592; Previous</a>] [<a href="#authors--contributors">&#8594; Next</a>] [<a href="#user-content-readme-top">&#8593; Top</a>]</p>

## Installation & Compatibility

<p align="left">
    <a href="https://github.com/aljawaid/TemplateManager/actions/workflows/linter.yml">
        <img src="https://github.com/aljawaid/TemplateManager/actions/workflows/linter.yml/badge.svg?branch=master&event=push" alt="Code Scanning" title="View Test">
    </a>
    <a href="https://github.com/aljawaid/TemplateManager/actions/workflows/php-compatibility-7.4.yaml">
        <img src="https://github.com/aljawaid/TemplateManager/actions/workflows/php-compatibility-7.4.yaml/badge.svg?branch=master&event=push" alt="PHP Compatibility Test" title="View Test">
    </a>
    <a href="https://github.com/aljawaid/TemplateManager/actions/workflows/php-compatibility-8.0.yaml">
        <img src="https://github.com/aljawaid/TemplateManager/actions/workflows/php-compatibility-8.0.yaml/badge.svg?branch=master&event=push" alt="PHP Compatibility Test" title="View Test">
    </a>
    <a href="https://github.com/aljawaid/TemplateManager/actions/workflows/php-compatibility-8.2.yaml">
        <img src="https://github.com/aljawaid/TemplateManager/actions/workflows/php-compatibility-8.2.yaml/badge.svg?branch=master&event=push" alt="PHP Compatibility Test" title="View Test">
    </a>
</p>

<details>
    <summary><strong>Installation</strong></summary>

- Install via the **[Kanboard](https://github.com/kanboard/kanboard "Kanboard - Kanban Project Management Software") Plugin Directory** or see [INSTALL.md](../master/INSTALL.md)
- Read the full [**Changelog**](../master/changelog.md "See changes") to see the latest updates

</details>
<details>
    <summary><strong>Compatibility</strong></summary>

- Requires [Kanboard](https://github.com/kanboard/kanboard "Kanboard - Kanban Project Management Software") ≥`1.2.20`
- **Other Plugins & Action Plugins**
  - _No known issues_
  - Compatible with [KanboardCSS](https://github.com/aljawaid/KanboardCSS), [TemplateTitle](https://github.com/creecros/TemplateTitle), [ApplicationBranding](https://github.com/aljawaid/ApplicationBranding), [Glancer](https://github.com/aljawaid/Glancer), [Group_assign](https://github.com/creecros/Group_assign), [PluginManager](https://github.com/aljawaid/PluginManager)
- **Core Files & Templates**
  - `04` Template overrides
  - Database Changes:
    - `01` New database table created as `comment_templates`
    - `01` New database table created as `global_templates`
    - `03` New columns added to the `predefined_task_descriptions` table as `topic` `note` `instructions`

</details>
<details>
    <summary><strong>Translations</strong></summary>

- _Starter template available_

</details>

<p align="right">[<a href="#user-content-readme-bottom">&#8595; Bottom</a>] [<a href="#usage">&#8592; Previous</a>] [<a href="#license">&#8594; Next</a>] [<a href="#user-content-readme-top">&#8593; Top</a>]</p>

## Authors & Contributors

- [@aljawaid](https://github.com/aljawaid) - Author
- [Craig Crosby](https://github.com/creecros) - Contributor
- _Contributors welcome_

<p align="right">[<a href="#user-content-readme-bottom">&#8595; Bottom</a>] [<a href="#installation--compatibility">&#8592; Previous</a>] [<a href="#user-content-readme-top">&#8593; Top</a>]</p>

## License

- This project is distributed under the [MIT License](../master/LICENSE "Read The MIT license")

---

<p align="center">
    <a href="https://github.com/aljawaid/TemplateManager/stargazers" title="View Stargazers">
        <img src="https://img.shields.io/github/stars/aljawaid/TemplateManager?logo=github&style=flat-square" alt="TemplateManager">
    </a>
    <a href="https://github.com/aljawaid/TemplateManager/forks" title="See Forks">
        <img src="https://img.shields.io/github/forks/aljawaid/TemplateManager?logo=github&style=flat-square" alt="TemplateManager">
    </a>
    <a href="https://github.com/aljawaid/TemplateManager/blob/master/LICENSE" title="Read License">
        <img src="https://img.shields.io/github/license/aljawaid/TemplateManager?style=flat-square" alt="TemplateManager">
    </a>
    <a href="https://github.com/aljawaid/TemplateManager/issues" title="Open Issues">
        <img src="https://img.shields.io/github/issues-raw/aljawaid/TemplateManager?style=flat-square" alt="TemplateManager">
    </a>
    <a href="https://github.com/aljawaid/TemplateManager/issues?q=is%3Aissue+is%3Aclosed" title="Closed Issues">
        <img src="https://img.shields.io/github/issues-closed/aljawaid/TemplateManager?style=flat-square" alt="TemplateManager">
    </a>
    <a href="https://github.com/aljawaid/TemplateManager/discussions" title="Read Discussions">
        <img src="https://img.shields.io/github/discussions/aljawaid/TemplateManager?style=flat-square" alt="TemplateManager">
    </a>
    <a href="https://github.com/aljawaid/TemplateManager/compare/" title="Latest Commits">
        <img alt="GitHub commits since latest release (by date)" src="https://img.shields.io/github/commits-since/aljawaid/TemplateManager/latest?style=flat-square">
    </a>
</p>
<a name="user-content-readme-bottom"></a>
<p align="right">[<a href="#user-content-readme-top">&#8593; Top</a>]</p>
