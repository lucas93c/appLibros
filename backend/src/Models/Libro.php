<?php

/*¿Dejar?*/
declare(strict_types=1);
namespace Raiz\Models;

use Raiz\Models\ModelBase;

class Libro extends ModelBase
{    

/*
Atributos de la clase Libro:
id (int)
titulo (string)
editorial (Editorial)
autor (Autor[])
genero (Genero)
cant_paginas (int)
anio_publicacion (int)
estado(string) con tres posibles estados
Activo
Inactivo
Prestado

siendo Activo el estado predeterminado. Estos estados son seteados con constante: 
ejemplo: inicializamos estado:'$this->estado = static::ACTIVO' donde static::ACTIVO 
corresponte a la constante Const ACTIVO = "activo"*/
    private $id_libro;
    private $titulo_libro;    
    /** @var Editorial*/
    private $editorial;
    /** @var array Autor */
    private array $autor;
    /** @var Genero*/
    private $genero;
    /** @var Categoria*/
    private $categoria;
    private $cant_paginas;
    private $anio_publicacion;
    private $estado;
    const ACTIVO = 'activo';
    const INACTIVO = 'inactivo';
    const PRESTADO = 'prestado';

    public function __construct(int $id_libro,
        string $titulo_libro,
        Editorial $editorial,
        Autor $autor,
        Genero $genero,
        Categoria $categoria,  
        int $cant_paginas,
        int $anio_publicacion,
        string $estado = self :: ACTIVO )
    {
        $this->id_libro=$id_libro;
        $this->titulo_libro=$titulo_libro;
        $this->editorial=$editorial; /* id editorial*/
        $this->autor=$autor; /* id autor */
        $this->genero=$genero; /* id genero */
        $this->categoria=$categoria; /* id categoria */
        $this->cant_paginas=$cant_paginas;
        $this->anio_publicacion=$anio_publicacion;
    }

    public function getId_libro ()
    {
        return $this->id_libro;
    }

    public function getEstado ()
    {
        return $this->estado;
    }

    public function setAnio_publicacion ($nuevo_anio_publicacion)
    {
        $this->anio_publicacion=$nuevo_anio_publicacion;
    }

    public function getAnio_publicacion ()
    {
        return $this->anio_publicacion;
    }

    public function setCant_paginas ($nueva_cant_pagins)
    {
        $this->cant_paginas=$nueva_cant_pagins;
    }

    public function getCant_paginas ()
    {
        return $this->cant_paginas;
    }

    public function setGenero ($nuevo_genero)
    {
        $this->genero=$nuevo_genero;
    }

    public function getGenero ()
    {
        return $this->genero;
    }

    public function setCategoria ($nueva_categoria)
    {
        $this->categoria=$nueva_categoria;
    }

    public function getCategoria ()
    {
        return $this->categoria;
    }

    public function setAutor ($nuevo_autor)
    {
        $this->autor=$nuevo_autor;
    }

    public function getAutor ()
    {
        return $this->autor;
    }

    public function setEditorial ($nueva_editorial)
    {
        $this->editorial=$nueva_editorial;
    }

    public function getEditorial ()
    {
        return $this->editorial;
    }

    public function setTitulo_libro ($nuevo_titulo_libro)
    {
        $this->titulo_libro=$nuevo_titulo_libro;
    }

    public function getTitulo_libro ()
    {
        $this->titulo_libro;
    }

}