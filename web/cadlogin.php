<?php
    include '../dao/UserDao.php';
    include '../model/User.php';
    include '../config/Config.php';
    include '../mapping/UserMapper.php';
    
    $nome=$_POST['nome'];
    $email=$_POST['email'];
    $senha=$_POST['senha'];
    
    $dao = new UserDao();
    $user = new User();
    
    $user->setLogin($nome);
    $user->setSenha($senha);
    
    $dao->save($user);
    
    $string="Location: ../index.phtml";
    header($string);
?>

