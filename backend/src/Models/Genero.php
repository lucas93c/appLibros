<?php
declare(strict_types=1);
namespace Raiz\Models;

use Raiz\Models\ModelBase;

class Genero extends ModelBase
{    
/*Atributos de la clase Genero:
id (int)
descripcion (string)*/
    private $id_genero;
    private $descripcion_genero;

    public function __construct(int $id_genero, string $descripcion_genero)
    {
        $this->id_genero=$id_genero;
        $this->descripcion_genero=$descripcion_genero;
    }

    public function getId_genero ()
    {
        return $this->id_genero;
    }

    public function setDescripcion_genero ($nueva_descripcion_genero)
    {
        $this->descripcion_genero=$nueva_descripcion_genero;
    }

    public function getDescripcion_genero ()
    {
        return $this->descripcion_genero;
    }

}