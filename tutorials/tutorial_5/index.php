<!DOCTYPE html>
<html>
<body>
    <?php
        $files = array("test.txt", "test.csv");

        $data = "";
        foreach ($files as $file) {
            $data .= @file_get_contents($file)."<br/>";
        }
        
    echo $data;
    ?>

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
        $userDoc = "test.docx";
        $text = parseWord($userDoc);
        echo $text;
    ?> 
</body>
</html>