
<?php
    require_once "conn.php";
    if(isset($_POST['submit'])) {

        $name = $_POST['name'];
        $number = $_POST['number'];
        $email = $_POST['email'];

        if($name != "" && $number != "" && $email != "") {
            $sql = "INSERT INTO student (name, number, email) VALUES ('$name', '$number', '$email')";
            if (mysqli_query($conn, query: $sql)) {
                header("Location: index.php");
            } else {
                 echo "Something went wrong. Please try again later.";
            }
        } else {
            echo "Nama, Kelas and Nilai cannot be empty!";
        }
    }
?>