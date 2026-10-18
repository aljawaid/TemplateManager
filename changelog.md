# Changelog


## v3.0.2 - 2026-10-18

_(most recent changes are listed on top):_
- FIX: Follow Kanboard's selected light or dark theme variables so template pages, tables, forms and introductory text retain readable contrast independently of the operating-system preference


## v3.0.1 - 2026-10-18

_(most recent changes are listed on top):_
- FIX: Keep the global template catalogue within narrow mobile viewports by using the existing bounded table scroll container


## v3.0.0 - 2026-10-18

_(most recent changes are listed on top):_
- NEW: Add project-scoped templates managed by project managers while retaining administrator-managed global templates - closes #17
- FIX: Enforce explicit administrator and project-manager access boundaries for template management
- FIX: Add responsive light and dark presentation with reduced-motion support
- FIX: Replace the ClipboardJS runtime dependency and remove copied content from browser logs
- FIX: Add complete English fallback catalogues and correct the translation starter file
- FIX: Verify fresh database installation, project isolation and Kanboard 1.2.54 compatibility on PHP 8.2 through 8.5


## v2.9

_(most recent changes are listed on top):_
- FIX: Duplicate Translation
- FIX: Modal Styling Conflicts


## v2.8

_(most recent changes are listed on top):_
- FIX: Missing Cursor
- FIX: Modal Title Styling Conflict - affected display of third party modals
- FIX: Schema File Comments

## v2.7

_(most recent changes are listed on top):_
- FIX: Code Syntax - `dropdown.php`
- FIX: Code Syntax Fixes for `remove.php
- FIX: Code Syntax Fixes
- FIX: Code Syntax - `TemplateTitleHelper.php`
- FIX: Code Syntax - `tooltips.css`
- FIX: Code Syntax - `template-manager.css`
- FIX: Code Syntax - `README.md`
- FIX: Plugin Description - compatibility with PluginManager (Installed Plugins Update feature) - remove the word `update` to be excluded from standard search
- FIX: README.md Anchor Link
- FIX: Markdown Syntax
- FIX: README Navigation Links for GitHub
- FIX: Code Syntax
- NEW: Add Footer Badges to README.md
- NEW: Add Section Navigation Links to README.md
- NEW: Add Badges to README.md
- NEW: Add README Page Navigation Links
- Update README.md
- FIX: Content Flow for INSTALL.md
- FIX: Content Flow for README.md
- Cleanup Code
- Create INSTALL.md
- FIX: Database Statement Syntax


## v2.6

_(most recent changes are listed on top):_
- FIX: ClipboardJS Dependency - compatibility with PluginManager
- FIX: Do Not Show Empty Comment Quick Templates Bar
- FIX: CSS IDs Are Not Unique
- FIX: SVG Preventing Anchor Clicks


## v2.5

_(most recent changes are listed on top):_
- NEW: Allow Global Templates to be Disabled - #14
- FIX: Target Table Corners Better


## v2.0

_(most recent changes are listed on top):_
- FIX: Add topic to tooltip in case of text overflow
- NEW: Automatically Populate Comment Templates
- FIX: Translation String
- NEW: Show `note` as Tooltip for Task Descriptions - fixes #10 Merge Plugin Features: TemplateTitle
- NEW: Style Task Description Template Dropdown - #10
- FIX: Merge Duplicate Template Hooks - #11
- FIX: Group_assign and TemplateTitle Compatibility - fixes #11 - thanks @creecros
- FIX: PHP Parse error:  syntax error - thanks @alfredbuehler
- FIX: Remove Project Var usage for #10 - thanks @creecros


## v1.0

_(most recent changes are listed on top):_
- Initial release
- Translations starter template included

---

Read the full [**Changelog**](../master/changelog.md "See changes") or view the [**README**](../master/README.md "View README")
