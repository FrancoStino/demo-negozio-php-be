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
        new Cliente( 'Mario', 'Rossi', 'mario.rossi@example.com', '1234', 1, 'via roma 1', new CartaCredito( '1234567890', '12/25' ) ),
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

//$negozio -> acquistaProdotto ( new Prodotto( 'Samsung galaxy s20', 'Samsung', 3000, 0.3, 1 ), new CartaCredito( '1234567890', '12/25' ), 1 );

$exit = false;
while ( !$exit ) {
	$comando = strtolower ( ( trim ( readline ( 'Sei registrato? (y/n/exit) ' ) ) ) );
    switch ( $comando ) {
	    case 'y':
	    case 's':
            echo "Login\n";
            $email    = strtolower ( ( trim ( readline ( 'Inserire email: ' ) ) ) );
            $password = strtolower ( ( trim ( readline ( 'Inserire password: ' ) ) ) );

            $login_arr = $negozio -> entra ( $email, $password );
            $login     = $login_arr[ 'success' ];
            $utente    = $login_arr[ 'utente' ];
            if ( !$login || !$utente ) {
                echo "Credenziali non valide\n";
            } else {
                echo "Benvenuto " . $utente -> getNome () . " " . $utente -> getCognome () . "\n";
                while ( $login ) {
                    $class_name = get_class ( $utente );
                    switch ( $class_name ) {
                        case 'Negozio\Cliente':

                            echo "Sei un cliente\n";
                            $operazione = strtolower ( ( trim ( readline ( 'Inserire operazione (listaprodotti, acquistaprodotto, esci): ' ) ) ) );

                            switch ( $operazione ) {
                                case 'acquistaprodotto':
                                    $nome = ( trim ( readline ( 'Inserire nome: ' ) ) );

	                                $quantita = (int) trim ( readline ( 'Inserire quantita: ' ) );

                                    $prodotto = $negozio -> getProdotto ( $nome );
                                    if ( $prodotto == null ) {
                                        echo "Prodotto non trovato\n";

                                    }
	                                $negozio -> acquistaProdotto ( $prodotto, $utente -> getCartaCredito (), $quantita );
                                    break;

                                case 'listaprodotti':
                                    $negozio -> stampaListaProdotti ();
                                    break;

                                case 'esci':
                                    $login = false;
                                    break;

                                default:
                                    echo "Operazione non valida\n";
                            }
                            break;
                        case 'Negozio\Operatore':
                            echo "Sei un operatore\n";
                            $operazione = strtolower ( ( trim ( readline ( 'Inserire operazione (listaprodotti, aggiungiprodotto, esci): ' ) ) ) );

                            switch ( $operazione ) {
                                case 'aggiungiprodotto':
                                    $nome     = ( trim ( readline ( 'Inserire nome: ' ) ) );
                                    $marca    = strtolower ( ( trim ( readline ( 'Inserire marca: ' ) ) ) );
                                    $prezzo   = (float) trim ( readline ( 'Inserire prezzo: ' ) );
                                    $sconto   = (float) trim ( readline ( 'Inserire sconto: ' ) );
                                    $quantita = (int) trim ( readline ( 'Inserire quantita: ' ) );

                                    $prodotto = new Prodotto ( $nome, $marca, $prezzo, $sconto, $quantita );
                                    $negozio -> aggiungiProdotto ( $prodotto );
                                    break;

                                case 'listaprodotti':
                                    $negozio -> stampaListaProdotti ();
                                    break;

                                case 'esci':
                                    $login = false;
                                    break;

                                default:
                                    echo "Operazione non valida\n";
                            }
                            break;
                        default:
                            echo "Tipo utente sconosciuto\n";
                            $login = false;
                            break;
                    }
                }
            }
            break;
        case 'n':
            echo "Registrati\n";
	        $nome        = strtolower ( ( trim ( readline ( 'Inserire nome: ' ) ) ) );
	        $cognome     = strtolower ( ( trim ( readline ( 'Inserire cognome: ' ) ) ) );
	        $email       = strtolower ( ( trim ( readline ( 'Inserire email: ' ) ) ) );
	        $password    = strtolower ( ( trim ( readline ( 'Inserire password: ' ) ) ) );
	        $tipo_utente = strtolower ( ( trim ( readline ( 'Inserire tipo utente (cliente/operatore): ' ) ) ) );
	        $tipo_utente = $tipo_utente === 'cliente' ? 1 : 2;

	        switch ( $tipo_utente ) {
		        case 1:
			        $area     = strtolower ( ( trim ( readline ( 'Inserire area: ' ) ) ) );
			        $mansione = strtolower ( ( trim ( readline ( 'Inserire mansione: ' ) ) ) );
			        $utente   = new Operatore ( $nome, $cognome, $email, $password, $tipo_utente, $area, $mansione );
			        break;
		        case 2:
			        $indirizzoConsegna = strtolower ( ( trim ( readline ( 'Inserire indirizzo di consegna: ' ) ) ) );
			        $numeroCarta       = strtolower ( ( trim ( readline ( 'Inserire numero carta: ' ) ) ) );
			        $scadenza          = strtolower ( ( trim ( readline ( 'Inserire scadenza carta: ' ) ) ) );
			        $cartaCredito      = new CartaCredito ( $numeroCarta, $scadenza );
			        $utente            = new Cliente ( $nome, $cognome, $email, $password, $tipo_utente, $indirizzoConsegna, $cartaCredito );
			        break;
		        default:
			        echo "Tipo utente non valido\n";
			        break;
	        }
	        $negozio -> registrati ( $utente );
	        echo "Registrazione completata\n";
	        break;
        case 'exit':
            $exit = true;
            echo "Arrivederci!\n";
            break;
        default:
            echo "Comando non valido\n";
            break;
    }
}
