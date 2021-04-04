<?php 

abstract class DBOject
{
    abstract protected static function save();
    abstract protected static function load();

    public function get($param)
    {
        return $this->$param ?? null;
    }

    public function set($param, $value)
    {
        if(property_exists($this, $param))
        $this->$param = $value;
    }
}