<?php

if (isset($_GET['teserrufat_data'])) {
    $_GET['pin'] = 'v1/FarmInfo/Pin/' . $_GET['pin'];
} elseif (isset($_GET['aze_data'])) {
    $_GET['pin'] = 'v1/PersonalInfo/' . $_GET['pin'];
} elseif (isset($_GET['teqaud'])) {
    $_GET['pin'] = 'v2/PensionInfo/' . $_GET['pin']; 
} elseif (isset($_GET['is'])) {
    $_GET['pin'] = 'v2/EmployeeInfo/' . $_GET['pin'];
}
function curl($url, $header)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    $response = curl_exec($ch);
    curl_close($ch);
    return $response;
}

$res = curl(
    'http://prod.asanfinance.gov.az/api/' . $_GET['pin'],
    array(
        'ApiKey:IqRDgDMeXrGIBGnpHbQnwnI1V9i0d12SZi0Nzuaw8xYlLnynbwFDn2XocO4ChUojU45Be9u4sB2waw8c3xnLBj',
        'Accept:application/json'
    )
);

$asan_massiv = json_decode($res, true);
