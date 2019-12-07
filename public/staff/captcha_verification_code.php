<?php
/*
The verification code -- CAPTCHA

Requirements:
1. 4 random characters : A-Z a-z 0-9
2. white background with black border
3. 100 noise pixel (colorful)
4. random titling angle for each character
5. random font for each character

Processes:
1. create canvas: imagecreatetruecolor($whidth,$height);
2. create ink: imagecolorallocate($image,$red,$green,$blue);
3. create the background;
4. create content for the verification code: mt_rand($min,$max);
5. put the words: imagettftext($image,$size,$angle,$x,$y,$color,$font,$string);
*/

session_start();
($image = imagecreatetruecolor(100, 40)) or die("Cannot create canvas");
$red = imagecolorallocate($image, 255, 0, 0);
$green = imagecolorallocate($image, 0, 255, 0);
$blue = imagecolorallocate($image, 0, 0, 255);
$white = imagecolorallocate($image, 255, 255, 255);
$black = imagecolorallocate($image, 0, 0, 0);
imagefill($image, 0, 0, $white);
imagerectangle($image, 1, 1, 99, 39, $black);
// imagesetpixel($image, x, y, color);
$color = array($red, $green, $blue);
for ($i = 1; $i <= 100; $i++) {
    imagesetpixel(
        $image,
        mt_rand(2, 98),
        mt_rand(2, 38),
        $color[mt_rand(0, 2)]
    );
}
$source = "abcdefghijklmnopqrstuvwxyz0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
$first = $source[mt_rand(0, 61)];
$second = $source[mt_rand(0, 61)];
$third = $source[mt_rand(0, 61)];
$fourth = $source[mt_rand(0, 61)];
$_SESSION['vcode'] = $first . $second . $third . $fourth;
/*
 Add ABOSLUTE PATH TO THE FONTS located in ../public/font/.. 
*/
$font = "/opt/lampp/htdocs/projects/content-iro-php-master/public/font/2.ttf";

imagettftext($image, 20, mt_rand(-20, 20), 10, 30, $black, $font, $first);
imagettftext($image, 20, mt_rand(-20, 20), 30, 30, $black, $font, $second);
imagettftext($image, 20, mt_rand(-20, 20), 50, 30, $black, $font, $third);
imagettftext($image, 20, mt_rand(-20, 20), 70, 30, $black, $font, $fourth);
header("content-type:image/png");
imagepng($image);

?>