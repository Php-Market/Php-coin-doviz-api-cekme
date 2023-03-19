<?php
// API adresi
$apiUrl = 'https://api.exchangerate-api.com/v4/latest/USD';

// API'den veriyi çekme
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $apiUrl);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);

// JSON veriyi diziye dönüştürme
$data = json_decode($response, true);

// Döviz kurları
$eurRate = $data['rates']['EUR'];
$gbpRate = $data['rates']['GBP'];
$jpyRate = $data['rates']['JPY'];

// Coin fiyatları için farklı bir API kullanabilirsiniz
$coinApiUrl = 'https://api.coingecko.com/api/v3/coins/markets?vs_currency=USD&ids=bitcoin,ethereum,litecoin';
$coinResponse = file_get_contents($coinApiUrl);
$coinData = json_decode($coinResponse, true);

// Bitcoin, Ethereum ve Litecoin fiyatları
$bitcoinPrice = $coinData[0]['current_price'];
$ethereumPrice = $coinData[1]['current_price'];
$litecoinPrice = $coinData[2]['current_price'];

// Sonuçları yazdırma
echo 'EUR kuru: ' . $eurRate . '<br>';
echo 'GBP kuru: ' . $gbpRate . '<br>';
echo 'JPY kuru: ' . $jpyRate . '<br>';
echo 'Bitcoin fiyatı: ' . $bitcoinPrice . '<br>';
echo 'Ethereum fiyatı: ' . $ethereumPrice . '<br>';
echo 'Litecoin fiyatı: ' . $litecoinPrice . '<br>';
?>
