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

        if (($_FILES['qr_text']['name']!="")){
            $target_dir = $foldername;
            $file = $_FILES['qr_text']['name'];
            $path = pathinfo($file);
            $filename = $path['filename'];
            $ext = $path['extension'];
            $temp_name = $_FILES['qr_text']['tmp_name'];
            $path_filename_ext = $target_dir."/".$filename.".".$ext;
        
            if (file_exists($path_filename_ext)) {
                echo "Sorry, file already exists.";
            }else{
                move_uploaded_file($temp_name,$path_filename_ext);
                echo "Congratulations! File is uploaded successfully.";
            }
        }
        include('phpqrcode/qrlib.php'); 
        if(isset($_POST['generate_text'])){
            $text=$_POST['qr_text'];
            $folder = $_POST['folder'];
            $dirPath = $folder;
            if(!is_dir($dirPath)){
                mkdir($dirPath);
            }
            $file_name1=$text;
            $file_name= $dirPath. "/" .$file_name1;
            QRcode::png($text,$file_name);
            echo "<img alt='".$file_name."' src='".$file_name."'>";
        }
    ?>
</body>
</html>