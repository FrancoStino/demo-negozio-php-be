<?php

namespace Negozio;

class Cliente extends Utente
{

    private              $indirizzoConsegna;
    /**
     * @var CartaCredito
     */
    private $cartaCredito;

    public function __construct ( $nome, $cognome, $email, $password, $tipo_utente, $indirizzoConsegna, CartaCredito $cartaCredito )
    {
        parent ::__construct ( $nome, $cognome, $email, $password, $tipo_utente );
        $this -> indirizzoConsegna = $indirizzoConsegna;
        $this -> cartaCredito      = $cartaCredito;
    }

    /**
     * @return string
     */
    public function getIndirizzoConsegna ()
    {
        return $this -> indirizzoConsegna;
    }

    /**
     * @return CartaCredito
     */
    public function getCartaCredito ()
    {
        return $this -> cartaCredito;
    }

    /**
     * @param $new_indirizzoConsegna
     *
     * @return string
     */
    public function setIndirizzoConsegna ( $new_indirizzoConsegna )
    {
        $this -> indirizzoConsegna = $new_indirizzoConsegna;
    }

    /**
     * @param CartaCredito $new_cartaCredito
     *
     * @return string
     */
    public function setCartaCredito ( CartaCredito $new_cartaCredito )
    {
        $this -> cartaCredito = $new_cartaCredito;
    }
}