<?php
    require('model/database.php');
    require('model/item_db.php');

 # data that the controler might receive:
    # to be use in the add function
    $newtitle = filter_input(INPUT_POST, 'newtitle', FILTER_SANITIZE_STRING);
    $newdescription = filter_input(INPUT_POST, 'newdescription', FILTER_SANITIZE_STRING); 
    # to be used in the delete function
    $itemnum = filter_input(INPUT_POST, 'itemnum', FILTER_VALIDATE_INT);

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

            add_item($newtitle, $newdescription);
            header('Location: .?action=list_items');
            break;

        case 'delete_item':
            delete_item($itemnum);
            heather('Location: .?action=list_items');
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