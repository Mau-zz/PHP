<?php

    $num1=$_GET['num1'];
    $num2=$_GET['num2'];
    $op=$_GET['operacion'];
    
    #echo'<table border=1>';

#    echo '<tr>';
 #   echo '<td>1 termino </td>'
  #  echo '<td>2 termino </td>'
   # echo'</table>';
    if ($op =="suma"){

    function sumar($sumando1,$sumando2){
        $resultado=$sumando1+$sumando2;
        echo $sumando1 ."+".$sumando2."=".$resultado;
    }
    sumar($num1,$num2);
}


elseif ($op =="resta"){

    function restar($restando1,$restando2){
        $resultado=$restando1-$restando2;
        echo $restando1 ."-".$restando2."=".$resultado;
    }
    restar($num1,$num2);
}

elseif ($op =="multiplicacion"){

    function multiplicar($multiplicando1,$multiplicando2){
        $resultado=$multiplicando1 * $multiplicando2;
        echo $multiplicando1 ."x".$multiplicando2."=".$resultado;
    }
    multiplicar($num1,$num2);
}

elseif ($op =="division"){

    function dividir($dividiendo1,$dividiendo2){
        $resultado=$dividiendo1/$dividiendo2;
        echo $dividiendo1 ."/".$dividiendo2."=".$resultado;
    }
    dividir($num1,$num2);
}


?>