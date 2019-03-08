<?php

        // create curl resource 
        $ch = curl_init(); 

        // set url 
        curl_setopt($ch, CURLOPT_URL, "https://www.google.com/xjs/_/js/k=xjs.ntp.en.GfCY6i1gKJI.O/m=sx,jsa,ntp,d,csi/am=AACwATgaJg/rt=j/d=1/rs=ACT90oEv-t6AAU_J4mQ6N6OCinq8UUadIg"); 

        //return the transfer as a string 
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 

        // $output contains the output string 
        $output = curl_exec($ch); 

        // close curl resource to free up system resources 
        curl_close($ch);   
echo $output;
?>
