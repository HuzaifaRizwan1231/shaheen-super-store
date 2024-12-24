<?php


// $con = new mysqli('sql101.infinityfree.com', 'if0_36670772', 'huzaifa1231', 'if0_36670772_shaheenSuperStore', 3306);

$con = new mysqli('localhost', 'root', '', 'shaheen-super-store', 3306);

if (!$con) {
   die(mysqli_error($con));
}
