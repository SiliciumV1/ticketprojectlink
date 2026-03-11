# Ticket Project Link — Plugin GLPI

🇬🇧 [English](#english) | 🇫🇷 [Français](#français)

---

## English

Link tickets to projects directly from the ticket list using massive actions in GLPI.

### Features

- **Link tickets to a project**: Select one or more tickets, choose a project from the dropdown, and link them in one click.
- **Unlink tickets from a project**: Select tickets and choose `-----` (no project) to remove all project associations.
- **Duplicate prevention**: If a ticket is already linked to the selected project, it won't create a duplicate entry.
- **Native GLPI integration**: Uses the built-in `glpi_itils_projects` table — no custom tables needed.
- **Multi-language support**: English and French included.

### Requirements

| Requirement | Version          |
|-------------|------------------|
| GLPI        | 11.0.0 – 11.0.x |
| PHP         | 8.1+             |

### Installation

1. Download or clone this repository:
   ```bash
   cd /var/www/html/glpi/plugins
   git clone https://github.com/SiliciumV1/ticketprojectlink.git
   ```

2. Go to **Setup > Plugins** in GLPI.

3. Click **Install** then **Enable** for "Ticket Project Link".

### Usage

1. Navigate to **Assistance > Tickets**.
2. Select one or more tickets using the checkboxes.
3. In the **Actions** dropdown, select **Link to project**.
4. Choose a project from the dropdown, then click **Submit**.
5. To unlink tickets, select `-----` (empty) as the project and submit.

---

## Français

Lier des tickets aux projets directement depuis la liste des tickets via les actions massives dans GLPI.

### Fonctionnalités

- **Lier des tickets à un projet** : Sélectionnez un ou plusieurs tickets, choisissez un projet dans le menu déroulant, et liez-les en un clic.
- **Délier des tickets d'un projet** : Sélectionnez les tickets et choisissez `-----` (aucun projet) pour supprimer toutes les associations.
- **Prévention des doublons** : Si un ticket est déjà lié au projet sélectionné, aucun doublon ne sera créé.
- **Intégration native GLPI** : Utilise la table `glpi_itils_projects` — aucune table personnalisée nécessaire.
- **Support multilingue** : Anglais et français inclus.

### Prérequis

| Prérequis | Version          |
|-----------|------------------|
| GLPI      | 11.0.0 – 11.0.x |
| PHP       | 8.1+             |

### Installation

1. Téléchargez ou clonez ce dépôt :
   ```bash
   cd /var/www/html/glpi/plugins
   git clone https://github.com/SiliciumV1/ticketprojectlink.git
   ```

2. Allez dans **Configuration > Plugins** dans GLPI.

3. Cliquez sur **Installer** puis **Activer** pour "Ticket Project Link".

### Utilisation

1. Allez dans **Assistance > Tickets**.
2. Sélectionnez un ou plusieurs tickets via les cases à cocher.
3. Dans le menu **Actions**, sélectionnez **Lier au projet**.
4. Choisissez un projet dans le menu déroulant, puis cliquez sur **Valider**.
5. Pour délier des tickets, sélectionnez `-----` (vide) comme projet et validez.

---

## File Structure

```
ticketprojectlink/
├── setup.php                      # Plugin registration & hooks
├── hook.php                       # Install/uninstall functions
├── inc/
│   └── massiveaction.class.php    # Massive action logic
├── locales/
│   ├── en_GB.po                   # English translation
│   └── fr_FR.po                   # French translation
├── LICENSE                        # GPLv2+
└── README.md
```

## License

This plugin is licensed under the [GNU General Public License v2.0](LICENSE) or later.

## Author

Developed by [SiliciumV1](https://github.com/SiliciumV1).
