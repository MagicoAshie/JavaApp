<?php
if(!isset($_SESSION["audio_name"]))
{
$target_dir='./uploads/';
$_SESSION["target_file"] = $target_dir.basename($_FILES['my_audio']['name']);
//file size limit
$_SESSION["Audio_size"] = ($_FILES["my_audio"]["size"]);
$_SESSION["audio_name"] = ($_FILES["my_audio"]["name"]);

if($_SESSION["Audio_size"]>500000000){
    echo "Please choose a file less than 500mbs of size";
}
elseif($_SESSION["audio_name"] == 'h_ana1.mp3'){
    $_SESSION["CU"] = "anatomy";
    $_SESSION["Lecture"] = "01";
}

elseif (condition) {
    # code...
}
elseif (condition) {
    # code...
}
else {
    # code...
}
$_SESSION["upload"] = ($_FILES["my_audio"]["tmp_name"]);
if (move_uploaded_file($_SESSION["upload"], $_SESSION["target_file"])) {
    //store file path in database
    
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = 'my_assistant';
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

    //check connection
    if($conn->connect_error){
        die('Could not connect: ' .$conn->connect_error);
    }
    $audioPath = mysqli_real_escape_string($conn, $_SESSION["target_file"]);
    $sql = 'INSERT INTO "'.$_SESSION["CU"].'" (Lecture_date , Audio) VALUES (CURDATE(), "'.$audioPath.'")';
    $conn ->query($sql);
    
  
$conn->close();

include('return-topics.php');

} 
else {
    echo "Unsupported file encoding!\n";
}
}
else{
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = 'my_assistant';
    $conn = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

    //check connection
    if($conn->connect_error){
        die('Could not connect: ' .$conn->connect_error);
    }
    $audioPath = mysqli_real_escape_string($conn, $_SESSION["target_file"]);
    $sql = 'INSERT INTO "'.$_SESSION["CU"].'" (Lecture_date , Audio) VALUES (CURDATE(), "'.$audioPath.'")';
    $conn ->query($sql);
    
  
$conn->close();

include('return-topics.php');
}
?>