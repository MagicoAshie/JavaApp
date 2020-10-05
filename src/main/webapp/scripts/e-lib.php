<?php
$topic = $_POST['topic'];
$notes = $_POST['notes'];
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "my_assistant";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // prepare sql and bind parameters
  $stmt = $conn->prepare("SELECT * FROM `e-library` WHERE e_file = :notes ");
  $stmt->execute([":notes"=>$notes]); 
  
  $data = $stmt->fetchAll();
  foreach ($data as $row) {
    
    $isbn = $row['ISBN'];
    $source = $row['Source'];
    $confidence = $row['Confidence'];
    $efile = $row['e_file'];
    echo '<strong>ISBN : </strong>'.$isbn;
    echo '<strong> Source: </strong>'.$source;
    echo '<strong> System Confidence : </strong>'. $confidence;
    echo '<br/><br/>';
    echo "<embed src=".$efile." width='90%' height='500px' type='application/pdf' >";
}
}
catch(PDOException $e) {
echo "Error: " . $e->getMessage();
}
$conn = null;
?>