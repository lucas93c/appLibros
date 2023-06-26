<?php
namespace Raiz\Controllers;

use Raiz\Bd\EditorialDAO;
use Raiz\Models\Editorial;

class EditorialController implements InterfaceController{
     
    public static function listar(): array
    {
        $editoriales = [];
        $listadoeditorial = EditorialDAO::listar();
        foreach($listadoeditorial as $editorial){
            $editoriales[] = $editorial->serializar();
        }
        return $editoriales;

        
    }
    
    public static function encontrarUno(string $id): ?array
    {
        $editorial = EditorialDAO::encontrarUno($id);
        if($editorial===null){
            return $editorial;
        }else{
            return $editorial->serializar();
        }
        
        
        
    }

    public static function crear(array $parametros): array
    {
        $editorial = Editorial::deserializar($parametros);
        EditorialDAO::crear($editorial);
        return $editorial->serializar();
    }

    public static function actualizar(array $parametros): array
    {
        $editorial = Editorial::deserializar($parametros);
        EditorialDAO::actualizar($editorial);
        return $editorial->serializar();
    }

    public static function borrar(string $id):void
    {
        EditorialDAO::borrar($id);
        
    }
    
    


}