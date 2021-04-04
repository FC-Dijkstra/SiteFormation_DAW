<?php
require_once("config.php");
include_once("logger.php");

class db
{
    private static $instance = null;
    private PDO $pdo;

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
        $query = $this->PDO->prepare($sql);

        if (count($params))
        {
            $x = 1;
            foreach ($params as $param)
            {
                $query->bindvalue($x, $param);
                $x++;
            }
        }

        if ($query->execute())
        {
            if ($callback)
            {
                $results = $query->fetchAll(PDO::FETCH_OBJ);
                return $results;
            }
        }
        else
        {
            return null;    //! attention 
        }
    }

    public function call($action, $table, $where)
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
                return $this->query($sql, array($value));
            }
        }
    }

    public function get($table, $where)
    {
        return $this->call("SELECT *", $table, $where);
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
        if (config::$verbose)
        {
            echo "<br />";
            echo $sql;
            echo "<br />";
            var_dump($values);
        }
    }
}
