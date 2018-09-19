<?php
header('Access-Control-Allow-Origin:*');
$file = fopen('info.txt','w');
fwrite($file,"GET\n\n") ;
foreach ($_GET as $key => $value)
{
    fwrite($file,$key . ': ' . $value . "\n") ;
}
fwrite($file,"\n\nPOST\n\n") ;
foreach ($_POST as $key => $value)
{
    fwrite($file,$key . ': ' . $value . "\n") ;
}
fclose($file);
?>
