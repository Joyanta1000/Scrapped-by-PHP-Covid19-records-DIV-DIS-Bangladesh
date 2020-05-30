<?php
include ('simple_html_dom.php');

$html = file_get_contents('https://en.wikipedia.org/wiki/COVID-19_pandemic_in_Bangladesh');

$dom = new domDocument;

@$dom->loadHTML($html);

$tables=$dom->getElementsByTagName('table');
//$tr = $tables->item(0)->getElementsByTagName('tr');

@$r = $tables->item(3)->getElementsByTagName('tr');



//print_r($r);
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>

<script type="text/javascript" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">



<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

</head>
<body>

<div class="card text-center">
  <div class="card-header">
    Covid-19 Pandemic
  </div>
  <div class="card-body">
    <h5 class="card-title">Covid-19 cases in Bangladesh</h5>
    <p class="card-text">According to <a href="https://en.wikipedia.org/wiki/COVID-19_pandemic_in_Bangladesh" style="text-decoration: none;">Wikipedia</a></p>

    <a href="http://bdcovid19pandemicrec.epizy.com/bd.php" style="text-decoration: none;"> More Info </a>
    
  </div>
  <div class="card-footer text-muted">
    <?php
$today = date("d/m/Y");
echo $today;
?>
  </div>
</div>


<table id="example" class="display" style="width:100%">
        <thead><tr>
<th>
</th>
<th colspan="4">
</th>
<th colspan="4">In the last 24 hours
</th>
<th rowspan="2" class="headerSort" tabindex="0" role="columnheader button" title="Sort ascending">Notes
</th></tr><tr>
<th class="headerSort" tabindex="0" role="columnheader button" title="Sort ascending">Date
</th>
<th class="headerSort" tabindex="0" role="columnheader button" title="Sort ascending">Total Tested
</th>
<th class="headerSort" tabindex="0" role="columnheader button" title="Sort ascending">Total Cases
</th>
<th class="headerSort" tabindex="0" role="columnheader button" title="Sort ascending">Total Deaths
</th>
<th class="headerSort" tabindex="0" role="columnheader button" title="Sort ascending">Total Recovered
</th>
<th class="headerSort" tabindex="0" role="columnheader button" title="Sort ascending">Newly Tested
</th>
<th class="headerSort" tabindex="0" role="columnheader button" title="Sort ascending">New Cases
</th>
<th class="headerSort" tabindex="0" role="columnheader button" title="Sort ascending">New Deaths
</th>
<th class="headerSort" tabindex="0" role="columnheader button" title="Sort ascending">Newly Recovered
</th></tr></thead>

<tbody>

<?php

error_reporting(0);

foreach ($r as $row) {
	$cols = $row->getElementsByTagName('td');
	$count = count($cols);
	if ($count!=0) {
		echo "<tr><td>".$cols->item(0)->nodeValue."</td><td>".$cols->item(1)->nodeValue."</td><td>".$cols->item(2)->nodeValue."</td><td>".$cols->item(3)->nodeValue."</td><td>".$cols->item(4)->nodeValue."</td><td>".$cols->item(5)->nodeValue."</td><td>".$cols->item(6)->nodeValue."</td><td>".$cols->item(7)->nodeValue."</td><td>".$cols->item(8)->nodeValue."</td><td>".$cols->item(9)->nodeValue."</td></tr>";
	}
}


?>

</tbody>
        
    </table>


<script type="text/javascript">

	$(document).ready(function() {
    $('#example').DataTable();
} );
</script>

</body>
</html>