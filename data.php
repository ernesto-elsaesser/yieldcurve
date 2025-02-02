<?php
$url = 'https://fred.stlouisfed.org/graph/fredgraph.csv?'
$params = array(
    'mode' => 'fred',
    'id' => 'DSG' . $_GET['maturity'],
    'fq' => 'Daily',
    'cosd' => '2019-01-01',
    'coed' => date('Y-m-d')
);
$url .= http_build_query($params);
$curl = curl_init($url);
$csv = curl_exec($curl);
curl_close($curl);
echo $csv;
?>