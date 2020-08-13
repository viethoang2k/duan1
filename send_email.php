<?php
if(isset($_POST['email'])) {
 
// EDIT THE 2 LINES BELOW AS REQUIRED
$email_to = "nguenviethoang2000@gmai.com";
$email_subject = "Your email subject line";
 
function died($error) {
// your error code can go here
echo "We are very sorry, but there were error(s) found with the form you submitted. ";
echo "These errors appear below.<br /><br />";
echo $error."<br /><br />";
echo "Please go back and fix these errors.<br /><br />";
die();
}
// validation expected data exists
if(!isset($_POST['first_name']) ||
!isset($_POST['email']) ||
!isset($_POST['telephone']) ||
!isset($_POST['comments'])) {
die('We are sorry, but there appears to be a problem with the form you submitted.');
}
 
$first_name = $_POST['first_name']; // required
$email_from = $_POST['email']; // required
$telephone = $_POST['telephone']; // not required
$comments = $_POST['comments']; // required
 
$error_message = "";
$email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+.[A-Za-z]{2,4}$/';
if(!preg_match($email_exp,$email_from)) {
$error_message .= ' Địa chỉ email không hợp lệ.<br />';
}
$string_exp = "/^[A-Za-z .'-]+$/";
if(!preg_match($string_exp,$first_name)) {
$error_message .= 'The First Name you entered does not appear to be valid.<br />';
}
if(strlen($comments) < 2) {
$error_message .= 'The Comments you entered do not appear to be valid.<br />';
}
if(strlen($error_message) > 0) {
die($error_message);
}
$email_message = "Form details below.
 
";
 
function clean_string($string) {
$bad = array("content-type","bcc:","to:","cc:","href");
return str_replace($bad,"",$string);
}
 
$email_message .= "First Name: ".clean_string($first_name)."
";
$email_message .= "Email: ".clean_string($email_from)."
";
$email_message .= "Telephone: ".clean_string($telephone)."
";
$email_message .= "Comments: ".clean_string($comments)."
";
 
// create email headers
$headers = 'From: '.$email_from."
".
'Reply-To: '.$email_from."
" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers); 
  echo "<p align='center'> Gửi Thành công! </p>";
  echo '<meta http-equiv="refresh" content="1;url=contact.php">';
?>
 

<?php
}
?>