<?php
function getRates() {
    $timeout = 60 * 5;
    $cache_file = __DIR__.'/tcmb_rates.xml';
    $response = false;
    if(!file_exists($cache_file) || (time() - filemtime($cache_file) > $timeout)) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, 'http://www.tcmb.gov.tr/kurlar/today.xml');
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response  = curl_exec($ch);
        curl_close($ch);
        if($response && simplexml_load_string($response)) {
            file_put_contents($cache_file, $response);
        }
    }
    if(!$response) {
        $response = file_get_contents($cache_file);
    }
    $xml = simplexml_load_string($response);
    if(!$xml) {
        throw new Exception('Döviz kurları yüklenemedi!');
    }
    return [
        'usd_buying' => (float)$xml->Currency[0]->BanknoteBuying[0],
        'usd_selling' => (float)$xml->Currency[0]->BanknoteSelling[0],
        'eur_buying' => (float)$xml->Currency[3]->BanknoteBuying[0],
        'eur_selling' => (float)$xml->Currency[3]->BanknoteSelling[0]
    ];
}

foreach(getRates() as $key => $value) {
    echo $key." ".$value."<br>";
}
