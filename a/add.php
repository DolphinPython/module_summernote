<?php

include("db.php");

/*
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
*/
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

    // File Upload Logic
    $imagePaths = []; // Array to store file paths
    $uploadDir = "uploads/"; // Upload folder (Make sure this folder exists)
    echo "<br>";
    echo $_FILES['images']['name'];

    if (!empty($_FILES['images']['name'][0])) {
        foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
            $fileName = time() . "_" . basename($_FILES['images']['name'][$key]);
            $targetFilePath = $uploadDir . $fileName;

            // Check file type
            $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
            $allowedTypes = array("jpg", "jpeg", "png");

            if (in_array($fileType, $allowedTypes)) {
                if (move_uploaded_file($tmp_name, $targetFilePath)) {
                    $imagePaths[] = $targetFilePath; // Store path in array
                }
            }
        }
    }

    $images = implode(",", $imagePaths); // Convert array to string (comma separated)
    print_r($images);
    exit();

    // Insert Query
    $query = "INSERT INTO layouts (lname, pname, location, hsec, sec1, content1, sec2, content2, sec3, content3, fsec, images) 
              VALUES ('$lname', '$pname', '$location', '$hsec', '$sec1', '$content1', '$sec2', '$content2', '$sec3', '$content3', '$fsec', '$images')";

    if (mysqli_query($conn, $query)) {
        echo "Data & Images Uploaded Successfully!";
    } else {
        echo "Error: " . mysqli_error($conn) . " ";
    }

    mysqli_close($conn);
}else{
    echo "Else  Condition";
}

?>


