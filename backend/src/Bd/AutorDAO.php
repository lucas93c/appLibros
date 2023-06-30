<?php

namespace Raiz\Bd;

use Raiz\_Aux\Serializador;
use Raiz\Bd\InterfaceDAO;
use Raiz\Models\Autor;


class AutorDAO implements InterfaceDAO
{

    public static function listar(): array
    {
        $sql = 'SELECT * FROM autores';
        $listaautors = ConectarBD::leer(sql: $sql);
        $autors = [];
        foreach ($listaautors as $autor) {
            $autors[] = Autor::deserializar($autor);
        }
        return $autors;
    }

    public static function encontrarUno(string $id): ?Autor
    {
        $sql = 'SELECT * FROM autores WHERE id =:id;';
        $autor = ConectarBD::leer(sql: $sql, params: [':id' => $id]); // ¿Es id o id_autor?
        if (count($autor) === 0) {
           return null;
        } else {
            $autor = Autor::deserializar($autor[0]);
            return $autor;
        }
    }

    public static function crear(Serializador $instancia): void
    {
        $params = $instancia->serializar();
        $sql = 'INSERT INTO autores (nombre_apellido, activo) VALUES (:nombre_apellido, :activo)';
        ConectarBD::escribir(
            sql: $sql,
            params: [
                ':nombre_apellido' => $params['nombre_apellido'],
                ':activo' => $params['activo']
            ]
        );
    }

    public static function actualizar(Serializador $instancia): void
    {
        $params = $instancia->serializar();
        $sql = 'UPDATE autores SET nombre_apellido =:nombre_apellido WHERE id=:id';
        ConectarBD::escribir(
            sql: $sql,
            params: [
                ':id' => $params['id'],
                ':nombre_apellido' => $params['nombre_apellido'],
            ]
        );
    }
    
    public static function borrar(string $id)
    {
        $sql = 'DELETE FROM autores WHERE id=:id';
        ConectarBD::escribir(sql: $sql, params: [':id' => $id]);
    }
}