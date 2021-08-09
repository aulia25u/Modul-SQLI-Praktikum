<?php
// include database connection file
include_once("database.php");

// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{
    $id = $_POST['id'];
    $nama=$_POST['nama'];
    $kode_asisten=$_POST['kode_asisten'];

    // update user data
    $result = mysqli_query($con, "UPDATE asisten SET nama='$nama',kode_asisten='$kode_asisten' WHERE id=$id");

    // Redirect to homepage to display updated user in list
    header("Location: data-asisten.php");
}
?>
<?php

// Getting id from url
$id = $_GET['id'];

// Fetech user data based on id
$result = mysqli_query($con, "SELECT * FROM asisten WHERE id=$id");

while($user_data = mysqli_fetch_array($result))
{
    $name = $user_data['nama'];
    $kode_asisten = $user_data['kode_asisten'];
}
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
        <h1>Security Laboratory</h1>
        <form name="update_user" method="post" action="edit.php">
            <table border=0 style="margin-top:50px; text-align: center;">
                <tr>
                    <td>Nama</td>
                    <td><input type="text" name="nama" value=<?php echo $name;?>></td>
                </tr>
                <tr>
                    <td>Kode Asisten</td>
                    <td><input type="text" name="kode_asisten" value=<?php echo $kode_asisten;?>></td>
                </tr>
            </table>
            <input type="hidden" name="id" value=<?php echo $_GET['id'];?>>
            <a href="data-asisten.php" class="btn btn-primary" style="margin-top:40px">Back</a>
            <input class="btn btn-success" style="margin-top:40px" type="submit" name="update" value="Update">
        </form>
    </center>
</body>

</html>