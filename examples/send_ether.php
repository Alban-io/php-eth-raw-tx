<?php
require_once __DIR__ . '/../vendor/autoload.php';

$nonce = 29;
$to = 'd44d259015b61a5fe5027221239d840d92583adb';
$value = 0.5 * 10**18;
$data = null;

$pk = getenv("PHP_ETH_RAW_TX_PK");
if (!$pk) {
    exit("/!\ Set private key in PHP_ETH_RAW_TX_PK env var" . PHP_EOL);
}

$chainId = 4; // rinkeby

$tx = new \EthereumRawTx\Transaction(
    $to,
    $value,
    $data,
    $nonce
);

$raw = $tx->getRaw($pk, $chainId);

echo "Generated raw transaction :" . PHP_EOL;
echo $raw . PHP_EOL;