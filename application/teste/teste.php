<?php
chdir('../controller/teste');
include '../../model/ClienteModel.php';

$cliente = new ClienteModel();
$cliente->setCpf(47854785565);
$cliente->setNome('Ezequiel Bucioli');
$cliente->setEmail('ezequiel@gmail.com ');
$cliente->setTelefone(44878584785);
$cliente->setEndereco('R.Nelo Pupo, 32, Vila Real - Hortolândia/SP');

// $cliente = new ClienteModel();
// $cliente->getCpf();
// $cliente->getNome();
// $cliente->getEmail();
// $cliente->getTelefone();
// $cliente->getEndereco();


if($cliente->cadastrar()){
    echo 'Ok';
}else{
    echo 'nao ok';
}

?>
