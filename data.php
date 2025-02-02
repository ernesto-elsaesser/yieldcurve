<?php
$params = array(
    'mode' => 'fred',
    'fq' => 'Daily',
    'cosd' => '2019-01-01',
    'coed' => date('Y-m-d'),
    'id' => 'DSG' . $_GET['maturity']
);
$url = 'https://fred.stlouisfed.org/graph/fredgraph.csv?' . http_build_query($params, '', '&');
echo file_get_contents($url);
?>