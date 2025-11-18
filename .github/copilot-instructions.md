# Copilot Instructions for BMN-BPS

## Project Overview

This project is a web-based ticketing system for managing complaints related to Barang Milik Negara (BMN) for BPS Kota Bogor (2025). The codebase is primarily PHP, with front-end assets managed via local plugins (jQuery, Bootstrap, DataTables, Select2, FontAwesome, etc.).

## Architecture & Key Components

- **Entry Point:** `index.php` is the main landing page.
- **Authentication:** Handled via `login.php` and `logout.php`.
- **Admin Features:**
  - `admin/input-keluhan/input_keluhan.php`: Form for submitting complaints.
  - `admin/lihat-tiket-keluhan/lihat_tiket_keluhan.php`: View complaint tickets.
  - `admin/pengguna/`: User management (add, edit, delete, list users).
- **User Features:**
  - `user/input-keluhan/input_keluhan.php`: User complaint submission.
  - `user/lihat-tiket-keluhan/lihat_tiket_keluhan.php`: User ticket view.
- **Assets:** All JS/CSS dependencies are in `plugins/` and are loaded locally (no CDN).
- **Excel Export:** `master-aset-excel/` likely contains scripts for asset export/import.

## Developer Workflows

- **No build step**: PHP is interpreted directly. Place files in the correct directory and access via browser (e.g., `http://localhost/BMN/`).
- **No automated tests**: No test framework or scripts detected. Manual testing via browser is standard.
- **Debugging**: Use `var_dump`, `echo`, or browser dev tools. No Xdebug or advanced debugging setup is present.
- **Dependencies**: Managed via Composer (`composer.json`, `vendor/`). Use `composer install` to restore PHP dependencies if needed.

## Project-Specific Conventions

- **File Naming:** Uses snake_case for PHP files and directories.
- **Separation:** Admin and user features are separated by directory.
- **Inline Styles:** Some HTML uses inline CSS; ensure proper `style` attribute usage.
- **No Framework:** This is a custom PHP app, not using Laravel, CodeIgniter, etc.
- **Localization:** All text is in Indonesian.

## Integration Points

- **Excel/Spreadsheet:** Uses `phpoffice/phpspreadsheet` for Excel operations (see `vendor/phpoffice/phpspreadsheet`).
- **No external APIs**: All logic is local; no evidence of REST or SOAP integrations.

## Examples

- To add a new admin feature, create a new PHP file in `admin/` and link it from the admin dashboard.
- To add a new plugin, place assets in `plugins/` and reference them in your PHP/HTML.

## Key Files & Directories

- `index.php`, `login.php`, `logout.php`: Main entry and authentication
- `admin/`, `user/`: Feature modules
- `plugins/`: All JS/CSS dependencies
- `vendor/`: Composer-managed PHP libraries

---

For more context, see the directory structure and file comments. When in doubt, follow the patterns in existing admin/user modules.
