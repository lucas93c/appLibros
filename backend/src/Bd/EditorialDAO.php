<?php

namespace Raiz\Bd;

use Raiz\Aux\Serializador;
use Raiz\Bd\InterfaceDAO;
use Raiz\Models\Editorial;


class EditorialDAO implements InterfaceDAO
{

    public static function listar(): array
    {
        $sql = 'SELECT * FROM editoriales';
        $listaeditorials = ConectarBD::leer(sql: $sql);
        $editorials = [];
        foreach ($listaeditorials as $editorial) {
            $editorials[] = Editorial::deserializar($editorial);
        }
        return $editorials;
    }

    public static function encontrarUno(string $id): ?Editorial
    {
        $sql = 'SELECT * FROM editoriales WHERE id =:id;';
        $editorial = ConectarBD::leer(sql: $sql, params: [':id' => $id]); // ¿Es id o id_editorial?
        if (count($editorial) === 0) {
           return null;
        } else {
            $editorial = Editorial::deserializar($editorial[0]);
            return $editorial;
        }
    }

    public static function crear(Serializador $instancia): void
    {
        $params = $instancia->serializar();
        $sql = 'INSERT INTO editoriales (nombre, activo) VALUES (:nombre, :activo)';
        ConectarBD::escribir(
            sql: $sql,
            params: [
                ':nombre' => $params['nombre'],
                ':activo' => $params['activo']
            ]
        );
    }

    public static function actualizar(Serializador $instancia): void
    {
        $params = $instancia->serializar();
        $sql = 'UPDATE editoriales SET nombre =:nombre, activo=:activo WHERE id=:id';
        ConectarBD::escribir(
            sql: $sql,
            params: [                
                ':nombre' => $params['nombre'],
                ':activo' => $params['activo']
            ]
        );
    }
    
    public static function borrar(string $id)
    {
        $sql = 'DELETE FROM editoriales WHERE id=:id';
        ConectarBD::escribir(sql: $sql, params: [':id' => $id]);
    }
}