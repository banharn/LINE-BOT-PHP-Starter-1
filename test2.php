<?php
        $fileURL = 'http://1.179.149.85:2146/register/Images/'.$objID.'.'.$filenameExtension;
		$fp = fopen($fileURL, 'w');
		fwrite($fp, $json_content);
		fclose($fp);		
?>
