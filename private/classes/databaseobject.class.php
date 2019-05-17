<?php

class DatabaseObject {

  static protected $database;
  static protected $table_name = "";
  static protected $columns = [];
  protected $errors = [];

  static public function set_database($database) {
    self::$database = $database;
  }

  public function get_errors() {
    return $this->errors;
  }

  protected function validate() {
    $this->errors = [];

    // Add custom validations

    return $this->errors;
  }
}

?>
