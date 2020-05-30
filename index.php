<?php
include ('simple_html_dom.php');

$html = file_get_html('https://en.wikipedia.org/wiki/COVID-19_pandemic_in_Bangladesh');

$html->find('table', 0);
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		.log
		{
			padding-left: 180px;
		}

		.log1
		{
			padding-left: 330px;
		}
	</style>
</head>
<body>

	<div class="log1"><?php echo $html->find('table[class="wikitable"]', 0);?></div><br>

<div class="log"><?php echo $html->find('div[class="barbox tright"]', 0);?></div>


</body>
</html>