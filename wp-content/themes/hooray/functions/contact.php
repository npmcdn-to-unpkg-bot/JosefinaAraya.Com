<?php
/**
 *  Contact US
 */
    global $bd_data;
	require_once("../../../../wp-load.php");

	switch($_GET['action'])
    {
        case"send":
            $bd_data 	  = split(",",$_POST[msg]);
            $fullname = trim($bd_data[0]);
            $email	  = trim($bd_data[1]);
            $message  = trim($bd_data[2]);
            $website  = trim($bd_data[3]);

            if($fullname == '' or $fullname == 'Full Name :')
            {
                echo "1";
                exit();
            }
            elseif(!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email)){
                echo "2";
                exit();
            }
            elseif(strlen($message) < 10 or $message == 'Message :')
            {
                echo "3";
                exit();
            }
            elseif($website == '' or $website == 'Subject :')
            {
                echo "4";
                exit();
            }
            $msg  = "From    : $fullname \r\n";
            $msg .= "E-mail  : $email \r\n";
            $msg .= "Subject : $website \r\n";

            $msg .= "-----------------------------\r\n\n";

            $msg .= $message;

            $msg .= " \r\n\n";


            $msg .= "-----------------------------\r\n\n";


            $msg .= "User information \r\n";
            $msg .= "User IP : ".$_SERVER["REMOTE_ADDR"]."\r\n";
            $msg .= "Browser info : ".$_SERVER["HTTP_USER_AGENT"]."\r\n";
            $msg .= "User come from : ".$_SERVER["HTTP_REFERER"];
            mail( stripslashes(bdayh_get_option('contact_email_address')),"New Massage",$msg);
	 	break;
	}
?>
