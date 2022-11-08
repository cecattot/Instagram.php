<?php

function gravar($texto, $id)
{
    //Variável arquivo armazena o nome e extensão do arquivo.
    $arquivo = "exportaInstagram/" . $id . ".svg";

    //Variável $fp armazena a conexão com o arquivo e o tipo de ação.
    $fp = fopen($arquivo, "a+");

    //Escreve no arquivo aberto.
    fwrite($fp, $texto);

    //Fecha o arquivo.
    fclose($fp);
}

function getTags( $dom, $tagName, $attrName, $attrValue ){
    $html = '';
    $domxpath = new DOMXPath($dom);
    $newDom = new DOMDocument;
    $newDom->formatOutput = true;

    $filtered = $domxpath->query("//$tagName" . '[@' . $attrName . "='$attrValue']");
    // $filtered =  $domxpath->query('//div[@class="className"]');
    // '//' when you don't know 'absolute' path

    // since above returns DomNodeList Object
    // I use following routine to convert it to string(html); copied it from someone's post in this site. Thank you.
    $i = 0;
    while( $myItem = $filtered->item($i++) ){
        $node = $newDom->importNode( $myItem, true );    // import node
        $newDom->appendChild($node);                    // append node
        gravar($newDom->saveHTML(), $node->attributes->getNamedItem('id')->textContent);
        $newDom->removeChild($node);
//    exit;
    }
////        $html = $newDom->saveHTML();
//        gravar($html, $filtered);
    return "sucesso";
}

$some_link = 'gerado.html';
$tagName = 'svg';
$attrName = 'class';
$attrValue = 'svg';

$dom = new DOMDocument;
$dom->preserveWhiteSpace = false;
@$dom->loadHTMLFile($some_link);

$html = getTags( $dom, $tagName, $attrName, $attrValue );