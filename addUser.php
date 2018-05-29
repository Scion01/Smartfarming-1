<?php
    echo "Hello!";
DEFINE ('DB_USER', 'payasmed_admin');
DEFINE ('DB_PASSWORD', 'nishant01#');
DEFINE ('DB_HOST', 'localhost:3306');
DEFINE ('DB_NAME', 'payasmed_smartFarming');

$dbc = @mysqli_connect(DB_HOST, DB_USER,DB_PASSWORD, DB_NAME)
OR die('Could not connect to MySQL: ' .
mysqli_connect_error());

    $sql = "INSERT INTO UserInfo values ('Nishant','Tyagi','nishantnareshtyagi@gmail.com','7276273055','Maharashtra','Pune','Kharadi','9329402304',333,'acre')";

if ($dbc->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $dbc->error;
}

$dbc->close();
?>