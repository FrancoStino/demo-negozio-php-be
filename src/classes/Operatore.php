<?php

namespace Negozio;

class Operatore extends Utente
{
    private $area;
    private $mansione;

    /**
     * @param $nome
     * @param $cognome
     * @param $email
     * @param $password
     * @param $tipo_utente
     * @param $area
     * @param $mansione
     */
    public function __construct ( $nome, $cognome, $email, $password, $tipo_utente, $area, $mansione )
    {
        parent ::__construct ( $nome, $cognome, $email, $password, $tipo_utente );
        $this -> area     = $area;
        $this -> mansione = $mansione;
    }

    /**
     * @return string
     */
    public function getArea ()
    {
        return $this -> area;
    }

    /**
     * @return string
     */
    public function getMansione ()
    {
        return $this -> mansione;
    }

    public function setArea ( $new_area )
    {
        $this -> area = $new_area;
    }

    public function setMansione ( $new_mansione )
    {
        $this -> mansione = $new_mansione;
    }
}