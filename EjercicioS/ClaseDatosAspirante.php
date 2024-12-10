<?php
class aspirante {
    private $nombre;
    private $apellido;
    private $edad;
    private $documento;
    private $curso;

    public function __construct($nombre,$apellido,$edad,$documento,$curso) {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->edad = $edad;
        $this->documento = $documento;
        $this->curso = $curso;
    }



    public function AsignarValores($nombre,$apellido,$edad,$documento,$curso) {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->edad = $edad;
        $this->documento = $documento;
        $this->curso = $curso;
    }

    public function imprimirvalores (){
        echo "tu nombre es: ". $this->nombre."<br>"  ;
        echo "tu apellido es: ". $this->apellido."<br>" ;
        echo "tu edad es: ". $this->edad."<br>" ;
        echo "tu documento es: ". $this->documento."<br>" ;
        echo "tu curso es: ". $this->curso."<br>" ;


    }


}


?>