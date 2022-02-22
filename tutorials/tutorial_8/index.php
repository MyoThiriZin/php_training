<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
</head>
<body>

<?php

require_once ("component.php");
require_once ("operation.php");
?>
    <div>
        <h1><i class="fas fa-swatchbook"></i> Book Store</h1>
        <div>
            <form action="" method="post">
                <div>
                    <?php inputElement("<i class='fas fa-id-badge'></i>", "ID", "book_id",setID()); ?>
                </div>
                <div>
                    <?php inputElement("<i class='fas fa-book'></i>", "Book Name", "book_name",""); ?>
                </div>
                <div>
                    <div>
                        <?php inputElement("<i class='fas fa-people-carry'></i>", "Publisher", "book_publisher",""); ?>
                    </div>
                    <div>
                        <?php inputElement("<i class='fas fa-dollar-sign'></i>", "Price", "book_price",""); ?>
                    </div>
                </div>
                <div>
                        <?php buttonElement("btn-create", "btn btn-success", "<i class='fas fa-plus'></i>" ,"create", "data-toggle='tooltip' data-placement='bottom' title='Create'"); ?>
                        <?php buttonElement("btn-read", "btn btn-primary", "<i class='fas fa-sync'></i>" ,"read", "data-toggle='tooltip' data-placement='bottom' title='Read'"); ?>
                        <?php buttonElement("btn-delete", "btn btn-danger", "<i class='fas fa-trash-alt'></i>" ,"delete", "data-toggle='tooltip' data-placement='bottom' title='Delete'"); ?>
                        <?php deleteBtn(); ?>
                </div>
            </form>
        </div>
        <div>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Book Name</th>
                    <th>Publisher</th>
                    <th>Book Price</th>
                </tr>

                <?php
                if(isset($_POST['read'])){
                    $result = getData();

                    if($result){

                        while ($row = mysqli_fetch_assoc($result)){ ?>

                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['book_name']; ?></td>
                                <td><?php echo $row['book_publisher']; ?></td>
                                <td><?php echo '$' . $row['book_price']; ?></td>
                            </tr>

                        <?php
                        }
                    }
                }
                ?>
            </table>
        </div>
    </div>
</body>
</html>