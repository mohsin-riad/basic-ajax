<?php 
    include 'connection.php';
    $div_id = $_REQUEST['div_id'];
    $query = "SELECT * FROM districts WHERE div_id = '$div_id'";
    $sql = mysqli_query($conn, $query);
    $data = [];
    while($row = mysqli_fetch_array($sql))
    {
        $data[] = $row; // storing data in array
    }
    echo json_encode($data);
?>