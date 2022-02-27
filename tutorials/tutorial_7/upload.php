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