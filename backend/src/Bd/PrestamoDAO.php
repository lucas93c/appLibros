<?php

namespace Raiz\Bd;

use Raiz\Aux\Serializador;
use Raiz\Bd\InterfaceDAO;
use Raiz\Models\Prestamo;


class PrestamoDAO implements InterfaceDAO
{

    public static function listar(): array
    {
        $sql = 'SELECT * FROM prestamos';
        $listaprestamos = ConectarBD::leer(sql: $sql);
        $prestamos = [];
        foreach ($listaprestamos as $prestamo) {
            $prestamos[] = Prestamo::deserializar($prestamo);
        }
        return $prestamos;
    }

    public static function encontrarUno(string $id): ?Prestamo
    {
        $sql = 'SELECT * FROM prestamos WHERE id =:id;';
        $prestamo = ConectarBD::leer(sql: $sql, params: [':id' => $id]); // ¿Es id o id_prestamo?
        if (count($prestamo) === 0) {
           return null;
        } else {
            $prestamo = Prestamo::deserializar($prestamo[0]);
            return $prestamo;
        }
    }
             /* 
            socio (Socio)
            libro (Libro)
            fecha_desde (date)
            fecha_hasta (date)
            fecha_dev 
            */
    public static function crear(Serializador $instancia): void
    {
        $params = $instancia->serializar();
        $sql = 'INSERT INTO prestamos (socio, libro, fecha_desde, fecha_hasta, fecha_dev) 
        VALUES (:id, :socio, :libro, fecha_desde, fecha_hasta, fecha_dev)';
        ConectarBD::escribir(
            sql: $sql,
            params: [
                ':socio' => $params['socio'],
                ':libro' => $params['libro'],
                ':fecha_desde' => $params['fecha_desde'],
                ':fecha_hasta' => $params['fecha_hasta'],
                ':fecha_dev' => $params['fecha_dev']
            ]
        );
    }

    public static function actualizar(Serializador $instancia): void
    {
        $params = $instancia->serializar();
        $sql = 'UPDATE prestamos SET socio =:socio, libro =:libro, fecha_desde =:fecha_desde, 
        fecha_hasta =:fecha_hasta, fecha_dev =:fecha_dev WHERE id=:id';
        ConectarBD::escribir(
            sql: $sql,
            params: [
                ':socio' => $params['socio'],
                ':libro' => $params['libro'],
                ':fecha_desde' => $params['fecha_desde'],
                ':fecha_hasta' => $params['fecha_hasta'],
                ':fecha_dev' => $params['fecha_dev']
            ]
        );
    }
    
    public static function borrar(string $id)
    {
        $sql = 'DELETE FROM prestamos WHERE id=:id';
        ConectarBD::escribir(sql: $sql, params: [':id' => $id]);
    }
}