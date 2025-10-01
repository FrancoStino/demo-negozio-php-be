<?php

namespace Negozio;

class Utente
{
    private $nome;
    private $cognome;

    private $email;

    private $password;

    private $tipo_utente;

    /**
     * @param $nome
     * @param $cognome
     * @param $email
     * @param $password
     * @param $tipo_utente
     */
    public function __construct ( $nome, $cognome, $email, $password, $tipo_utente )
    {
        $this -> nome        = $nome;
        $this -> cognome     = $cognome;
        $this -> email       = $email;
        $this -> password    = $password;
        $this -> tipo_utente = $tipo_utente;
    }

    public function getNome ()
    {
        return $this -> nome;
    }

    public function getCognome ()
    {
        return $this -> cognome;
    }

    public function getEmail ()
    {
        return $this -> email;
    }

    public function getPassword ()
    {
        return $this -> password;
    }

    public function getTipoUtente ()
    {
        return $this -> tipo_utente;
    }

    public function setNome ( $nome )
    {
        $this -> nome = $nome;
    }

    public function setCognome ( $cognome )
    {
        $this -> cognome = $cognome;
    }

    public function setEmail ( $email )
    {
        $this -> email = $email;
    }

    public function setPassword ( $password )
    {
        $this -> password = $password;
    }

    public function setTipoUtente ( $tipo_utente )
    {
        $this -> tipo_utente = $tipo_utente;
    }
}