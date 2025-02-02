<?php
$url = 'https://fred.stlouisfed.org/graph/fredgraph.csv?mode=fred&fq=Daily&cosd=2019-01-01&coed=' . date('Y-m-d') . '&id=DSG' . $_GET['maturity'];
echo file_get_contents($url);
?>