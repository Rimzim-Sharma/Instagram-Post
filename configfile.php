<?php
$link = mysqli_connect('localhost', 'root', '','task1');
if (!$link) {
    die('Could not connect: ' . mysqli_error());
}
echo 'Connected successfully';

?>