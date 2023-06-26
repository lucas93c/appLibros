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
private $fecha_alta;
private $activo;
private $telefono;
private $direccion;

function __construct(int $id, 
                    string $nombre_apellido,
                    DateTime $fecha_alta, 
                    int $activo, 
                    int $telefono, 
                    string $direccion)
    {
        parent::__construct($id);
        $this->nombre_apellido=$nombre_apellido;
        $this->fecha_alta=$fecha_alta;
        $this->activo=$activo;
        $this->telefono=$telefono;
        $this->direccion=$direccion;
    }

   

    public function setNombre_apellido ($nuevo_nombre_apellido)
    {
        $this->nombre_apellido=$nuevo_nombre_apellido;
    }

    public function getNombre_apellido ()
    {
        return $this->nombre_apellido;
    }
    
    public function setFecha_alta ($nueva_fecha_alta_socio)
    {
        $this->fecha_alta=$nueva_fecha_alta_socio;
    }

    public function getFecha_alta ()
    {
        return $this->fecha_alta;
    }

    public function setActivo ($nuevo_activo)
    {
        $this->activo=$nuevo_activo;
    }

    public function getActivo ()
    {
        return $this->activo;
    }

    public function setTelefono ($nuevo_telefono)
    {
        $this->telefono=$nuevo_telefono;
    }

    public function getTelefono ()
    {
        return $this->telefono;
    }
    
    public function setDireccion ($nueva_direccion)
    {
        $this->direccion=$nueva_direccion;
    }

    public function getDireccion ()
    {
        return $this->direccion;
    }

    public function serializar(): array
    {
        return [
            /* 
            private $id;
            private $nombre_apellido;
            private $fecha_alta;
            private $activo;
            private $telefono;
            private $direccion;
            */
            'id'=>$this->getId(),
            'nombre_apellido'=>$this->getNombre_apellido(),
            'fecha_alta'=>$this->getFecha_alta(),
            'activo'=>$this->getActivo(),
            'telefono'=>$this->getTelefono(),
            'direccion'=>$this->getDireccion()
        ];
    }
    static function deserializar(array $datos): ModelBase
    {
        return new Self(
            id: $datos['id'] === null ? 0 : $datos['id'],
            nombre_apellido: $datos['nombre_apellido'],
            fecha_alta: $datos['fecha_alta'], 
            activo: $datos['activo'],
            telefono: $datos['telefono'],
            direccion: $datos['direccion']           
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