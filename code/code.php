<?php
//小猪会气功
session_start();
$code = ""; // really need this initialisation as otherwise the code won't work...
$width = "80";//图片宽
$height = "25";//图片高
$len = "4";//生成几位验证码
$bgcolor = "#ffffff";//背景色
$noise = true;//生成杂点
$noisenum = 200;//杂点数量
$border = true;//边框
$bordercolor = "#000000";
$image = imagecreate($width, $height);
$back = getcolor($bgcolor);

imagefilledrectangle($image, 0, 0, $width-1, $height-1, $back);
$size = $width/$len;
if($size>$height) $size=$height;
$left = ($width-$len*$size*1.1)/$size;
if ($left < 1) $left = 1;

for ($i=0; $i<$len; $i++)
{
    $randtext = rand(0, 9);
    $code .= $randtext;
	$textColor = imagecolorallocate($image, rand(0, 100), rand(0, 100), rand(0, 100));
	$font = rand(1,4).".ttf"; 
	$randsize = rand($size-$size/10, $size+$size/10);
	$location = $left+($i*$size+$size/10);
	imagettftext($image, $randsize, rand(-18,18), $location, rand($size-$size/10, $size+$size/10), $textColor, $font, $randtext); 
}

$_SESSION["code"] = $code;
if($noise == true) setnoise();
if($border==true) imagerectangle($image, 0, 0, $width-1, $height-1, getcolor($bordercolor));

header("Content-type: image/png");
imagepng($image);
imagedestroy($image);

function getcolor($color)
{
     global $image;
	 $color = preg_replace("/#/", "", $color);
     $r = $color[0].$color[1];
     $r = hexdec ($r);
     $b = $color[2].$color[3];
     $b = hexdec ($b);
     $g = $color[4].$color[5];
     $g = hexdec ($g);
     $color = imagecolorallocate ($image, $r, $b, $g); 
     return $color;
}
function setnoise()
{
	global $image, $width, $height, $back, $noisenum;
	for ($i=0; $i<$noisenum; $i++){
		$randColor = imagecolorallocate($image, rand(0, 255), rand(0, 255), rand(0, 255));  
		imagesetpixel($image, rand(0, $width), rand(0, $height), $randColor);
	} 
}
?> 