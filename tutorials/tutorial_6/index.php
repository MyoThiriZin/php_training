<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Image</title>
</head>
<body>
    <h1>Upload Image Here!</h1>
    <form name="form" method="post" action="upload.php" enctype="multipart/form-data" >
        <input type="file" name="my_file" /><br /><br />
        <input type="submit" name="submit" value="Upload"/>
    </form>
</body>
</html>