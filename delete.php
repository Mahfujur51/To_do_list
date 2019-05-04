<?php
include 'db.php';

$id=$_GET['id'];

$sql="delete from task where id='$id'";

$val=$db->query($sql);
if($val){
 header('location:index.php');

}
?>
