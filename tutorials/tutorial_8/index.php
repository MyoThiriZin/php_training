<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
    <link rel="stylesheet" href="fontawesome-free-6.0.0-beta3-web/css/all.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php

require_once ("component.php");
require_once ("operation.php");
?>
        <div class="container text-center">
        <h1 class="py-4 bg-dark text-light rounded"><i class="fas fa-swatchbook"></i> Book Store</h1>

        <div class="d-flex justify-content-center">
            <form action="" method="post" class="w-50">
                <div class="pt-2">
                    <?php inputElement("<i class='fas fa-id-badge'></i>","ID", "book_id",setID()); ?>
                </div>
                <div class="pt-2">
                    <?php inputElement("<i class='fas fa-book'></i>","Book Name", "book_name",""); ?>
                </div>
                <div class="row pt-2">
                    <div class="col">
                        <?php inputElement("<i class='fas fa-people-carry'></i>","Publisher", "book_publisher",""); ?>
                    </div>
                    <div class="col">
                        <?php inputElement("<i class='fas fa-dollar-sign'></i>","Price", "book_price",""); ?>
                    </div>
                </div>
                <div>
                        <?php buttonElement("btn-create","btn btn-success","<i class='fas fa-plus'></i> Create","create","data-toggle='tooltip' data-placement='bottom' title='Create'"); ?>
                        <?php buttonElement("btn-read","btn btn-primary","<i class='fas fa-eye'></i> Read","read","data-toggle='tooltip' data-placement='bottom' title='Read'"); ?>
                        <?php buttonElement("btn-update","btn btn-light border","<i class='fas fa-pen-alt'></i> Update","update","data-toggle='tooltip' data-placement='bottom' title='Update'"); ?>
                        <?php buttonElement("btn-delete","btn btn-danger","<i class='fas fa-trash-alt'></i> Delete","delete","data-toggle='tooltip' data-placement='bottom' title='Delete'"); ?>
                        <?php deleteBtn();?>
                </div>
            </form>
        </div>

        <div class="d-flex table-data">
            <table class="table table-striped table-dark">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Book Name</th>
                        <th>Publisher</th>
                        <th>Book Price</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody id="tbody">
                   <?php

                   if(isset($_POST['read'])){
                       $result = getData();

                       if($result){

                           while ($row = mysqli_fetch_assoc($result)){ ?>

                               <tr>
                                   <td data-id="<?php echo $row['id']; ?>"><?php echo $row['id']; ?></td>
                                   <td data-id="<?php echo $row['id']; ?>"><?php echo $row['book_name']; ?></td>
                                   <td data-id="<?php echo $row['id']; ?>"><?php echo $row['book_publisher']; ?></td>
                                   <td data-id="<?php echo $row['id']; ?>"><?php echo '$' . $row['book_price']; ?></td>
                                   <td ><i class="fas fa-edit btnedit" data-id="<?php echo $row['id']; ?>"></i></td>
                                </tr>
                   <?php
                           }

                       }
                   }

                   ?>
                </tbody>
            </table>
        </div>
    </div>
    
<script src="jquery-3.6.0.min.js"></script>
<script src="main.js"></script>
</body>
</html>