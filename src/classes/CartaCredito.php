<?php

namespace Negozio;

class CartaCredito
{

    private $numeroCarta;
    private $scadenza;


    public function __construct ( $numeroCarta, $scadenza )
    {
        $this -> numeroCarta = $numeroCarta;
        $this -> scadenza    = $scadenza;
    }

    public function getNumeroCarta ()
    {
        return $this -> numeroCarta;
    }

    public function setNumeroCarta ( $numeroCarta )
    {
        $this -> numeroCarta = $numeroCarta;
    }

    public function getScadenza ()
    {
        return $this -> scadenza;
    }

    public function setScadenza ( $scadenza )
    {
        $this -> scadenza = $scadenza;
    }
}