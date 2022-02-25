<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read Contents</title>
</head>
<body>
    <style>
        h2{
            color: blue;
        }
        table, tr {
        border: 1px solid black;
        border-collapse: collapse
        }
    </style>
    <?php
        $myfile = fopen("test.txt", "r") or die("Unable to open file!");
        while(!feof($myfile)) {
            echo "<h2>TXT FILE</h2>";
            echo fgets($myfile) . "<br>";
        }
        fclose($myfile);
    ?>

    <?php
        $myfile = fopen("test.csv", "r") or die("Unable to open file!");
        while(!feof($myfile)) {
            echo "<h2>CSV FILE</h2>";
            echo fgets($myfile) . "<br>";
        }
        fclose($myfile);
    ?>

    <h2>XLSX FILE</h2>
    <table>
        <?php
            require "vendor/autoload.php";
                $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                $spreadsheet = $reader->load("test.xlsx");
                $worksheet = $spreadsheet->getActiveSheet();
                
                foreach ($worksheet->getRowIterator() as $row) {
                    $cellIterator = $row->getCellIterator();
                    $cellIterator->setIterateOnlyExistingCells(false);
                    
                    echo "<tr>";
                    foreach ($cellIterator as $cell) { echo "<td>". $cell->getValue() ."</td>"; }
                    echo "</tr>";
                }
        ?>
    </table>
    
    <h2>DOC FILE</h2>
    <?php  
        function parseWord($userDoc)
        {
            $fileHandle = fopen($userDoc, "r");
            $line = @fread($fileHandle, filesize($userDoc));
            $lines = explode(chr(0x0D),$line);
            $outtext = "";
            foreach($lines as $thisline)
            {
                $pos = strpos($thisline, chr(0x00));
                if (($pos !== FALSE)||(strlen($thisline)==0))
                {
                } else {
                    $outtext .= $thisline." ";
                }
            }
            $outtext = preg_replace("/[^a-zA-Z0-9\s\,\.\-\n\r\t@\/\_\(\)]/","",$outtext);
            return $outtext;
        }
        $userDoc = "test.doc";
        $text = parseWord($userDoc);
        echo $text;
    ?> 
</body>
</html>