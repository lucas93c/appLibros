<?php
namespace Raiz\Controllers;

use Raiz\Bd\GeneroDAO;
use Raiz\Models\Genero;

class GeneroController implements InterfaceController{
     
    public static function listar(): array
    {
        $generos = [];
        $listadogenero = GeneroDAO::listar();
        foreach($listadogenero as $genero){
            $generos[] = $genero->serializar();
        }
        return $generos;

        
    }
    
    public static function encontrarUno(string $id): ?array
    {
        $genero = GeneroDAO::encontrarUno($id);
        if($genero===null){
            return $genero;
        }else{
            return $genero->serializar();
        }
        
        
        
    }

    public static function crear(array $parametros): array
    {
        $genero = Genero::deserializar($parametros);
        GeneroDAO::crear($genero);
        return $genero->serializar();
    }

    public static function actualizar(array $parametros): array
    {
        $genero = Genero::deserializar($parametros);
        GeneroDAO::actualizar($genero);
        return $genero->serializar();
    }

    public static function borrar(string $id):void
    {
        GeneroDAO::borrar($id);
        
    }
    
    


}