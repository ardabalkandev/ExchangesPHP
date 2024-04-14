<?php
require('dbConnect.php');
$exchanges_file = 'http://www.tcmb.gov.tr/kurlar/today.xml';
$file_handle = @fopen($exchanges_file, 'r');
if ($file_handle) {
    $exchanges = simplexml_load_file($exchanges_file);
    $usd_buying = $exchanges->Currency[0]->BanknoteBuying;
    $usd_selling = $exchanges->Currency[0]->BanknoteSelling;
    $eur_buying = $exchanges->Currency[3]->BanknoteBuying;
    $eur_selling = $exchanges->Currency[3]->BanknoteSelling;
    fclose($file_handle);
    $sql = "UPDATE exchanges SET usd_buying = ?, usd_selling = ?, eur_buying = ?, eur_selling = ?";
    $stmt = $dbConnect->prepare($sql);
    $stmt->execute([$usd_buying, $usd_selling, $eur_buying, $eur_selling]);
} else {
    $sql = "SELECT * FROM exchanges LIMIT 1";
    $stmt = $dbConnect->prepare($sql);
    $stmt->execute();
    $row = $stmt->fetch();
    $usd_buying = $row['usd_buying'];
    $usd_selling = $row['usd_selling'];
    $eur_buying = $row['eur_buying'];
    $eur_selling = $row['eur_selling'];
}
