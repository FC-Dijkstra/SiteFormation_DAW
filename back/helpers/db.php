<?php
require_once(__DIR__ . "./config.php");
include_once(__DIR__ . "./logger.php");

class db
{
    private static $instance = null;
    private PDO $pdo;
    private bool $error;

    private function __construct()
    {
        try
        {
            $this->PDO = new PDO(
                "mysql:dbname=" . config::$dbname . ";host=" . config::$hostname,
                config::$login,
                config::$password,
                array(PDO::ATTR_PERSISTENT)
            );
        }
        catch (PDOException $e)
        {
            echo "Erreur de connexion: " . $e->getMessage();
        }
    }


    public static function getInstance()
    {
        if (!isset(self::$instance))
        {
            self::$instance = new db();
        }

        return self::$instance;
    }

    public function query($sql, $params = array(), $callback = true)
    {
        $this->error = false;
        $query = $this->PDO->prepare($sql);

        if (count($params)) //si params il y a -> bind
        {
            $x = 1;
            foreach ($params as $param)
            {
                $query->bindvalue($x, $param);
                $x++;
            }
        }

        try
        {
            $query->execute();
        }
        catch (PDOException $e)
        {
            logger::log($e->getMessage());
            $this->error = true;
            return null;
        }

        if (!$this->error)
        {
            if ($callback)
            {
                $results = $query->fetchAll(PDO::FETCH_OBJ);
                return $results;
            }
        }
    }

    public function call($action, $table, $where, $single = true)
    {
        $option = explode(" ", $where);
        if (count($option) == 3)
        {
            $validOperators = ["=", ">", "<", ">=", "<="];

            $field = $option[0];
            $operator = $option[1];
            $value = $option[2];

            if (in_array($operator, $validOperators))
            {
                $sql = "{$action} FROM {$table} WHERE {$field} {$operator} ?";
                if ($single)
                {
                    return current($this->query($sql, array($value)));
                }
                else
                {
                    return $this->query($sql, array($value));
                }

            }
        }
        else
        {
            $sql = "{$action} FROM {$table}";
            return $this->query($sql, []);
        }
    }

    public function get($table, $where)
    {
        return $this->call("SELECT *", $table, $where);
    }

    public function getID($table, $id)
    {
        return $this->call("SELECT *", $table, "id = {$id}");
    }

    public function getAll($table)
    {
        return $this->call("SELECT *", $table, "");
    }

    public function insert($table, $fields)
    {
        if (count($fields))
        {
            $keys = array_keys($fields);
            $values = array_values($fields);

            $keys_string = implode(", ", $keys);
            $values_string = "";

            $i = 1;
            foreach ($values as $value)
            {
                $values_string .= "?";
                if ($i < count($values)) $values_string .= ", ";

                $i++;
            }
        }

        $sql = "INSERT INTO {$table} (" . $keys_string . ") VALUES (" . $values_string . ");";

        $this->query($sql, $values, false);
    }

    public function hasError()
    {
        return $this->error;
    }
}
