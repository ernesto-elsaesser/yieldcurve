<?php
$id = "DSG" . $_GET['maturity'];
$today = date("%Y-%m-%d");
$url = "https://fred.stlouisfed.org/graph/fredgraph.csv?mode=fred&id=$id&fq=Daily&cosd=2019-01-01&coed=$today";
echo file_get_contents($url);
?>