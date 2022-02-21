<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate QR Code</title>
</head>
<body>
    <div id="wrapper">
        <form method="post" action="upload.php">
            QR Content <input type="file" name="qr_text"><br/><br/>
            Folder Name <input type="text" name="folder"><br/><br/>
            <input type="submit" name="generate_text" value="Generate">
        </form>
    </div>

</body>
</html>