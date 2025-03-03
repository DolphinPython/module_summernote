<?php

include("db.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $pname = mysqli_real_escape_string($conn, $_POST['pname']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $hsec = mysqli_real_escape_string($conn, $_POST['hsec']);
    $sec1 = mysqli_real_escape_string($conn, $_POST['sec1']);
    $content1 = mysqli_real_escape_string($conn, $_POST['content1']);
    $sec2 = mysqli_real_escape_string($conn, $_POST['sec2']);
    $content2 = mysqli_real_escape_string($conn, $_POST['content2']);
    $sec3 = mysqli_real_escape_string($conn, $_POST['sec3']);
    $content3 = mysqli_real_escape_string($conn, $_POST['content3']);
    $fsec = mysqli_real_escape_string($conn, $_POST['fsec']);
    $status = mysqli_real_escape_string($conn, $_POST['status']);

    $query = "INSERT INTO layouts (lname, pname, location, hsec, sec1, content1, sec2, content2, sec3, content3, fsec, status) 
              VALUES ('$lname', '$pname', '$location', '$hsec', '$sec1', '$content1', '$sec2', '$content2', '$sec3', '$content3', '$fsec', '$status')";

    if (mysqli_query($conn, $query)) {
        echo "Data added successfully!";
    } else {
        echo "Error: " . mysqli_error($conn) . " ";
    }

    mysqli_close($conn);
}else{
    echo "Else  Condition";
}

?>


