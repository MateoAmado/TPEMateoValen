<?php
/* Smarty version 4.2.1, created on 2022-10-17 23:46:08
  from 'D:\programas\XAMP\htdocs\projects\TPEMateoValen\templates\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.2.1',
  'unifunc' => 'content_634dcd20423133_95554690',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3ce527c8abd0d9d0679e7c446c844de9ee180f56' => 
    array (
      0 => 'D:\\programas\\XAMP\\htdocs\\projects\\TPEMateoValen\\templates\\header.tpl',
      1 => 1666042983,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_634dcd20423133_95554690 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <base href="<?php echo BASE_URL;?>
">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css\style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
</head>
<body>
    <div class="w3-top">
        <div class="w3-bar w3-black w3-card">
          <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
          <a href="home" class="w3-bar-item w3-button w3-padding-large">HOME</a>
          <?php if ((isset($_SESSION['username']))) {?>
            <a href="deslogearse" class="w3-bar-item w3-button w3-padding-large w3-hide-small">DESLOGEARSE</a>
              <?php } else { ?>
                <a href="logearse" class="w3-bar-item w3-button w3-padding-large w3-hide-small">INICIAR SESION</a>
          <?php }?>
          <a href="registrarse" class="w3-bar-item w3-button w3-padding-large w3-hide-small">REGISTRARSE</a>
          <div class="w3-dropdown-hover w3-hide-small">
            <button class="w3-padding-large w3-button" title="More">LISTADO DE: <i class="fa fa-caret-down"></i></button>
            <?php if ((isset($_SESSION['username'])) && (isset($_SESSION['rol']))) {?>
            <span>Se ha logeado:<?php echo $_SESSION['username'];?>
 </span>
            <span>    Su rol es:<?php echo $_SESSION['rol'];?>
 </span>
          <?php }?>
            <div class="w3-dropdown-content w3-bar-block w3-card-4">
              <a href="ejercicios" class="w3-bar-item w3-button">Ejercicios</a>
              <a href="musculos" class="w3-bar-item w3-button">Musculos</a>
            </div>
            
          </div>
          <a href="javascript:void(0)" class="w3-padding-large w3-hover-red w3-hide-small w3-right"><i class="fa fa-search"></i></a>
        </div>
      </div>
      
    
</body>
</html><?php }
}
