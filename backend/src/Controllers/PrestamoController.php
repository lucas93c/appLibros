<?php
namespace Raiz\Controllers;

use Raiz\Bd\PrestamoDAO;
use Raiz\Models\Prestamo;

class PrestamoController implements InterfaceController{
     
    public static function listar(): array
    {
        $prestamos = [];
        $listadoprestamo = PrestamoDAO::listar();
        foreach($listadoprestamo as $prestamo){
            $prestamos[] = $prestamo->serializar();
        }
        return $prestamos;

        
    }
    
    public static function encontrarUno(string $id): ?array
    {
        $prestamo = PrestamoDAO::encontrarUno($id);
        if($prestamo===null){
            return $prestamo;
        }else{
            return $prestamo->serializar();
        }
        
        
        
    }

    public static function crear(array $parametros): array
    {
        $prestamo = Prestamo::deserializar($parametros);
        PrestamoDAO::crear($prestamo);
        return $prestamo->serializar();
    }

    public static function actualizar(array $parametros): array
    {
        $prestamo = Prestamo::deserializar($parametros);
        PrestamoDAO::actualizar($prestamo);
        return $prestamo->serializar();
    }

    public static function borrar(string $id):void
    {
        PrestamoDAO::borrar($id);
        
    }
    
    


}