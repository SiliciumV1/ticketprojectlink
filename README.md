# Ticket Project Link — Plugin GLPI

Link tickets to projects directly from the ticket list using massive actions in GLPI.

## Features

- **Link tickets to a project**: Select one or more tickets, choose a project from the dropdown, and link them in one click.
- **Unlink tickets from a project**: Select tickets and choose `-----` (no project) to remove all project associations.
- **Duplicate prevention**: If a ticket is already linked to the selected project, it won't create a duplicate entry.
- **Native GLPI integration**: Uses the built-in `glpi_itils_projects` table — no custom tables needed.

## Requirements

| Requirement | Version        |
|-------------|----------------|
| GLPI        | 11.0.0 – 11.0.x |
| PHP         | 8.1+           |

## Installation

1. Download or clone this repository:
   ```bash
   cd /var/www/html/glpi/plugins
   git clone https://github.com/SiliciumV1/ticketprojectlink.git
   ```

2. Go to **Setup > Plugins** in GLPI.

3. Click **Install** then **Enable** for "Ticket Project Link".

## Usage

1. Navigate to **Assistance > Tickets**.
2. Select one or more tickets using the checkboxes.
3. In the **Actions** dropdown, select **Link to project**.
4. Choose a project from the dropdown, then click **Submit**.
5. To unlink tickets, select `-----` (empty) as the project and submit.

## File Structure

```
ticketprojectlink/
├── setup.php                      # Plugin registration & hooks
├── hook.php                       # Install/uninstall functions
├── inc/
│   └── massiveaction.class.php    # Massive action logic
├── locales/
│   └── fr_FR.po                   # French translation
├── LICENSE                        # GPLv2+
└── README.md
```

## License

This plugin is licensed under the [GNU General Public License v2.0](LICENSE) or later.

## Author

Developed by [ECGE Conseil](https://github.com/SiliciumV1).
