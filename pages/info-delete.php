<?php
require_once('../conn/class_function.php');
// instance obj
$obj = new myclass();
$id=$_POST['id'];
echo $id;
    $obj->fun_deleterecord('tbl_information', 'id', $id);
?>