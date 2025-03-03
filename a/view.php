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
          </tr>";

    while ($row = mysqli_fetch_assoc($result)) {
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
              </tr>";
    }

    echo "</table>";

} else {
    echo "Query failed: " . mysqli_error($conn);
}

?>
