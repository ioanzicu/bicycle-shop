<?php

class DatabaseObject
{
    protected static $database;
    protected static $table_name = "";
    protected static $columns = [];
    protected $errors = [];

    public static function set_database($database)
    {
        self::$database = $database;
    }

    public function get_errors()
    {
        return $this->errors;
    }

    protected function validate()
    {
        $this->errors = [];

        // Add custom validations

        return $this->errors;
    }
}

?>
