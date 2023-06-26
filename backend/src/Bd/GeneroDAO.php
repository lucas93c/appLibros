<?php

namespace Raiz\Bd;

use Raiz\Aux\Serializador;
use Raiz\Bd\InterfaceDAO;
use Raiz\Models\Genero;


class generoDAO implements InterfaceDAO
{

    public static function listar(): array
    {
        $sql = 'SELECT * FROM generos';
        $listageneros = ConectarBD::leer(sql: $sql);
        $generos = [];
        foreach ($listageneros as $genero) {
            $generos[] = Genero::deserializar($genero);
        }
        return $generos;
    }
    
    public static function encontrarUno(string $id): ?Genero
    {
        $sql = 'SELECT * FROM generos WHERE id =:id;';
        $genero = ConectarBD::leer(sql: $sql, params: [':id' => $id]);
        if (count($genero) === 0) {
           return null;
        } else {
            $genero = Genero::deserializar($genero[0]);
            return $genero;
        }
    }

    public static function crear(Serializador $instancia): void
    {
        $params = $instancia->serializar();
        $sql = 'INSERT INTO generos (descripcion, activo) VALUES (:descripcion, :activo)';
        ConectarBD::escribir(
            sql: $sql,
            params: [
                ':descripcion' => $params['descripcion'],
                ':activo' => $params['activo']
            ]
        );
    }

    public static function actualizar(Serializador $instancia): void
    {
        $params = $instancia->serializar();
        $sql = 'UPDATE generos SET descripcion =:descripcion, activo=:activo WHERE id=:id';
        ConectarBD::escribir(
            sql: $sql,
            params: [
                ':descripcion' => $params['descripcion'],
                ':activo' => $params['activo'],
            ]
        );
    }
    public static function borrar(string $id)
    {
        $sql = 'DELETE FROM generos WHERE id=:id';
        ConectarBD::escribir(sql: $sql, params: [':id' => $id]);
    }
}
