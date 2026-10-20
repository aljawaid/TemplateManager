# Plugin Installation

> **Compatibility:** TemplateManager 3.0.4 requires Kanboard 1.2.54 or later and is tested with PHP 8.2 through 8.5.

- **Install via the [Kanboard](https://github.com/kanboard/kanboard "Kanboard - Kanban Project Management Software") Plugin Directory**
  - _Go to:_
    - Kanboard: `Plugins` &#10562; `Plugin Directory`
  - _or with [PluginManager](https://github.com/aljawaid/PluginManager "A Kanboard plugin") installed:_
    - Kanboard: `Settings` &#10562; `Plugins` &#10562; `Plugin Directory`
- **Install via the [Releases](../master/Releases/ "A copy of each release is saved in the folder") folder**
  - A copy of each release is saved in the `/Releases` folder of the repository
  - Simply extract the `.zip` file into the `/plugins` directory
- **Install via [GitHub](https://github.com/ "Find the correct plugin from the list of repositories")**
  - Download the `.zip` file and decompress everything under the directory `/plugins`
  - The folder inside the `.zip` must not contain any branch names and must be exact case (matching the plugin name)

_Note: The `/plugins` folder is case-sensitive._

Existing global templates remain application-wide during the version 3 upgrade. The upgrade adds a separate project template table and does not convert, copy or delete existing global content.

- **Install using Git CLI**
  - `git clone` (_or ftp upload_) and extract the `.zip` file into this folder: `.\plugins\` (must be exact case)

---

Read the full [**Changelog**](../master/changelog.md "See changes") or view the [**README**](../master/README.md "View README")
