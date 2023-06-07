<?php
declare(strict_types=1);
namespace Raiz\Models;



class Autor extends ModelBase
{
 /*
Atributos de la clase Autor:
nombre_Apellido (string)
activo (int) valor 0 o 1*/   

    
    private $nombre_Apellido;
    private $activo;

    public function __construct(int $id, string $nombre_Apellido, int $activo)
    {
        parent::__construct($id);
        $this->nombre_Apellido=$nombre_Apellido;
        $this->activo=1;
    }

    
    public function setNombre_Apellido ($nuevo_nombre_Apellido)
    {
        $this->nombre_Apellido=$nuevo_nombre_Apellido;
    }

    public function getNombre_Apellido()
    {
        return $this->nombre_Apellido;
    }

    public function setActivo ($nuevo_activo)
    {
        $this->activo=$nuevo_activo;
    }

    public function getActivo()
    {
        return $this->activo;
    }

    public function serializar(): array
    {
        return [
            /* 
            nombre_Apellido (string)
            activo (int) valor 0 o 1  
            */
            'id'=>$this->getId(),
            'nombre_apellido'=>$this->nombre_Apellido,
            'activo'=>$this->activo
        ];
    }
    static function deserializar(array $datos): ModelBase
    {
        return new Self(
            id: $datos['id'] === null ? 0 : $datos['id'],
            nombre_Apellido: $datos ['nombre_Apellido'],
            activo: $datos['activo']          
        );
    }
    
}