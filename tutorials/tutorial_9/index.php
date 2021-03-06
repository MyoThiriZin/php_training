<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Books</title>
    <link rel="stylesheet" href="fontawesome-free-6.0.0-beta3-web/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<?php

require_once ("component.php");
require_once ("operation.php");
?>
    <div>
        <h1><i class="fas fa-swatchbook"></i> Book Store</h1>

        <div">
            <form action="" method="post" class="w-50">
                <div>
                    <?php inputElement("<i class='fas fa-id-badge'></i>","ID", "book_id",setID()); ?>
                </div>
                <div>
                    <?php inputElement("<i class='fas fa-book'></i>","Book Name", "book_name",""); ?>
                </div>
                <div>
                    <div>
                        <?php inputElement("<i class='fas fa-people-carry'></i>","Publisher", "book_publisher",""); ?>
                    </div>
                    <div>
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
    <a href="chart_sample.html">Click here to see graph of book price.</a>
    <script src="js/jquery-3.6.0.min.js"></script>
    <script src="main.js"></script>
</body>
</html>