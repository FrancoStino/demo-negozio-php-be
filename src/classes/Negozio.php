<?php

namespace Negozio;

class Negozio
{
    private $listaProdotti;
    private $listaClienti;
    private $listaOperatori;

    public function __construct ( $listaProdotti, $listaClienti, $listaOperatori )
    {
        $this -> listaProdotti  = $listaProdotti;
        $this -> listaClienti   = $listaClienti;
        $this -> listaOperatori = $listaOperatori;
    }

    public function getListaProdotti ()
    {
        return $this -> listaProdotti;
    }

    public function getListaClienti ()
    {
        return $this -> listaClienti;
    }

    public function getListaOperatori ()
    {
        return $this -> listaOperatori;
    }

    public function setListaProdotti ( $listaProdotti )
    {
        $this -> listaProdotti = $listaProdotti;
    }

    public function setListaClienti ( $listaClienti )
    {
        $this -> listaClienti = $listaClienti;
    }

    public function setListaOperatori ( $listaOperatori )
    {
        $this -> listaOperatori = $listaOperatori;
    }

    /**
     * @param Utente $utente
     *
     * @return bool
     */
    public function registrati ( Utente $utente )
    {
        $class_name = get_class ( $utente );
        $res        = false;

        switch ( $class_name ) {
            case 'Negozio\Operatore':
                $operatori   = $this -> getListaOperatori ();
                $operatori[] = $utente;
                $this -> setListaOperatori ( $operatori );
                $res = true;
                break;
            case 'Negozio\Cliente':
                $clienti   = $this -> getListaClienti ();
                $clienti[] = $utente;
                $this -> setListaClienti ( $clienti );
                $res = true;
                break;
        }
        return $res;
    }

    public function registraCartaCredito ( Cliente $cliente, CartaCredito $cartaCredito )
    {
        $cliente -> setCartaCredito ( $cartaCredito );
    }

    /**
     * @param string $email
     * @param string $password
     *
     * @return array{success: bool, utente: Utente|null}
     */
    public function entra ( $email, $password ) : array
    {
        $find   = false;
        $utente = null;

        foreach ( $this -> listaClienti as $cliente ) {
            if ( $cliente -> getEmail () == $email && $cliente -> getPassword () == $password ) {
                $find   = true;
                $utente = $cliente;
                break;
            }
        }

        foreach ( $this -> listaOperatori as $operatore ) {
            if ( $operatore -> getEmail () == $email && $operatore -> getPassword () == $password ) {
                $find   = true;
                $utente = $operatore;
                break;
            }
        }

        return [
            'success' => $find,
            'utente' => $utente,
        ];
    }

    public function stampaListaProdotti ()
    {
        foreach ( $this -> listaProdotti as $prodotto ) {
            $nome     = $prodotto -> getNome ();
            $marca    = $prodotto -> getMarca ();
            $prezzo   = $prodotto -> getPrezzo ();
            $sconto   = $prodotto -> getSconto ();
            $quantita = $prodotto -> getQuantita ();
            echo "Nome: $nome, Marca: $marca, Prezzo: $prezzo, Sconto: $sconto, Quantità: $quantita\n";
        }
    }

    public function getProdotto ( $nome )
    {
        $prodotto = null;
        foreach ( $this -> listaProdotti as $prodotto ) {
            if ( $prodotto -> getNome () == $nome ) {
                return $prodotto;
            }
        }
        return $prodotto;
    }

    public function aggiungiProdotto ( Prodotto $prodotto )
    {
        $prodotti   = $this -> getListaProdotti ();
        $prodotti[] = $prodotto;
        $this -> setListaProdotti ( $prodotti );
        echo "Prodotto aggiunto con successo\n";
        $this -> stampaListaProdotti ();
        return $this;
    }

    /**
     * @param Prodotto     $prodotto
     * @param CartaCredito $cartaCredito
     * @param int          $quantita
     *
     * @return void
     */
    public function acquistaProdotto ( Prodotto $prodotto, CartaCredito $cartaCredito, int $quantita ) : void
    {
        $is_carta = false;

        foreach ( $this -> listaClienti as $cliente_new_order ) {
            if ( ( $cliente_new_order -> getCartaCredito () -> getNumeroCarta () == $cartaCredito -> getNumeroCarta () )
                 &&
                 ( $cliente_new_order -> getCartaCredito () -> getScadenza () == $cartaCredito -> getScadenza () ) ) {
                $is_carta = true;
                break;
            }
        }
        if ( $is_carta ) {
            $new_prodotti = [];
            $find         = false;
            foreach ( $this -> listaProdotti as $prodotto_new_order ) {
                if ( $prodotto_new_order -> getNome () == $prodotto -> getNome () ) {
                    $find = true;
                    if ( $prodotto_new_order -> getQuantita () > $quantita ) {
                        $prodotto_new_order -> setQuantita ( $prodotto_new_order -> getQuantita () - $quantita );
                        $new_prodotti[] = $prodotto_new_order;
                        echo "Prodotto acquistato con successo\n";
                    } else {
                        echo "Quantità insufficiente\n";
                    }
                } else {
                    $new_prodotti[] = $prodotto_new_order;
                }

            }
            $this -> setListaProdotti ( $new_prodotti );
            if ( !$find ) {
                echo "Prodotto non trovato\n";
            }
            echo "Lista dei prodotti:\n";
            $this -> stampaListaProdotti ();
        } else {
            echo "Carta non valida\n";
        }
    }
}
