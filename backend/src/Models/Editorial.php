<?php
declare(strict_types=1);
namespace Raiz\Models;

use Raiz\Models\ModelBase;

class Editorial extends ModelBase
{
    /*
    Atributos de la clase Editorial:
    id (int)
    Nombre (string)
    */

    private $id_editorial;
    private $nombre_editorial;

    function __construct(int $id_editorial, string $nombre_editorial)
    {
        $this->id_editorial=$id_editorial;
        $this->nombre_editorial=$nombre_editorial;
    }

    public function getId_editorial ()
    {
        return $this->id_editorial;
    }

    public function setNombre_editorial ($nuevo_nombre_editorial)
    {
        $this->nombre_editorial=$nuevo_nombre_editorial;
    }

    public function getNombre_editorial ()
    {
        return $this->nombre_editorial;
    }

}