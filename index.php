<?php
$insert = false;
if(isset($_POST['Name']))
{
    $insert =false;
$server = "localhost";
$username = "root";
$password = "";

$con = mysqli_connect($server, $username, $password);

if (!$con) {
    die("Connection to this database failed due to " . mysqli_connect_error());
}

//echo "success connecting to the db";
$name = $_POST['Name'];
$Organization = $_POST['Organization'];
$email = $_POST['Mail'];
$phone = $_POST['number'];
$desc = $_POST['desc'];

// Note: Add backticks around column names with spaces, like `organization name`
$sql = "INSERT INTO `aryapackaging_enquiry`.`requests` (`name`, `Organization`, `email`, `phone`, `desc`, `date`) VALUES ('$name', '$Organization', '$email', '$phone', '$desc', current_timestamp())";
if($con->query($sql)==true)
{
    //echo "succesfully inserted";
    $insert=true;
}
else
{
    echo "ERROR: $sql <br> $con->error";
}

$con->close();

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arya Packaging</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bgimg" src="bg.jpg" alt="non_woven_bags">
    <div class="container">
        <h1>Welcome to Arya Packaging enquiry form </h1>
        <p>Enter your details here</p>
        <?php
        if($insert==true){
        echo "<p class='submit'>Your form has been succesfully submited we will get back to you soon.Thankyou!</p>";
        }
    ?>
        <form action="index.php" method="post" enctype="multipart/form-data">
            <input type="text" name="Name" id="Name" placeholder="Enter your name">
            <input type="text" name="Organization" id="Organization" placeholder="Enter your Organization">
            <input type="email" name="Mail" id="Mail" placeholder="Enter your mail">
            <input type="phone" name="number" id="number" placeholder="Enter your number">
            <textarea name="desc" id="desc" cols="5" rows="5" placeholder="Enter the product you want to inquire about"></textarea>
            <!-- <input type="file" name="fileUpload" id="fileUpload"> -->
            <button class="btn">SUBMIT</button>
        </form>
    </div>
    <script src="index.js"></script>
</body>
</html>
