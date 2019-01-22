<?php
$host = "bankproject";
$username="amir";
$password="123";
$database_in_use="test";
	
$mysqli = new mysqli($bankproject, $username, $password, $database_in_use);
if ($mysqli->connect_errno) {
    echo "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
}
echo $mysqli->host_info . "\n";	
$sql = "SELECT id, firstname, lastname FROM MyGuests";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id:transaction ID " . $row["transactionID"]. " - status_of_transaction: " . $row["transaction_queue"]. " " . $row["transaction_complete"]. "<br>";
    }
} else {
    echo "0 results";
}
$mysqli->close();


?>