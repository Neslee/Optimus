<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>String</title>
</head>
<body>
<?php
  echo 'addcslashes <br/>';
  echo addcslashes('neslee', 'e');
  echo "<br/><br/>";

  echo 'bin2hex <br/>';
  echo bin2hex('Hello');
  echo "<br/><br/>";

  echo 'chop <br/>';
  echo chop("Ramki   ");
  echo "<br/><br/>";

  echo 'chunk_split <br/>';
  $str = "This Flowers";
  echo chunk_split($str, 2). "<br/><br/>";
  $str = "MMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMMM";
  echo chunk_split($str). "<br/><br/>";

  echo 'convert_uudecode <br/>';
  echo convert_uudecode("+22!L;W9E(%!(4\"$`\n`");
  echo "<br/><br/>";

  echo 'convert_uuencode <br/>';
  echo convert_uuencode('I love PHP!');
  echo "<br/><br/>";

  $data = "Neslee";
  foreach (count_chars($data, 1) as $i => $val) {
  echo "<br/>There were $val instance(s) of \"" , chr($i) , "\" in the string.\n";
  }

  $checksum = crc32("The quick brown fox jumped over the lazy dog.");
  printf("%u\n", $checksum);
  echo "<br/><br/>";

  echo 'Crypt: ' . crypt('rasmuslerdorf', 'rl') . "\n";
  echo "<br/><br/>";

  echo 'explode <br/>';
  $pizza  = "piece1 piece2 piece3 piece4 piece5 piece6";
  $pieces = explode(" ", $pizza);
  echo $pieces[0]."<br/>";
  echo $pieces[1];
  echo "<br/><br/>";

  $hex = hex2bin("6578616d706c65206865782064617461");
  echo $hex;
  echo "<br/><br/>";

  echo 'implode <br/>';
  $array = array('lastname', 'email', 'phone');
  $comma_separated = implode(",", $array);
  echo $comma_separated;
  echo "<br/><br/>";

  echo 'lcfirst <br/>';
  echo lcfirst('NESLEE'); 
  echo "<br/><br/>";


echo "fprintf";
$var=100.345;
$fp=fopen("hello.txt","w");
fprintf($fp,"Hello the variable value is %f",$var);
echo "<br/><br/>";

echo "HTML Translation table";
echo get_html_translation_table(HTML_ENTITIES);
echo "<br/><br/>";

echo "Hex2bin <br/>";
$hex = "6578616d706c65206865782064617461";
echo hex2bin($hex);
echo "<br/><br/>";

echo "Implode<br/>";
$arr = array("hello","world");
$str = implode(" ",$arr);
echo $str;
echo "<br>";
echo implode($arr);
echo "<br>";
echo "<br/><br/>";

echo "Join<br/>";
$arr = array("hello","world");
$str = join(" ",$arr);
echo $str;
echo "<br>";
echo "<br/><br/>";

echo "Lcfirst<br/>";
$arr = "Hello";
$str = lcfirst($arr);
echo $str;
echo "<br>";
echo "<br/><br/>";

echo "Levenstein<br/>";
$str1="Hello";
$str2="Helllo00";
echo levenshtein($str1, $str2);
echo "<br/><br/>";


echo "Ltrim<br/>";
$arr=" Hello";
$str=ltrim($arr,'Hlo');
echo $str;
echo "<br/><br/>";


echo "localeconv<br/>";
$str=setlocale("100.82");
echo localeconv();
echo "<br/><br/>";


echo " MD-5 for file<br/>";
$file="hello.txt";
echo md5_file($file,TRUE);echo "<br>";
echo md5_file($file);
echo "<br/><br/>";


echo "MD5 for string<br/>";
$file="hello.txt";
echo md5($file,TRUE);echo "<br>";
echo md5($file);
echo "<br/><br/>";



echo "nl2br<br/>";
echo nl2br("foo isn't\n\r bar",true);
echo "<br/><br/>";



echo "number format<br/>";
$str = 10034.4454;
echo number_format($str,2,".",",");
echo "<br/><br/>";


echo "ord<br/>";
$str = "Aello";
echo ord($str);
echo "<br/><br/>";


echo "parse string<br/>";
$str="str=World&age=10";
parse_str($str,$arr);
echo $arr[str];
echo "<br/><br/>";


echo "Quote meta<br/>";
$str="Hello^World$*";
echo quotemeta($str);
echo "<br/><br/>";


