<?php
declare(strict_types=1);
namespace Raiz\Models;

use Raiz\Models\ModelBase;

class Categoria extends ModelBase
{
/*
Atributos de la clase Categoria:
id (int)
descripcion (string)
activo (int) valor 0 o 1
*/
    private $id;
    private $descripcion;
    private $activo;

    public function __construct(int $id, string $descripcion, int $activo)
    {
        parent::__construct ($id);
        $this->descripcion=$descripcion;
        $this->activo=1;
    }

    public function getId () :int
    {
        return $this->id;
    }

    public function setDescripcion ($nueva_descripcion)
    {
        $this->descripcion=$nueva_descripcion;
    }

    public function getDescripcion()
    {
        return $this->descripcion;
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
            id (int)
            descripcion (string)
            activo (int) valor 0 o 1
            */
            'id'=>$this->id,
            'descripcion'=>$this->descripcion,
            'activo'=>$this->activo
        ];
    }
    static function deserializar(array $datos): ModelBase
    {
        return new Self(
            id: $datos['id'] === null ? 0 : $datos['id'],
            descripcion: $datos['descripcion'],
            activo: $datos['activo']           
        );
    }
}