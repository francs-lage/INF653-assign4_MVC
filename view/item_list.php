 <?php include('header.php') ?>


<section id="ListItemsSection"> 
            <?php if ($items) { 
                foreach ($items as $item) { 
                    $itemnum = $item['ItemNum'];
                    $title = $item['Title'];
                    $description = $item['Description']; ?>
                  
                    <div class="itemDiv">
                        <div class="title"> <?php echo $title; ?> </div>
                        <div class="description"> <?php echo $description; ?> </div>
                        <div class="button">
                            <form  action="." method="POST" class="deleteForm">
                                <input type="hidden" name="action" value="delete_item">
                                <input type="hidden" name="itemnum" value="<?= $itemnum; ?>">                               
                                <button class="deleteButton">X</button>
                            </form> 
                        </div>
                    </div>      
         <?php }
            } else { ?>
                <div class="itemDiv">The list is empty!</div>
            <?php } ?> 
</section>

 <section id="addItemSection"> 
            <h1 id="h1AddItem"> Add Item </h1>
            <form action="." method="POST" class="addItem" >
                <input type="hidden" name="action" value="add_item">
                <label id="labelNT" for="newtitle">Title:</label>
                <input type="text" id="newtitle" name="newtitle" maxlength="20" required>
                <label id="labelND" for="newdescription">Description:</label>
                <input type="text" id="newdescription" name="newdescription" maxlength="50">
                <div class="addButton"> <button>Add Item</button> </div>
            </form>
 </section>

<?php include('footer.php'); ?>