<?php
$file_name = "data.txt";
        $file_name = "ftp://meengineer:OC7IuVdsGP@ftp.meengineer.co.th/domains/meengineer.co.th/public_html/images/$file_name";
		$fp = fopen($file_name, 'w');
		fwrite($fp, "dddddd");
		fclose($fp);		
?>
