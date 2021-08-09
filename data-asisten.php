<?php
// Create database connection using config file
include_once("database.php");

// Fetch all users data from database
$result = mysqli_query($con, "SELECT * FROM asisten");
?>

<html>

<head>
    <title>Udah Nyerah Belum ?</title>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="images/img-07.ico" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>

<body>
    <center style="margin-top:100px">
    <img src="./images/logo-secu.png" width="150" height="150" alt="Logo">
    <h1 style="margin-top:10px">Security Laboratory</h1>
    <table width='50%' border=1 style="margin-top:50px; text-align: center;">
        <tr>
            <th>No</th>
            <th>Nama</th>
            <th>Kode Asisten</th>
            <th>Update</th>
        </tr>
    <?php
    while($user_data = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>".$user_data['id']."</td>";
        echo "<td>".$user_data['nama']."</td>";
        echo "<td>".$user_data['kode_asisten']."</td>";
        echo "<td><a href='edit.php?id=$user_data[id]'>Edit</a>";
    }
    ?>
    </table>
    <a href="index.php" class="btn btn-primary" style="margin-top:40px">Coba Cek Disini</a>
        
</center>
</body>

</html>