<?php
require_once("config.php");

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

    public function query($sql, $params = array())
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
            $results = $query->fetchAll(PDO::FETCH_OBJ);
            return $results;
        }
        else
        {
            return null;    //! attention 
        }
    }

    public function get($table, $options)
    {
        return $this->query("SELECT * FROM {$table} WHERE {$options}");
    }

    public function insert($table, $fields)
    {
        $keys = array_keys($fields);
        $values = array_values($fields);

        $key_string = "";
        $value_string = "";

        for ($i = 0; $i < count($fields); $i++)
        {
            if ($i == count($fields) - 1)
            {
                $key_string .= $keys[$i];
                $value_string .= "'" . $values[$i] . "'";
            }
            else
            {
                $key_string .= $keys[$i] . ", ";
                $value_string .= "'" . $values[$i] . "', ";
            }
        }

        $sql = "INSERT INTO {$table} (" . $key_string . ") VALUES (" . $value_string . ");";

        $this->query($sql, []);
    }
}
