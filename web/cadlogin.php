<?php
    //include '../dao/UserDao.php';
    //include '../model/User.php';
    //include '../config/Config.php';
    //include '../mapping/UserMapper.php';
    include '../validacao/valida_cookies.php';
    
    $nome=$_POST['nome'];
    $email=$_POST['email'];
    $senha=$_POST['senha'];
print_r($_POST);
echo '<br>';
echo $senha.' - ';
//$criptografia->criptografia();
//$senha = valida_cookies::($senha);
    
    $criptografia = new valida_cookies(); 
    $dao = new UserDao();
    $user = new User();

    $senha=($criptografia->criptografia($senha));
    
    $user->setLogin($nome);
    $user->setSenha($senha);
    $user->setemail($email);
    
    $dao->save($user);
    
    $string="Location: ../index.phtml";
    header($string);
?>

