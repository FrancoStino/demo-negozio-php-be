<?php

require 'vendor/autoload.php';

use Negozio\CartaCredito;
use Negozio\Cliente;
use Negozio\Negozio;
use Negozio\Prodotto;

$negozio = new Negozio(
    [
        new Prodotto( 'Lenovo ideapad', 'Lenovo', 1000, 0.1, 10 ),
        new Prodotto( 'Macbook pro', 'Apple', 2000, 0.2, 5 ),
        new Prodotto( 'Samsung galaxy s20', 'Samsung', 3000, 0.3, 1 ),
    ],
    [
        new Cliente( 'Mario Rossi', 'mario.rossi@example.com', 'via roma 1', '1234', 1, 'via roma 1', new CartaCredito( '1234567890', '12/25' ) ),
        new Cliente( 'Luigi Bianchi', 'luigi.bianchi@example.com', 'via milano 2', '1234', 1, 'via milano 2', new CartaCredito( '0987654321', '01/26' ) ),
    ],
    []
);

var_dump ( $negozio );