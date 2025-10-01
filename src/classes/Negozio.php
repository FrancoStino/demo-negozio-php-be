<?php

namespace Negozio;

class Negozio
{

    private $listaProdotti;
    private $listaClienti;
    private $listaOperatore;

    public function __construct ( $listaProdotti, $listaClienti, $listaOperatore )
    {
        $this -> listaProdotti  = [];
        $this -> listaClienti   = [];
        $this -> listaOperatore = [];
    }

    public function getListaProdotti ()
    {
        return $this -> listaProdotti;
    }

    public function getListaClienti ()
    {
        return $this -> listaClienti;
    }

    public function getListaOperatore ()
    {
        return $this -> listaOperatore;
    }

    public function setListaProdotti ( $listaProdotti )
    {
        $this -> listaProdotti = $listaProdotti;
    }

    public function setListaClienti ( $listaClienti )
    {
        $this -> listaClienti = $listaClienti;
    }

    public function setListaOperatore ( $listaOperatore )
    {
        $this -> listaOperatore = $listaOperatore;
    }

    public function addProdotto ( $prodotto )
    {
        $this -> listaProdotti[] = $prodotto;
    }
}