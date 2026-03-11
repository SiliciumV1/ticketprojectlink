<?php
class PluginTicketprojectlinkMassiveAction extends CommonDBTM {

    static function getMassiveActionsForItemtype(array &$actions, $itemtype, $is_deleted = 0, CommonDBTM $checkitem = null) {
        if ($itemtype == 'Ticket') {
            $actions[__CLASS__ . MassiveAction::CLASS_ACTION_SEPARATOR . 'link_to_project'] = 'Lier au projet';
        }
        return $actions;
    }

    static function showMassiveActionsSubForm(MassiveAction $ma) {
        switch ($ma->getAction()) {
            case 'link_to_project':
                Dropdown::show('Project', ['name' => 'projects_id', 'condition' => ['is_deleted' => 0]]);
                echo "<br><br>";
                echo Html::submit('Valider', ['name' => 'massiveaction', 'class' => 'btn btn-primary']);
                return true;
        }
        return parent::showMassiveActionsSubForm($ma);
    }

    static function processMassiveActionsForOneItemtype(MassiveAction $ma, CommonDBTM $item, array $ids) {
        global $DB;
        $input = $ma->getInput();
        $projects_id = isset($input['projects_id']) ? intval($input['projects_id']) : 0;

        switch ($ma->getAction()) {
            case 'link_to_project':
                // Si aucun projet selectionne (-----), retirer tous les liens projet
                if ($projects_id == 0) {
                    foreach ($ids as $ticket_id) {
                        $tid = intval($ticket_id);
                        $DB->delete('glpi_itils_projects', [
                            'itemtype' => 'Ticket',
                            'items_id' => $tid,
                        ]);
                        $ma->itemDone($item->getType(), $ticket_id, MassiveAction::ACTION_OK);
                    }
                    return;
                }
                foreach ($ids as $ticket_id) {
                    $tid = intval($ticket_id);
                    // Verifier si le lien existe deja
                    $iterator = $DB->request([
                        'FROM'  => 'glpi_itils_projects',
                        'WHERE' => [
                            'itemtype'    => 'Ticket',
                            'items_id'    => $tid,
                            'projects_id' => $projects_id,
                        ],
                        'LIMIT' => 1,
                    ]);
                    if (count($iterator) > 0) {
                        $ma->itemDone($item->getType(), $ticket_id, MassiveAction::ACTION_OK);
                        continue;
                    }
                    // Inserer le lien
                    $result = $DB->insert('glpi_itils_projects', [
                        'itemtype'    => 'Ticket',
                        'items_id'    => $tid,
                        'projects_id' => $projects_id,
                    ]);
                    if ($result) {
                        $ma->itemDone($item->getType(), $ticket_id, MassiveAction::ACTION_OK);
                    } else {
                        $ma->itemDone($item->getType(), $ticket_id, MassiveAction::ACTION_KO);
                    }
                }
                return;
        }
    }
}
