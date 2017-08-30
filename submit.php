<?php 
$conn = new mysqli("localhost", "root", "", "comp356");
if(isset($_FILES["temp"])){
    $data = file_get_contents($_FILES["temp"]["tmp_name"]);

    $sql = "INSERT INTO images (imageBytedata, imageDate) VALUES (?, ?)";
    if($stmt = mysqli_prepare($conn, $sql)){
        mysqli_stmt_bind_param($stmt, "sd", $data, $date);
        $date = "123";
        if(mysqli_stmt_execute($stmt)){
            echo "Records inserted successfully.";
        } else{
            echo "<br/>ERROR: Could not execute query: $sql. " . mysqli_error($conn);
        }
    } else{
        echo "ERROR: Could not prepare query: $sql. " . mysqli_error($conn);
    }    
    mysqli_stmt_close($stmt);
    mysqli_close($conn);
}
?>
<html>
<body>
<?php

$conn = new mysqli("localhost", "root", "", "comp356");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT * FROM images";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "<img src='getImage.php?id=".$row['imageID']."' />";
    }
} else {
    echo "0 results";
}
mysqli_close($conn);

?>
</body>
</html>