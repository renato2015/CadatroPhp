<?php

require_once '../model/BeanCliente.php';
require_once '../dao/DaoCliente.php';

/**
 * Description of ControllerCliente
 *
 * @author Renato Borges Cardoso
 */
class ControllerCliente {

    function inserir(BeanCliente $bCliente) {
        $dao = new DaoCliente();
        $dao->inserir($bCliente);
    }

}
