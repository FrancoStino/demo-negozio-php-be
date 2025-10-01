<?php

namespace Negozio;

class Prodotto
{
    private $nome;
    private $marca;
    private $prezzo;
    private $sconto;
    private $quantita;

    public function __construct ( $nome, $marca, $prezzo, $sconto, $quantita )
    {
        $this -> nome     = $nome;
        $this -> marca    = $marca;
        $this -> prezzo   = $prezzo;
        $this -> sconto   = $sconto;
        $this -> quantita = $quantita;
    }

    public function getNome ()
    {
        return $this -> nome;
    }

    public function getMarca ()
    {
        return $this -> marca;
    }

    public function getPrezzo ()
    {
        return $this -> prezzo;
    }

    public function getSconto ()
    {
        return $this -> sconto;
    }

    public function getQuantita ()
    {
        return $this -> quantita;
    }

    public function setQuantita ( $new_quantita )
    {
        $this -> quantita = $new_quantita;

    }

    public function setPrezzo ( $new_prezzo )
    {
        $this -> prezzo = $new_prezzo;
    }

    public function setSconto ( $new_sconto )
    {
        $this -> sconto = $new_sconto;
    }

    public function setNome ( $new_nome )
    {
        $this -> nome = $new_nome;
    }

    public function setMarca ( $new_marca )
    {
        $this -> marca = $new_marca;
    }


}