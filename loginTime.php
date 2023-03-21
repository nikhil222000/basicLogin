<?php
$servername="localhost";
$username="root";
$password="";
$database_name="test";

$conn=mysqli_connect($servername,$username,$password,$database_name);

if(!$conn){
    die("Connection Failed");
}else{
    $sql = "SELECT * FROM logintime";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
    }
}
?>

<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <div class="bg-img">
    <div class="content">
        <header>Users Logged in</header><br><br>
        <table style="width: 100%">
            <thead style="color:white">
                <tr>
                    <th>Email Id</th>
                    <th>Date & Time</th>
                </tr>
            </thead>
            <tbody >
                <?php
                while($row = mysqli_fetch_assoc($result)){?>
                    <tr>
                        <td style="color: white"><?php echo $row['email_id']; ?></td>
                        <td style="color: white"><?php echo $row['logInTime']; ?></td>
                    <tr>
                <?php
            }?>
            </tbody>
        </table>
    </div>
  </div>
</body>
</html>