<?php
    function add_item($newtitle, $newdescription){
        global $database;
        $query = "INSERT INTO todoitems
                            (Title,Description)
                  VALUES
                            (:newtitle, :newdescription)";
         $statement = $database->prepare($query);
         $statement->bindValue(':newtitle', $newtitle);
         $statement->bindValue(':newdescription', $newdescription);
         $statement->execute();
         $statement->closeCursor();
    }

    function delete_item($itemnum){
        global $database;
        $query = 'DELETE FROM todoitems 
                  WHERE ItemNum = :itemnum';
        $statement = $database->prepare($query);
        $statement->bindValue(':itemnum', $itemnum);
        $statement->execute();
        $statement->closeCursor();
    }

    function get_items(){
        global $database;
        $query = 'SELECT ItemNum, Title, Description
                  FROM todoitems
                  ORDER BY ItemNum ASC';
        $statement = $database->prepare($query);
        $statement->execute();
        $items = $statement->fetchAll();
        $statement->closeCursor();
        return $items;
    }