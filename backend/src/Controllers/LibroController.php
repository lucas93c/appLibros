<?php
namespace Raiz\Controllers;

use Raiz\Bd\LibroDAO;
use Raiz\Models\Libro;

class LibroController implements InterfaceController{
     
    public static function listar(): array
    {
        $libros = [];
        $listadolibro = LibroDAO::listar();
        foreach($listadolibro as $libro){
            $libros[] = $libro->serializar();
        }
        return $libros;

        
    }
    
    public static function encontrarUno(string $id): ?array
    {
        $libro = LibroDAO::encontrarUno($id);
        if($libro===null){
            return $libro;
        }else{
            return $libro->serializar();
        }
        
        
        
    }

    public static function crear(array $parametros): array
    {
        $libro = Libro::deserializar($parametros);
        LibroDAO::crear($libro);
        return $libro->serializar();
    }

    public static function actualizar(array $parametros): array
    {
        $libro = Libro::deserializar($parametros);
        LibroDAO::actualizar($libro);
        return $libro->serializar();
    }

    public static function borrar(string $id):void
    {
        LibroDAO::borrar($id);
        
    }
    
    


}