<?php
declare(strict_types=1);
namespace Raiz\Models;

use Raiz\Models\ModelBase;

class Editorial extends ModelBase
{
/*
Atributos de la clase Editorial:
Nombre (string)
activo (int) valor 0 o 1
*/
    
private $nombre;
private $activo;

public function __construct(int $id, string $nombre, int $activo)
{
    parent::__construct ($id);
    $this->nombre=$nombre;
    $this->activo=1;
}



public function setNombre ($nueva_nombre)
{
    $this->nombre=$nueva_nombre;
}

public function getNombre()
{
    return $this->nombre;
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
        nombre (string)
        activo (int) valor 0 o 1
        */
        'id'=>$this->getId(),
        'nombre'=>$this->nombre,
        'activo'=>$this->activo
    ];
}
static function deserializar(array $datos): ModelBase
{
    return new Self(
        id: $datos['id'] === null ? 0 : $datos['id'],
        nombre: $datos['nombre'],
        activo: $datos['activo']           
    );
}
}