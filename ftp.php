<?php
                // define some variables
        $folder_path = "domains/meengineer.co.th/public_html/images/reg/";
        $local_file = "E:/FTP";
        $server_file = "domains/meengineer.co.th/public_html/images/reg/";

        //-- Connection Settings
        $ftp_server = "ftp.meengineer.co.th"; // Address of FTP server.
        $ftp_user_name = "meengineer"; // Username
        $ftp_user_pass = "OC7IuVdsGP"; // Password
        #$destination_file = "FILEPATH";

        // set up basic connection
        $conn_id = ftp_connect($ftp_server);

        // login with username and password
        $login_result = ftp_login($conn_id, $ftp_user_name, $ftp_user_pass);

        // try to download $server_file and save to $local_file
        if (ftp_get($conn_id, $local_file, $server_file, FTP_BINARY)) {
            echo "Successfully written to $local_file\n";
        } else {
            echo "There was a problem\n";
        }

        // close the connection
        ftp_close($conn_id);
?>
