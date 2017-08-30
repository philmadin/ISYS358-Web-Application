<?php
    ini_set("display_errors", "1");
    error_reporting(E_ALL);
    header('Content-type: '.image_type_to_mime_type(IMAGETYPE_JPEG));
    $id = $_GET['id'];
    $conn = new mysqli("localhost", "root", "", "comp356");
    $query = mysqli_query($conn,"SELECT * FROM images WHERE imageID=".$id);
    echo mysqli_fetch_array($query)['imageBytedata'];
?>