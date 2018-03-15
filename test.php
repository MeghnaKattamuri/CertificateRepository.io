<?php
if(isset($_POST['submit'])){
// Enable Composer autoloading
$email=$_POST['email'];
$message=$_POST['msg'];
$from=$_POST['from'];
$con=mysqli_connect('localhost','root','','certificaterep');
$sql="select username from certificates where email='$email'";
$result=mysqli_query($con,$sql);
$result=mysqli_fetch_array($result);
$name=$result['username'];
require 'vendor/autoload.php';

// Create image
$image = new \NMC\ImageWithText\Image('template.png');

// Add text to image
$text1 = new \NMC\ImageWithText\Text($message, 3, 25);
$text1->align='center';
$text1->color = '000000';
$text1->font = 'Ubuntu-Medium.ttf';
$text1->lineHeight = 36;
$text1->size = 40;
$text1->startX = 100;
$text1->startY = 250;
$image->addText($text1);
// Add more text to image
$text2 = new \NMC\ImageWithText\Text($name, 1, 30);
$text2->color = '000000';
$text2->font = 'Ubuntu-Medium.ttf';
$text2->lineHeight = 20;
$text2->size = 10;
$text2->startX = 200;
$text2->startY = 420;
$image->addText($text2);

$text3 = new \NMC\ImageWithText\Text($from, 1, 30);
$text3->color = '000000';
$text3->font = 'Ubuntu-Medium.ttf';
$text3->lineHeight = 20;
$text3->size = 10;
$text3->startX = 450;
$text3->startY = 420;
$image->addText($text3);
// Render image
$image->render("$name.jpg");
$sql2="update certificates set Certifcate='$name.jpg',Award='$message' where email='$email'";
if(mysqli_query($con,$sql2))
{
	$sql3="select Certifcate from certificates where email='$email'";
	$redirect=mysqli_query($con,$sql3) or die(mysqli_error($con));
	$redirect=mysqli_fetch_assoc($redirect);
	$redirect=$redirect['Certifcate'];
    header("location: $redirect");
}
else{
	echo mysqli_error($con);
}
}
else
{
	echo "Flow untouched";
}

?>