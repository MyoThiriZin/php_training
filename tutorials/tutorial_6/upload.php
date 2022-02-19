<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Status</title>
</head>
<body>
    <?php
        if(isset($_POST['submit']))
        {
            if($_POST['foldername'] != "")
            {
                $foldername=$_POST['foldername'];
                if(!is_dir($foldername)) mkdir($foldername);
    
                echo "Folder is uploaded successfully. ";
            }
            else
                echo "Upload folder name is empty. ";
        }

        if (($_FILES['my_file']['name']!="")){
            $target_dir = $foldername;
            $file = $_FILES['my_file']['name'];
            $path = pathinfo($file);
            $filename = $path['filename'];
            $ext = $path['extension'];
            $temp_name = $_FILES['my_file']['tmp_name'];
            $path_filename_ext = $target_dir."/".$filename.".".$ext;
        
            if (file_exists($path_filename_ext)) {
                echo "Sorry, file already exists.";
            }else{
                move_uploaded_file($temp_name,$path_filename_ext);
                echo "Congratulations! File is uploaded successfully.";
            }
        }
    ?>
</body>
</html>