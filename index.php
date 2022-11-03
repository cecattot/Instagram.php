<?php

//Criamos uma função que recebe um texto como parâmetro.
function gravar($texto, $id)
{
    //Variável arquivo armazena o nome e extensão do arquivo.
    $arquivo = $id. ".svg";

    //Variável $fp armazena a conexão com o arquivo e o tipo de ação.
    $fp = fopen($arquivo, "a+");

    //Escreve no arquivo aberto.
    fwrite($fp, $texto);

    //Fecha o arquivo.
    fclose($fp);
}


