<?php
DEFINE ('DB_USER', 'scion01');
DEFINE ('DB_PASSWORD', 'Da{tR{}xyqx8');
DEFINE ('DB_HOST', 'localhost:3306');
DEFINE ('DB_NAME', 'payasmed_smartFarming');

$dbc = @mysqli_connect(DB_HOST, DB_USER,DB_PASSWORD, DB_NAME)
OR die('Could not connect to MySQL: ' .
mysqli_connect_error());
?>