echo "Sha 1_file<br/>";
$str="hello.txt";
echo sha1_file($str);
echo "<br/><br/>";


echo "Sha1<br/>";
$str="hello.txt";
echo sha1($str);
echo "<br/><br/>";


echo "Similar text<br/>";
$str="hello.txt";
$str1 = "helloe.txt";
$sim = similar_text($str,$str1,$perc);
echo "$sim<br>";
echo "$perc";
echo "<br/><br/>";


echo "Soundex<br/>";
$str1="Hello";
$str2="Hallo";
echo soundex($str1);echo "<br>";
echo soundex($str2);
echo "<br/><br/>";


echo "SPrintf<br/>";
$num=10;
$location="Mangalore";
$format = 'The %2$s contains %1$d monkeys <br/>';
echo sprintf($format, $num, $location);
echo "<br/><br/>";


echo "Sscanf <br/>";
$mandate = "January 01 2000";
list($month, $day, $year) = sscanf($mandate, "%s %d %d");
echo "$month $day $year";
echo "<br/><br/>";


echo "Str Replace <br/>";
$str="Hello world Hello WORLd";
$arr = str_ireplace("world","hello",$str,$count);
echo $arr;
echo "<br/><br/>";


echo "Str Pad <br/>";
$str="Hello";
$str = str_pad($str, 8 ,"world", STR_PAD_RIGHT);
echo $str;
echo "<br/><br/>";


echo "Str Repeat <br/>";
$str="*";
echo str_repeat($str,5);echo "<br>";
echo "<br/>";


echo "Str rot 13 <br/>";
$str="Hello";
echo str_rot13($str);
echo "<br/><br/>";


echo "Str shuffle <br/>";
$str="Hello";
echo str_shuffle($str);
echo "<br/><br/>";


echo "Str split <br/>";
$str="Hello";
$arr=str_split($str,2);
echo $arr[1];
echo "<br/><br/>";

echo "Str word count </br>";
$str="Hello world 3 this is mother2 India";
print_r (str_word_count($str,1));echo "<br>";
print_r (str_word_count($str,2));
echo "<br/><br/>";


echo "Str word case compare </br>";
echo strcasecmp("Hello","HELlO");echo "<br>";
echo strcasecmp("Hello1","HELlO");echo "<br>";
echo strcasecmp("Hello1","HELlO22");echo "<br>";
echo "<br/><br/>";

echo "Str_chr </br>";
$str="Hello World this is India";
echo strchr($str,"this");
echo "<br/><br/>";

echo "Str_cspn </br>";
$str="apple";
echo strcspn($str,"hcde");
echo "<br/><br/>";

echo "Strip_tag </br>";
$str="<p>Hello World</p> <h1>Neslee</h1>";
echo strip_tags($str,'<h1>');
echo "<br/><br/>";

echo "stripcslashes </br>";
echo stripcslashes("Hello Wo\nrl\rd");
echo "<br/><br/>";


echo "stripos </br>";
echo stripos("Hello World", 'w',3);
echo "<br/><br/>";

echo "stripslashes </br>";
echo stripslashes("Hello\'World");
echo "<br/><br/>";

echo "stristr </br>";
echo stristr("Hello World",'w');
echo stristr("Hello World",'w',true);
echo "<br/><br/>";

echo "strnatcasecmp </br>";
echo strnatcasecmp("Hello","hello");echo "<br>";
echo strnatcasecmp("Hello","hello112");echo "<br>";
echo strnatcasecmp("Hello222","hello");echo "<br>";
echo "<br/><br/>";

echo "strnatcmp </br>";
echo strnatcmp("Hello","hello");
echo "<br/><br/>";

echo "strncmp </br>";
echo strncasecmp("Hello","hello",3);
echo "<br/><br/>";


echo "strbrk </br>";
$str="This is mother India";
echo strpbrk($str,"am");
echo "<br/><br/>";

echo "strpos </br>";
$str="This is mother India";
echo strpos($str,"m",7);
echo "<br/><br/>";

echo "strrchr </br>";
$str="This is mother India";
echo strrchr($str,"i");
echo "<br/><br/>";

echo "strrev </br>";
$str="This is mother India";
echo strrev($str);
echo "<br/><br/>";

echo "strripos </br>";
$str="This is mother India";
echo strripos($str,"i");
echo "<br/><br/>";

?>
</body>

</html>