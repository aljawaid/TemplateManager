# TemplateManager

#### _Plugin for [Kanboard](https://github.com/fguillot/kanboard "Kanboard - Kanban Project Management Software")_

Predefined Contents becomes the new Template Manager. A new interface allows you to create, update and delete new comment templates for each project. This new interface bring task desciption templates, predefined email subjects and the new comment templates together for each project.


Features
-------------

- Revised predefined contents as Task Description Templates
- Show template count in project dropdown
- Compatibility with [ApplicationBranding](https://github.com/aljawaid/ApplicationBranding)
  - Total templates are shown in the Admin Dashboard

**NEW Comment Templates**
- Add, update or delete templates for your regular comments which you may use in any task

**Task Comments**
- Show total number of comments created
- Saved comment templates can be selected from each task

**NEW Project Sidebar**
- Add new hook `'template:project:sidebar:top'` (shows after the Custom Filter menu link)


Screenshots
----------

**Template Manager**  

![Screenshot Name](../master/Screenshots/screenshot-name.png "Read Screenshot Name")


Usage
-------------

Go to `Project Settings` &#10562; Template Manager


Compatibility
-------------

- Requires [Kanboard](https://github.com/fguillot/kanboard "Kanboard - Kanban Project Management Software") ≥`1.2.20`

#### Other Plugins & Action Plugins
- _No known issues_
- Compatible with [KanboardCSS](https://github.com/aljawaid/KanboardCSS), [TemplateTitle](https://github.com/creecros/TemplateTitle), [ApplicationBranding](https://github.com/aljawaid/ApplicationBranding)
#### Core Files & Templates
- `03` Template overrides
- `01` New database table created as `comment_templates`


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
