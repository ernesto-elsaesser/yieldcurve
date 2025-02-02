<?php
$url = 'https://fred.stlouisfed.org/graph/fredgraph.csv?';
$params = array(
    'mode' => 'fred',
    'id' => 'DGS' . $_GET['maturity'],
    'fq' => 'Daily',
    'cosd' => '2019-01-01',
    'coed' => date('Y-m-d')
);
$url .= http_build_query($params);
echo file_get_contents($url);
?>