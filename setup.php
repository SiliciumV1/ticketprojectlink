<?php
define('PLUGIN_TICKETPROJECTLINK_VERSION', '1.0.0');
define('PLUGIN_TICKETPROJECTLINK_MIN_GLPI', '11.0.0');
define('PLUGIN_TICKETPROJECTLINK_MAX_GLPI', '11.0.99');

function plugin_init_ticketprojectlink() {
    global $PLUGIN_HOOKS;

    $PLUGIN_HOOKS['csrf_compliant']['ticketprojectlink'] = true;

    $plugin = new Plugin();
    if ($plugin->isInstalled('ticketprojectlink') && $plugin->isActivated('ticketprojectlink')) {
        $PLUGIN_HOOKS['use_massive_action']['ticketprojectlink'] = 1;
    }
}

function plugin_ticketprojectlink_MassiveActions($itemtype) {
    $actions = [];
    if ($itemtype == 'Ticket') {
        $actions['PluginTicketprojectlinkMassiveAction' . MassiveAction::CLASS_ACTION_SEPARATOR . 'link_to_project'] =
            __('Lier au projet', 'ticketprojectlink');
    }
    return $actions;
}

function plugin_version_ticketprojectlink() {
    return [
        'name'           => 'Lier Tickets aux Projets',
        'version'        => PLUGIN_TICKETPROJECTLINK_VERSION,
        'author'         => 'ECGE Conseil',
        'license'        => 'GPLv2+',
        'requirements'   => [
            'glpi' => [
                'min' => PLUGIN_TICKETPROJECTLINK_MIN_GLPI,
                'max' => PLUGIN_TICKETPROJECTLINK_MAX_GLPI
            ]
        ]
    ];
}

function plugin_ticketprojectlink_check_prerequisites() {
    if (version_compare(GLPI_VERSION, PLUGIN_TICKETPROJECTLINK_MIN_GLPI, 'lt')
        || version_compare(GLPI_VERSION, PLUGIN_TICKETPROJECTLINK_MAX_GLPI, 'gt')) {
        echo "Ce plugin nécessite GLPI >= " . PLUGIN_TICKETPROJECTLINK_MIN_GLPI .
             " et <= " . PLUGIN_TICKETPROJECTLINK_MAX_GLPI;
        return false;
    }
    return true;
}

function plugin_ticketprojectlink_check_config() {
    return true;
}
