<!DOCTYPE html>
<html lang="en">
<?php
    require_once "conn.php";
    if (isset($_POST['name']) && isset($_POST['kelas']) && isset($_POST['nilai'])) {
        $name = $_POST['name'];
        $kelas = $_POST['kelas'];
        $nilai = $_POST['nilai'];
        $sql = "UPDATE student SET name = '$name', class = '$kelas', nilai = $nilai WHERE id = ".$_GET['id'];
        if (mysqli_query($conn, $sql)) {
            header("Location: index.php");
        } else {
            echo "Something went wrong. Please try again later.";
        }
    }
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP - MYSQL - CRUD/Update</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-9ndCyUa3Y6k73lg+EVYlNqTZZZ1z8whjAN1l5+5eF3evo2uyQqV4q5p5jp9DIhFi" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-pprn3073KE6tl6/2lgI1wItU1zWfAfg5TFEJeFaGc5j5UlKkq5wiUS5F5Y3y3e69x" 
    crossorigin="anonymous"></script>
</head>

<body>
    <section>
        <h1 style ="text-align: center;margin: 50px 0;">Update Data</h1>
        <div class = "container">
            <?php
                require_once "conn.php";
                $sql_query = "SELECT * FROM student WHERE id = ".$_GET['id'];
                if ($result = $conn->query($sql_query)) {
                    while ($row = $result->fetch_assoc()) {
                        $id = $row['id'];
                        $name = $row['name'];
                        $kelas = $row['class'];
                        $nilai = $row['nilai'];
            ?> 
                            <form action="updatedata.php?id=<?php echo $id; ?>" method="post">
                                <div class="row">
                                        <div class = "form-group col-lg-4">        
                                            <label for="name">Nama Siswa</label>
                                            <input type="text" name="name" id="name" class="form-control" value="<?php echo $name; ?>" required>
                                        </div>
                                        <div class="form-group col-lg-3">
                                            <label for="kelas">Kelas</label>
                                            <select name="kelas" id="kelas" class="form-control" required>
                                                <option value="">Pilih Kelasmu</option>
                                                <option value="kelas 10" <?php if($kelas == "kelas 10") { echo "selected"; } ?>>Kelas 10</option>
                                                <option value="kelas 11" <?php if($kelas == "kelas 11") { echo "selected"; } ?>>Kelas 11</option>
                                                <option value="kelas 12" <?php if($kelas == "kelas 12") { echo "selected"; } ?>>Kelas 12</option>
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-3">
                                            <label for="nilai">Nilai</label>
                                            <input type="text" name="nilai" id="nilai" class="form-control" value="<?php echo $nilai; ?>" required>
                                        </div>
                                        <div class="form-group col-lg-2" style="display: grid; align-items: flex-end;">
                                            <input type="submit" name="submit" id="submit" class="btn btn-primary" value="Update">
                                        </div>
                                </div>
                            </form>
            <?php
                    }
                }
            ?>
        </div>
    </section>
</body>

</html>