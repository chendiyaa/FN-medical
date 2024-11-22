
 <?php
    require_once "conn.php";
    $id = $_GET["id"];
    $query = "DELETE FROM student WHERE id = '$id'";
    if (mysqli_query(mysql: $conn, query: $query)) {
        header(header: "location: index.php");

    } else {
         echo "something wengt wrong. Please try again later.";
    }
?>