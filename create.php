<?php
//borda no texto
function imagettfstroketext(&$image, $size, $angle, $x, $y, &$textcolor, &$strokecolor, $fontfile, $text, $px) {
    for($c1 = ($x-abs($px)); $c1 <= ($x+abs($px)); $c1++)
        for($c2 = ($y-abs($px)); $c2 <= ($y+abs($px)); $c2++)
            $bg = imagettftext($image, $size, $angle, $c1, $c2, $strokecolor, $fontfile, $text);
   return imagettftext($image, $size, $angle, $x, $y, $textcolor, $fontfile, $text);
}
$imagem = imagecreatefromjpeg("images/$image.jpg");
$cor = imagecolorallocate( $imagem,255, 255, 255 );
$corborda= imagecolorallocate($imagem, 0,0,0);
$nome = "Eis que ". 
        $object.""
        . " ". $action;
$font = dirname(__FILE__) . '/fonts/impact.ttf';
imagettfstroketext($imagem, 26, 0, 30, 40, $cor,$corborda, $font, $nome, 2);
$namefile = $id. '@' . time() . '.jpg';
//excluir imagem ao criar uma nova (exclui somente a ultima da sessão atual
if(!empty($_SESSION['file'])){
    if(file_exists("memes/".$_SESSION['file'])){
    unlink("memes/".$_SESSION['file']);
    }
}
$_SESSION['file'] = $namefile;
imagejpeg( $imagem, "memes/$namefile", 100 ); 
imagedestroy($imagem);