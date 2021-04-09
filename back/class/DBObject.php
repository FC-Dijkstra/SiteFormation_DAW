<?php
abstract class DBObject
{
    abstract protected static function save($instance);
    abstract protected static function load($id);
    abstract protected static function getAll();

    public function get($param)
    {
        return $this->$param ?? null;
    }

    public function set($param, $value)
    {
        if (property_exists($this, $param))
        {
            $this->$param = $value;
        }
    }
}
