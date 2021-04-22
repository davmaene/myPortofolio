<?php 

function sendMail($im){
    $from_ = $im['_from'];
    $message = $im['message'];
    $from =  $im['from'];
    $subject = $im['subject'];
    $headers  = "MIME-Version: 1.0 \n";
    $headers .= "Content-type: text/html; charset=iso-8859-1 \n";
    $headers .= "From: $from_ <$from>\r\n".
                "MIME-Version: 1.0" . "\r\n" .
                "Content-type: text/html; charset=UTF-8" . "\r\n";
    $headers .= "Disposition-Notification-To: $from  \n";
    $message = wordwrap($message, 100, "\r\n");
    $to = 'davidmened@gmail.com'; //$im['email'];
    // Message de Priorité haute
    // -------------------------
    $headers .= "X-Priority: 1  \n";
    $headers .= "X-MSMail-Priority: High \n";
      // 'X-Mailer: PHP/' . phpversion();
    if(@mail($to,$subject,$message,$headers)) return true;
    else return true; 
      // -------------------------------
}
if(isset($_POST['message'])){
    // var_dump($_POST);
    if(sendMail($_POST)){ echo(200); return true; }
    else{echo(500); return false; }   
}
?>