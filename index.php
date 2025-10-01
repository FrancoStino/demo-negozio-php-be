<?php

require 'vendor/autoload.php';

use Negozio\CartaCredito;
use Negozio\Cliente;
use Negozio\Negozio;
use Negozio\Operatore;
use Negozio\Prodotto;

$negozio = new Negozio(
    [
        new Prodotto( 'Lenovo ideapad', 'Lenovo', 1000, 0.1, 10 ),
        new Prodotto( 'Macbook pro', 'Apple', 2000, 0.2, 5 ),
        new Prodotto( 'Samsung galaxy s20', 'Samsung', 3000, 0.3, 40 ),
    ],
    [
        new Cliente( 'Mario', 'Rossi', 'mario.rossi@example.com', '1234', '1', 'via roma 1', new CartaCredito( '1234567890', '12/25' ) ),
        new Cliente( 'Luigi', 'Bianchi', 'luigi.bianchi@example.com', '1234', 1, 'via milano 2', new CartaCredito( '0987654321', '01/26' ) ),
    ],
    [
        new Operatore( 'Paolo', 'Verdi', 'paolo.verdi@example.com', 'pass5678', 2, 'Cardiologia', 'Primario' ),
        new Operatore( 'Giulia', 'Neri', 'giulia.neri@example.com', 'pass9012', 2, 'IT', 'Sistemista' ),
        new Operatore( 'Francesca', 'Gialli', 'francesca.gialli@example.com', 'pass3456', 2, 'Amministrazione', 'Contabile' ),
    ]
);

//echo $negozio -> registrati ( $negozio -> getListaClienti ()[ 0 ] );
//var_dump ( $negozio );

//$login_arr = $negozio -> entra ( 'mario.rossi@example.com', '1234' );
//
//var_dump ( $login_arr );
//
//$negozio -> stampaListaProdotti ();

$negozio -> acquistaProdotto ( new Prodotto( 'Samsung galaxy s20', 'Samsung', 3000, 0.3, 1 ), new CartaCredito( '1234567890', '12/25' ), 1 );

