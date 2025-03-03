<?php

$conn = mysqli_connect("localhost", "root", "", "a_editor");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


// mysqli_close($conn);

?>
