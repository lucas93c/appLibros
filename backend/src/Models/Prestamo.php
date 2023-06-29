<?php
declare(strict_types=1);
namespace Raiz\Models;

use Raiz\Models\ModelBase;
use DateTime;

class Prestamo extends ModelBase
{    
/*Atributos de la clase Prestamo:

id (int)
socio (Socio)
libro (Libro)
fecha_desde (date)
fecha_hasta (date)
fecha_dev (?date) este atributo se debe inicializar en null*/
   
     /** @var Socio*/
    private $socio;
     /** @var Libro*/
    private $libro;
    private $fecha_desde;
    private $fecha_hasta;
    private $fecha_dev;

    public function __construct(int $id, 
                Socio $socio, 
                Libro $libro,
                DateTime $fecha_desde,
                DateTime $fecha_hasta,
                DateTime $fecha_dev)
    {
        parent::__construct($id);
        $this->socio=$socio; /* id del socio */
        $this->libro=$libro; /*id del libro*/
        $this->fecha_desde=$fecha_desde;
        $this->fecha_hasta=$fecha_hasta;
        $this->fecha_dev=null;
    }

   

    public function setFecha_dev ($nueva_fecha_dev)
    {
        $this->fecha_dev=$nueva_fecha_dev;
    }

    public function getFecha_dev()
    {
        return $this->fecha_dev;
    }

    public function setFecha_hasta ($nueva_fecha_hasta)
    {
        $this->fecha_hasta=$nueva_fecha_hasta;
    }

    public function getFecha_hasta ()
    {
        return $this->fecha_hasta;
    }

    public function setFecha_desde ($nueva_fecha_desde)
    {
        $this->fecha_desde=$nueva_fecha_desde;
    }

    public function getFecha_desde()
    {
        return $this->fecha_desde;
    }

    public function setLibro ($nuevo_libro)
    {
        $this->libro=$nuevo_libro;
    }

    public function getLibro ()
    {
        return $this->libro;
    }

    public function setSocio ($nuevo_socio)
    {
        $this->socio=$nuevo_socio;
    }

    public function getSocio ()
    {
        return $this->socio;
    }    

    public function serializar(): array
    {
        return [
            /* 
            socio (Socio)
            libro (Libro)
            fecha_desde (date)
            fecha_hasta (date)
            fecha_dev 
            */
            'id'=>$this->getId(),
            'socio'=>$this->socio,
            'libro'=>$this->libro,
            'fecha_desde'=>$this->fecha_desde,
            'fecha_hasta'=>$this->fecha_hasta,
            'fecha_dev'=>$this->fecha_dev
        ];
    }
    static function deserializar(array $datos): ModelBase
    {
        return new Self(
            id: $datos['id'] === null ? 0 : $datos['id'],
            socio: $datos['socio'],
            libro: $datos['libro'], 
            fecha_desde: $datos['fecha_desde'],
            fecha_hasta: $datos['fecha_hasta'],
            fecha_dev: $datos['fecha_dev']      
        );
    }
    public function diasRetraso(): int {
        $fechaDev = $this->fecha_hasta;
        $fechaActual = new DateTime();
        $diasRetraso = $fechaDev->diff($fechaActual);
        if ($fechaActual > $fechaDev) {
            return "Usted tiene $diasRetraso de demora";
        }
        else{
            return 0;
        }
        
    }



}