<?php

declare(strict_types=1);

namespace Raiz\Models;
use DateTime;


class Socio extends ModelBase{
    
/*    

Atributos de la clase Socio:
nombre_apellido (string)
fecha_alta (date)
activo (int) valor 0 o 1
telefono (int)
direccion (string) */

private $nombre_apellido;
private $fecha_alta_socio;
private $activo_socio;
private $telefono_socio;
private $direccion_socio;

function __construct(int $id, 
                    string $nombre_apellido,
                    DateTime $fecha_alta_socio, 
                    int $activo_socio, 
                    int $telefono_socio, 
                    string $direccion_socio)
    {
        parent::__construct($id);
        $this->nombre_apellido=$nombre_apellido;
        $this->fecha_alta_socio=$fecha_alta_socio;
        $this->activo_socio=$activo_socio;
        $this->telefono_socio=$telefono_socio;
        $this->direccion_socio=$direccion_socio;
    }

    public function getId():int
    {
        return $this->id;
    }

    public function setNombre_apellido ($nuevo_nombre_apellido)
    {
        $this->nombre_apellido=$nuevo_nombre_apellido;
    }

    public function getNombre_apellido ()
    {
        return $this->nombre_apellido;
    }
    
    public function setFecha_alta_socio ($nueva_fecha_alta_socio)
    {
        $this->fecha_alta_socio=$nueva_fecha_alta_socio;
    }

    public function getFecha_alta_socio ()
    {
        return $this->fecha_alta_socio;
    }

    public function setActivo_socio ($nuevo_activo_socio)
    {
        $this->activo_socio=$nuevo_activo_socio;
    }

    public function getActivo_socio ()
    {
        return $this->activo_socio;
    }

    public function setTelefono_socio ($nuevo_telefono_socio)
    {
        $this->telefono_socio=$nuevo_telefono_socio;
    }

    public function getTelefono_socio ()
    {
        return $this->telefono_socio;
    }
    
    public function setDireccion_socio ($nueva_direccion_socio)
    {
        $this->direccion_socio=$nueva_direccion_socio;
    }

    public function getDireccion_socio ()
    {
        return $this->direccion_socio;
    }

    public function serializar(): array
    {
        return [
            /* 
            private $id;
            private $nombre_apellido;
            private $fecha_alta_socio;
            private $activo_socio;
            private $telefono_socio;
            private $direccion_socio;
            */
            'id'=>$this->getId(),
            'nombre_apellido'=>$this->getNombre_apellido(),
            'fecha_alta_socio'=>$this->getFecha_alta_socio(),
            'activo_socio'=>$this->getActivo_socio(),
            'telefono_socio'=>$this->getTelefono_socio(),
            'direccion_socio'=>$this->getDireccion_socio()
        ];
    }
    static function deserializar(array $datos): ModelBase
    {
        return new Self(
            id: $datos['id'] === null ? 0 : $datos['id'],
            nombre_apellido: $datos['nombre_apellido'],
            fecha_alta_socio: $datos['fecha_alta_socio'], 
            activo_socio: $datos['activo_socio'],
            telefono_socio: $datos['telefono_socio'],
            direccion_socio: $datos['direccion_socio']           
        );
    }

}

/* public function serializar(): array
    {
        return [
            /* 

            /
            ''=>$this->(),
        ];
    }
    static function deserializar(array $datos): ModelBase
    {
        return new Self(
            id: $datos['id'] === null ? 0 : $datos['id'],
            : $datos[''],           
        );
    } */