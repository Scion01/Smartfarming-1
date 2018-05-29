<?php     

$to_email = $_POST['email'];
$subject = "Forgot password";
$message = "Your password is: ".$_POST['password']."\n\nPlease don't ever uninstall the App without logging out first.\n\nWith Regards, Payasmedia";
$headers = 'From: admin@payasmedia.com';
if(mail($to_email,$subject,$message,$headers)){
    echo "sent";
}
else{
    echo "not sent";
}
?>