<?php
//variavel de sessão(armazena dados para ser usado pelo seu site)
session_start(); //abrir uma sessão
//ter conexão com o bd
include "db.php"; //tipo import

$email=$_POST["email"]; //esta vindo de um post
$senha=$_POST["senha"]; //chama a senha pelo post(no form)

//consultar no banco

$query="SELECT*FROM usuario WHERE usu_email='$email' AND usu_senha='$senha' ";

$consulta=mysqli_query($conexao,$query);//a função executa uma consulta no banco, e para fazer isso precisada conexão e a consulta que quer executar

if(mysqli_num_rows($consulta)==1){//função que retorna o numero de linhas

    $row = mysqli_fetch_array($consulta);//traz um array de valores da consulta

    $_SESSION["nomeusuario"]=$row["usu_nome"];//pega o nome do usuario esta sendo salva em uma variavel de sessão

    header("location: home.php");//função de direcionamento

}else{

    header("location: index.php?erro");//?= passa um paramentro

}

?>