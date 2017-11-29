<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<center>
	
<p>
	Destiny 2 related stuff	
</p>
<?php
$path    = 'Destiny';
$files = scandir($path);

$files = array_diff(scandir($path), array('.', '..', '.htaccess'));

foreach ($files as &$value) 
{
    echo "<a href='Destiny/".$value."' target='_black' >".$value."</a><br/>";
}
	
?>
</center>
	
</body>
</html>