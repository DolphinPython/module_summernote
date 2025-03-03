<?php
include("db.php");

$query = "SELECT * FROM `layouts`";
$result = mysqli_query($conn, $query);

if ($result) {
    echo "<table border='1' cellspacing='0' cellpadding='10'>";
    echo "<tr>
            <th>S.No</th>
            <th>Layout Name</th>
            <th>Page Name</th>
            <th>Location</th>
            <th>Header Section</th>
            <th>Section 1</th>
            <th>Content 1</th>
            <th>Section 2</th>
            <th>Content 2</th>
            <th>Section 3</th>
            <th>Content 3</th>
            <th>Footer Section</th>
            <th>Status</th>
            <th>View Images</th>
          </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        $images = explode(",", $row['images']); // Multiple images ko array me convert karo
        $imageData = json_encode($images); // JavaScript ke liye JSON format me convert karo

        echo "<tr>
                <td>{$row['sno']}</td>
                <td>{$row['lname']}</td>
                <td>{$row['pname']}</td>
                <td>{$row['location']}</td>
                <td>{$row['hsec']}</td>
                <td>{$row['sec1']}</td>
                <td>{$row['content1']}</td>
                <td>{$row['sec2']}</td>
                <td>{$row['content2']}</td>
                <td>{$row['sec3']}</td>
                <td>{$row['content3']}</td>
                <td>{$row['fsec']}</td>
                <td>{$row['status']}</td>
                <td>";

        // Agar images exist karti hain tab hi button show hoga
        if (!empty($row['images'])) {
            echo "<button onclick='openModal($imageData)'>View</button>";
        } else {
            echo "No Images";
        }

        echo "</td></tr>";
    }

    echo "</table>";

} else {
    echo "Query failed: " . mysqli_error($conn);
}
?>

<!-- ✅ Modal for Image Slider -->
<div id="imageModal" class="modal">
    <span class="close" onclick="closeModal()">&times;</span>
    <div class="modal-content">
        <img id="modalImage" src="" alt="Image Preview">
        <button class="prev" onclick="prevImage()">&#10094;</button>
        <button class="next" onclick="nextImage()">&#10095;</button>
    </div>
</div>

<!-- ✅ CSS for Modal and Image Slider -->
<style>
    .modal {
        display: none;
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.8);
    }

    .modal-content {
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        margin: auto;
        width: 60%;
        max-width: 600px;
    }

    .modal-content img {
        width: 100%;
        height: auto;
        border-radius: 10px;
    }

    .prev, .next {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background-color: rgba(255, 255, 255, 0.6);
        border: none;
        padding: 10px;
        cursor: pointer;
    }

    .prev {
        left: 10px;
    }

    .next {
        right: 10px;
    }

    .close {
        position: absolute;
        top: 10px;
        right: 20px;
        font-size: 30px;
        color: white;
        cursor: pointer;
    }
</style>

<!-- ✅ JavaScript for Modal & Image Slider -->
<script>
    let images = [];
    let currentIndex = 0;

    function openModal(imageArray) {
        images = imageArray;
        currentIndex = 0;
        document.getElementById("imageModal").style.display = "block";
        showImage();
    }

    function closeModal() {
        document.getElementById("imageModal").style.display = "none";
    }

    function showImage() {
        if (images.length > 0) {
            document.getElementById("modalImage").src = images[currentIndex];
        }
    }

    function prevImage() {
        if (currentIndex > 0) {
            currentIndex--;
            showImage();
        }
    }

    function nextImage() {
        if (currentIndex < images.length - 1) {
            currentIndex++;
            showImage();
        }
    }
</script>
