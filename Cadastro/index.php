<?php
require_once './controller/ControllerCliente.php';
require_once './model/BeanCliente.php';

$beanCliente = new BeanCliente();

if(isset($_POST['nome'])){
    $beanCliente->setNome($_POST['nome']);
    $beanCliente->setSobrenome($_POST['sobrenome']);
    $beanCliente->setTelefone($_POST['telefone']);
    $beanCliente->setEmail($_POST['email']);

    $controllerCliente = new ControllerCliente();
    $controllerCliente->inserir($beanCliente);
}

function setDados(){

    return $beanCliente;
}