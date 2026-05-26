<?php

/*
 -------------------------------------------------------------------------
 LICENSE

 This file is part of Transferticketentity plugin for GLPI.

 Transferticketentity is free software: you can redistribute it and/or modify
 it under the terms of the GNU Affero General Public License as published by
 the Free Software Foundation, either version 3 of the License, or
 (at your option) any later version.

 Transferticketentity is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 GNU Affero General Public License for more details.

 You should have received a copy of the GNU Affero General Public License
 along with Reports. If not, see <http://www.gnu.org/licenses/>.

 @category  Ticket
 @package   Transferticketentity
 @author    Yannick Comba, Xavier Caillaud, Infotel
 @copyright 2015-2026 Transferticketentity team
 @license   AGPL License 3.0 or (at your option) any later version
            https://www.gnu.org/licenses/gpl-3.0.html
 @link      https://github.com/pluginsGLPI/transferticketentity/
 --------------------------------------------------------------------------
 */

use GlpiPlugin\Transferticketentity\Entity;

Session::checkLoginUser();

if (strpos($_SERVER['PHP_SELF'], "showentitymandatorygroup.php")) {
    header("Content-Type: text/html; charset=UTF-8");
    Html::header_nocache();
} elseif (!defined('GLPI_ROOT')) {
    die("Sorry. You can't access this file directly");
}

Toolbox::logInfo($_POST);
if (isset($_POST['entity_selection'])) {
    $entitites_id = $_POST['entity_selection'];

    $params['entity_choice'] = $entitites_id;
    $getEntitiesRights = Entity::checkEntityRight($params);

    if ($getEntitiesRights['allow_entity_only_transfer'] == 1) {
        echo "<span class='text-danger'>";
        echo " *";
        echo "</span>";
    }
}

