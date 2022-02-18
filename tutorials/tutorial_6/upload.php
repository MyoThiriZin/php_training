<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    if (($_FILES['my_file']['name']!="")){
        $target_dir = "upload/";
        $file = $_FILES['my_file']['name'];
        $path = pathinfo($file);
        $filename = $path['filename'];
        $ext = $path['extension'];
        $temp_name = $_FILES['my_file']['tmp_name'];
        $path_filename_ext = $target_dir.$filename.".".$ext;
    
    if (file_exists($path_filename_ext)) {
        echo "Sorry, file already exists.";
    }else{
        move_uploaded_file($temp_name,$path_filename_ext);
        echo "Congratulations! File Uploaded Successfully.";
    }
    }
    ?>
</body>
</html>