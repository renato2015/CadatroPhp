<?php
 class ComunicaBd{
     private $connecta;


     /**
      * Metodo que conecta no banco de dados
      */
     function conecta(){
        $this->connecta = @mysql_connect('127.0.0.1', 'root', 'root99');
        if(!$this->connecta){
            die ("Erro ao conectar no banco de dados." . mysql_error());
        }
        mysql_select_db('cadastrophp', $connecta);
     }

     /**
      * Metodo que desconecta do banco de dados
      */
     function desconecta(){
         if($this->connecta){

         }
     }
}