<?php
    require('model/database.php');
    require('model/item_db.php');

    # this is the default action, always list the items
    $action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);
    if (!$action) {
        $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
        if (!$action) {
            $action = 'list_items';
        }
    }

    switch ($action) {

        case 'add_item':
            $newtitle = filter_input(INPUT_POST, 'newtitle', FILTER_SANITIZE_STRING);
            $newdescription = filter_input(INPUT_POST, 'newdescription', FILTER_SANITIZE_STRING); 
            add_item($newtitle, $newdescription);
            header('Location: .?action=list_items');
            break;

        case 'delete_item':
            $itemnum = filter_input(INPUT_POST, 'itemnum', FILTER_VALIDATE_INT);
            if ($itemnum) delete_item($itemnum);
            header('Location: .?action=list_items');
            break;

        case 'list_items':  
            $items = get_items();   
            include('view/item_list.php');
            break;

        default:
            $action = 'list_items';
            include('.');
            break;
    }