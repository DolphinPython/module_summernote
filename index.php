<?php
	include("h.php");
?>


<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include("db.php");

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



    $uploadDir = "uploads/";
    $imagePaths = [];

    if (!empty($_FILES['images']['name'][0])) {
        foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
            $fileName = time() . "_" . basename($_FILES['images']['name'][$key]);
            $targetFilePath = $uploadDir . $fileName;
    
            // Error Check
            if ($_FILES['images']['error'][$key] !== UPLOAD_ERR_OK) {
                echo "Error uploading file: " . $_FILES['images']['name'][$key] . "<br>";
                continue;
            } else {
                // echo "File Error Check: <br>";
            }
    
            // File Type Validation
            $fileType = strtolower(pathinfo($targetFilePath, PATHINFO_EXTENSION));
            $allowedTypes = array("jpg", "jpeg", "png");
            if (!in_array($fileType, $allowedTypes)) {
                echo "Invalid file type: " . $_FILES['images']['name'][$key] . "<br>";
                continue;
            } else {
                // echo "File Type Check: <br>";
            }
    
            // File Size Check
            if ($_FILES['images']['size'][$key] > 5000000) { // 5MB limit
                echo "File too large: " . $_FILES['images']['name'][$key] . "<br>";
                continue;
            } else {
                // echo "File Size Check: <br>";
            }
    
            // Upload File
            if (move_uploaded_file($tmp_name, $targetFilePath)) {
                echo "File uploaded: " . $targetFilePath . "<br>";
                $imagePaths[] = $targetFilePath;
            } else {
                echo "Failed to move file: " . $_FILES['images']['name'][$key] . "<br>";
            }
        }
    }
    
    $images = implode(",", $imagePaths); // Convert array to string for DB




// 	echo "<br>-3-<br>";
    $images = implode(",", $imagePaths); // Convert array to string (comma separated)
// 	echo "<br>-4-<br>";
    // Insert Query
    $query = "INSERT INTO layouts (lname, pname, location, hsec, sec1, content1, sec2, content2, sec3, content3, fsec, status, images) 
              VALUES ('$lname', '$pname', '$location', '$hsec', '$sec1', '$content1', '$sec2', '$content2', '$sec3', '$content3', '$fsec', '$status', '$images')";

// 	echo "<br>";
	
// 	exit();

    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Data & Images Uploaded Successfully!');</script>";
    } else {
        echo "<script>alert('Error: " . mysqli_error($conn) . "');</script>";
    }

    mysqli_close($conn);
}

?>





<!-- start: page -->
<div class="row">
	<div class="col-xs-12">
		<section class="panel">
			<header class="panel-heading">
				<div class="panel-actions">
					<a href="#" class="fa fa-caret-down"></a>
					<a href="#" class="fa fa-times"></a>
				</div>
				<h2 class="panel-title">Add New Layout</h2>
			</header>
			<div class="panel-body">
			<form class="form-horizontal form-bordered" enctype="multipart/form-data" method="POST">
			<!-- <form class="form-horizontal form-bordered" enctype="multipart/form-data" action="add.php" method="POST"> -->
					<div class="form-group">
						<label class="col-md-2 control-label">Layout Name</label>
						<div class="col-md-10">
							<input type="text" class="form-control" name="lname" value="Layout 1">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-2 control-label">Page Name</label>
						<div class="col-md-10">
							<input type="text" class="form-control" name="pname" value="Singhaniya">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-2 control-label">Location</label>
						<div class="col-md-10">
							<input type="text" class="form-control" name="location" value="Delhi">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-2 control-label">Header Section</label>
						<div class="col-md-10">
							<input type="text" class="form-control" name="hsec" value="Header Sec">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-2 control-label">Section 1</label>
						<div class="col-md-10">
							<input type="text" class="form-control" name="sec1" value="Section A">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-2 control-label">Content 1</label>
						<div class="col-md-10">
							<textarea class="summernote" name="content1" data-plugin-summernote
								data-plugin-options='{ "height": 180, "codemirror": { "theme": "ambiance" } }'></textarea>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-2 control-label">Section 2</label>
						<div class="col-md-10">
							<input type="text" class="form-control" name="sec2" value="Section B">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-2 control-label">Content 2</label>
						<div class="col-md-10">
							<textarea class="summernote" name="content2" data-plugin-summernote
								data-plugin-options='{ "height": 180, "codemirror": { "theme": "ambiance" } }'></textarea>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-2 control-label">Section 3</label>
						<div class="col-md-10">
							<input type="text" class="form-control" name="sec3" value="Section C">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-2 control-label">Content 3</label>
						<div class="col-md-10">
							<textarea class="summernote" name="content3" data-plugin-summernote
								data-plugin-options='{ "height": 180, "codemirror": { "theme": "ambiance" } }'></textarea>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-2 control-label">Footer Section</label>
						<div class="col-md-10">
							<input type="text" class="form-control" name="fsec" value="Footer Section">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-2 control-label">Status</label>
						<div class="col-md-10">
							<select class="form-control" name="status">
								<option value="1">Active</option>
								<option value="0">Inactive</option>
							</select>
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-2 control-label">Upload Images</label>
						<div class="col-md-10">
							<input type="file" class="form-control" name="images[]" id="images" multiple accept="image/*">
							<small>Upload multiple images (JPEG, PNG, JPG only)</small>
							<div id="imagePreview" style="margin-top:10px;">
								abc
							</div>
						</div>
					</div>


					<div class="form-group">
						<div class="col-md-12 text-right">
							<button type="submit" class="btn btn-primary">Save</button>
						</div>
					</div>

				</form>
			</div>
		</section>
	</div>
</div>
<!-- end: page -->



<script>
    $(document).ready(function () {
        $("#images").on("change", function () {
            $("#imagePreview").html(""); // Purane previews hatao
            let files = this.files;
            if (files.length > 5) {
                alert("Maximum 5 images allowed!");
                this.value = "";
                return;
            }
            $.each(files, function (index, file) {
                if (!file.type.match("image.*")) {
                    alert("Only image files are allowed!");
                    return;
                }
                let reader = new FileReader();
                reader.onload = function (e) {
                    $("#imagePreview").append(
                        `<img src="${e.target.result}" style="width:100px; height:100px; margin:5px; border:1px solid #ddd;">`
                    );
                };
                reader.readAsDataURL(file);
            });
        });
    });
</script>






<?php
	include("f.php");
?>