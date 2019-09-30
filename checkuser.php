<?php 
define("HOSTNAME","localhost");
define("USERNAME","root");
define("PASSWORD","");
define("DATABASE","loginregister");
$db=new mysqli(HOSTNAME,USERNAME,PASSWORD,DATABASE) or die("Unable to connect to Database");
if($db->connect_error){
	die("Connection Failed:" .$db->connect_error);
}
 $username=$db->real_escape_string($_POST["username"]);
$query="SELECT * FROM registration WHERE username='".$username."'";
$res=$db->query($query);
$count=$res->num_rows;
if($count>0){
echo '<img class="red" src="notavailable.png" alt="notavailable" title="not available" />';
}
else{
echo '<img class="green" src="available.png" alt="available" title="available" />';
}
?>