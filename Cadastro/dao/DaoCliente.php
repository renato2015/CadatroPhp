<?php

/**
 * Description of DaoCliente
 *
 * @author Renato Borges Cardoso
 */
class DaoCliente {

    function inserir(BeanCliente $bCliente){
        echo 'DAO: ' . $bCliente->getNome();
    }

}
