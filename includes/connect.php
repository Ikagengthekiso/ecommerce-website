
<?php

$con = mysqli_connect('localhost', 'root', '', 'Mystore');
if (mysqli_connect_errno()) {
    echo "Failed to connect to MySQL: " . mysqli_connect_errno();
    exit();
} else {
    echo "";
}

?>
