<?php
include('db_conn.php');

function getTotalNumberOfCustomers(){
  global $mysqli;
  $query="SELECT COUNT(type) AS totalCustomers FROM user WHERE type='customer';";
  $result=mysqli_query($mysqli,$query);
  $user_details=mysqli_fetch_assoc($result);
  return $user_details['totalCustomers'];
}

function getTotalNumberOfQuotes(){
  global $mysqli;
  $query="SELECT COUNT(id) AS totalQuotes FROM quote_request;";
  $result=mysqli_query($mysqli,$query);
  $user_details=mysqli_fetch_assoc($result);
  return $user_details['totalQuotes'];
}

function getTotalNumberOfMessages(){
  global $mysqli;
  $query="SELECT COUNT(id) AS messages FROM message;";
  $result=mysqli_query($mysqli,$query);
  $user_details=mysqli_fetch_assoc($result);
  return $user_details['messages'];
}

function getServiceQutoeData(){
  global $mysqli;
  $query="SELECT COUNT(service) as num, service FROM quote_request GROUP BY service;";
  $result=mysqli_query($mysqli,$query);
  $data = array();
  while ($row = mysqli_fetch_assoc($result)){
    $data[] = array(
      'label' => $row['service'],
      'value' => $row['num']
    );
  }

  $data = json_encode($data);
  return $data;

}

function getMessages(){
  global $mysqli;
  $query="SELECT * FROM message ORDER BY id DESC;";
  $result=mysqli_query($mysqli,$query);
  return $result;
}

function getpricing(){
  global $mysqli;
  $query="SELECT * FROM pricing;";
  $result=mysqli_query($mysqli,$query);
  return $result;
}

function getQuotes(){
  global $mysqli;
  $query="SELECT * FROM quote_request JOIN pricing ON quote_request.service = pricing.pricing_id ORDER BY id DESC;";
  $result=mysqli_query($mysqli,$query);
  return $result;
}

function getApprQuotes($cond){
  global $mysqli;
  $query='SELECT cleaning_type, COUNT(cleaning_type) AS "total" FROM quote_request JOIN pricing ON quote_request.service = pricing.pricing_id '.$cond.' GROUP BY pricing.cleaning_type;';
  $result=mysqli_query($mysqli,$query);
  return $result;
}

function myQuotesdet($qtusrid){
  global $mysqli;
  $query='SELECT * FROM `quote_request` JOIN pricing ON quote_request.service = pricing.pricing_id WHERE id="'.$qtusrid.'";';
  $result=mysqli_query($mysqli,$query);
  return $result;
}

function myQuotespaydet($qtusrid, $usrpmc){
  global $mysqli;
  $query='SELECT * FROM paymentdetails WHERE (quote_id = "'.$qtusrid.'" AND user_id = "'.$usrpmc.'");';
  $result=mysqli_query($mysqli,$query);
  return $result;
}

function myQuotes($lgnusrid){
  global $mysqli;
  $query='SELECT * FROM `quote_request` JOIN pricing ON quote_request.service = pricing.pricing_id WHERE user_id="'.$lgnusrid.'";';
  $result=mysqli_query($mysqli,$query);
  return $result;
}

function getCustomers(){
  global $mysqli;
  $query="SELECT id,name,email,phone,address FROM user WHERE type='customer';";
  $result=mysqli_query($mysqli,$query);
  return $result;
}

function reportUsers(){
  global $mysqli;
  $query="SELECT DATE_FORMAT(`registeredDate`, '%M') as `Month`, COUNT(*) as `Total` FROM `user` GROUP BY MONTH(`registeredDate`); ";
  $result=mysqli_query($mysqli,$query);
  return $result;
}

// find unhandled chats
function finduc(){
  global $mysqli;
  $query="SELECT * FROM messages WHERE message_to='';";
  $result=mysqli_query($mysqli,$query);
  return $result;
}

// find messages
function findmsg($column,$usrid){
  global $mysqli;
  $query="SELECT *, DATE_FORMAT(time, '%r') as time12, DATE_FORMAT(time, '%M %e') as montday, date(time) as jdate FROM messages WHERE $column='".$usrid."';";
  $result=mysqli_query($mysqli,$query);
  return $result;
}

function handlingchat($mes_to,$mes_by) {
  global $mysqli;
  $query='UPDATE messages SET message_to="'.$mes_to.'" WHERE message_by="'.$mes_by.'";';
  $result=mysqli_query($mysqli,$query);
  return $result;
}

function gettingChat($person1,$person2){
  global $mysqli;
  $query= 'SELECT *, DATE_FORMAT(time, "%r") as time12, DATE_FORMAT(time, "%M %e") as montday, date(time) as jdate FROM messages WHERE message_to="'.$person1.'" AND message_by="'.$person2.'"OR message_to="'.$person2.'" AND message_by="'.$person1.'";';
  $result=mysqli_query($mysqli,$query);
  return $result;
}

function insert($msssg, $msssgby, $msssgto) {
  global $mysqli;
  $query ='INSERT INTO messages(message, message_by, message_to) VALUES("'.$msssg.'","'.$msssgby.'","'.$msssgto.'");';
  $result=mysqli_query($mysqli,$query);
  return $result;
}

function payquote($cardname, $cardnum, $cardcvv, $expmon, $expyr, $qte, $usrpm) {
  global $mysqli;
  $query ='INSERT INTO paymentdetails(card_name, card_num, cvv, exp_month, exp_year, quote_id, `user_id`) VALUES("'.$cardname.'","'.$cardnum.'","'.$cardcvv.'","'.$expmon.'","'.$expyr.'","'.$qte.'","'.$usrpm.'");';
  $result=mysqli_query($mysqli,$query);
  return $result;
}

function updatenotif($notitle, $notmsg, $notiusr, $notiqid) {
  global $mysqli;
  $query ='INSERT INTO `notification`(notif_title, notif_msg, `user_id`, quote_id) VALUES("'.$notitle.'","'.$notmsg.'","'.$notiusr.'","'.$notiqid.'");';
  $result=mysqli_query($mysqli,$query);
  return $result;
}

function updatequote($stat,$qid){
  global $mysqli;
  $query ='UPDATE quote_request SET status = "'.$stat.'" WHERE id = "'.$qid.'";';
  $result=mysqli_query($mysqli,$query);
  return $result;
}

function notifusr($usrn){
  global $mysqli;
  $query='SELECT * FROM notification WHERE (`user_id`='.$usrn.' OR user_id=0) ORDER BY notif_id DESC';
  $result=mysqli_query($mysqli,$query);
  return $result;
}
?>
 