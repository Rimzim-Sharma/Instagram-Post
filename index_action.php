<?php

session_start();

include('configfile.php');

$file=$_FILES["photo"];
$caption=$_POST["texta"];
$tag=$_POST["tag"];
$location=$_POST["location"];
$hashtag=$_POST["hashtag"];
$share=$_POST["share"];
$datee=$_POST["datee"];
$timee=$_POST["timee"];
echo "<br>";
//print_r($file)

$filename = $file['name'];
$filepath = $file['tmp-name'];
$fileerror = $file['errr'];

if ($fileerror == 0) {
	$destfile = 'upload/'.$filename;
	// echo "$destfile";

	move_uploaded_file($filepath, $destfile);

}

$chstr= implode(",", $share);

$sql=mysqli_query($link,"INSERT INTO task(task_picture,task_caption,task_tag,task_location,task_hashtag,task_share,task_date,task_time) VALUES ('$destfile','$caption','$tag','$location','$hashtag','$chstr','$datee','$timee')");

if($sql==1){
    $_SESSION["PAGE"]= "thank";
    header('location:index.php');
}


if($sql){
	echo "success";
}
else
{
	echo "fail";
}
?>
