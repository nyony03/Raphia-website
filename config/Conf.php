<?php

class Conf
{

    // la variable debug est un boolean
    static private $debug = True;

    static public function getDebug()
    {
        return self::$debug;
    }

    static private $databases = array(
        // Le nom d'hote est webinfo a l'IUT
        // ou localhost sur votre machine
        'hostname' => 'webinfo',
        // A l'IUT, vous avez une BDD nommee comme votre login
        // Sur votre machine, vous devrez creer une BDD
        'database' => 'rakotondran',
        // A l'IUT, c'est votre login
        // Sur votre machine, vous avez surement un compte 'root'
        'login' => 'rakotondran',
        // A l'IUT, c'est votre mdp (INE par defaut)
        // Sur votre machine personelle, vous avez creez ce mdp a l'installation
        'password' => 'Nrakoton_2211'
    );

    static public function getLogin()
    {
        //en PHP l'indice d'un tableau n'est pas forcement un chiffre.
        return self::$databases['login'];
    }

    static public function getHostname()
    {
        return self::$databases['hostname'];
    }

    static public function getDatabase()
    {
        return self::$databases['database'];
    }

    static public function getPassword()
    {
        return self::$databases['password'];
    }
}
