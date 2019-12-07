<?php

class User extends DatabaseObject
{
    protected static $table_name = "users";
    protected static $db_columns = [
        'id',
        'first_name',
        'last_name',
        'email',
        'username',
        'hashed_password'
    ];

    private $id;
    private $first_name;
    private $last_name;
    private $email;
    private $username;
    protected $hashed_password;
    private $created_at;
    private $password;
    private $confirm_password;

    private $captcha;
    private $verify_captcha = false;
    protected $password_required = true;

    public function __construct($args = [])
    {
        $this->first_name = $args['first_name'] ?? '';
        $this->last_name = $args['last_name'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->username = $args['username'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->confirm_password = $args['confirm_password'] ?? '';
    }

    public function get_user_id()
    {
        return $this->id;
    }

    public function get_user_first_name()
    {
        return $this->first_name;
    }

    public function get_user_last_name()
    {
        return $this->last_name;
    }

    public function get_user_email()
    {
        return $this->email;
    }

    public function get_user_username()
    {
        return $this->username;
    }

    public function get_user_created_at()
    {
        return $this->created_at;
    }

    public function set_captcha($data)
    {
        $this->captcha = $data;
    }

    public function set_verify_captcha()
    {
        $this->verify_captcha = true;
    }

    public function full_name()
    {
        return $this->first_name . " " . $this->last_name;
    }

    protected function set_hashed_password()
    {
        $this->hashed_password = password_hash(
            $this->password,
            PASSWORD_BCRYPT
        );
    }

    public function verify_password($password)
    {
        return password_verify($password, $this->hashed_password);
    }

    protected function validate()
    {
        if (is_blank($this->first_name)) {
            $this->errors[] = "First name cannot be blank.";
        } elseif (
            !has_length($this->first_name, array('min' => 2, 'max' => 255))
        ) {
            $this->errors[] =
                "First name must be between 2 and 255 characters.";
        }

        if (is_blank($this->last_name)) {
            $this->errors[] = "Last name cannot be blank.";
        } elseif (
            !has_length($this->last_name, array('min' => 2, 'max' => 255))
        ) {
            $this->errors[] = "Last name must be between 2 and 255 characters.";
        }

        if (is_blank($this->email)) {
            $this->errors[] = "Email cannot be blank.";
        } elseif (!has_length($this->email, array('max' => 255))) {
            $this->errors[] = "Last name must be less than 255 characters.";
        } elseif (!has_valid_email_format($this->email)) {
            $this->errors[] = "Email must be a valid format.";
        }

        if (is_blank($this->username)) {
            $this->errors[] = "Username cannot be blank.";
        } elseif (
            !has_length($this->username, array('min' => 8, 'max' => 255))
        ) {
            $this->errors[] = "Username must be between 8 and 255 characters.";
        } elseif (
            !$this->has_unique_username($this->username, $this->id ?? 0)
        ) {
            $this->errors[] = "Username not allowed. Try another.";
        }

        if ($this->password_required) {
            if (is_blank($this->password)) {
                $this->errors[] = "Password cannot be blank.";
            } elseif (!has_length($this->password, array('min' => 12))) {
                $this->errors[] = "Password must contain 12 or more characters";
            } elseif (!preg_match('/[A-Z]/', $this->password)) {
                $this->errors[] =
                    "Password must contain at least 1 uppercase letter";
            } elseif (!preg_match('/[a-z]/', $this->password)) {
                $this->errors[] =
                    "Password must contain at least 1 lowercase letter";
            } elseif (!preg_match('/[0-9]/', $this->password)) {
                $this->errors[] = "Password must contain at least 1 number";
            } elseif (!preg_match('/[^A-Za-z0-9\s]/', $this->password)) {
                $this->errors[] = "Password must contain at least 1 symbol";
            }

            if (is_blank($this->confirm_password)) {
                $this->errors[] = "Confirm password cannot be blank.";
            } elseif ($this->password !== $this->confirm_password) {
                $this->errors[] = "Password and confirm password must match.";
            }

            if (is_blank($this->captcha)) {
                $this->errors[] = "Verification code cannot be blank.";
            } elseif ($this->verify_captcha) {
                $this->errors[] = "Captcha and verification code must match.";
            }
        }
    }

    public static function find_by_sql($sql)
    {
        $result = self::$database->query($sql);
        if (!$result) {
            exit("Database query failed.");
        }

        // results into objects
        $object_array = [];
        while ($record = $result->fetch_assoc()) {
            $object_array[] = static::instantiate($record);
        }

        $result->free();

        return $object_array;
    }

    public static function find_all()
    {
        $sql = "SELECT * FROM " . static::$table_name;
        return static::find_by_sql($sql);
    }

    public static function count_all()
    {
        $sql = "SELECT COUNT(*) FROM " . static::$table_name;
        $result_set = self::$database->query($sql);
        $row = $result_set->fetch_array();
        return array_shift($row);
    }

    public static function find_by_id($id)
    {
        $sql = "SELECT * FROM " . static::$table_name . " ";
        $sql .= "WHERE id='" . self::$database->escape_string($id) . "'";
        $obj_array = static::find_by_sql($sql);
        if (!empty($obj_array)) {
            return array_shift($obj_array);
        } else {
            return false;
        }
    }

    protected static function instantiate($record)
    {
        $object = new static();
        //  Automatically property assignment
        foreach ($record as $property => $value) {
            if (property_exists($object, $property)) {
                $object->$property = $value;
            }
        }
        return $object;
    }

    protected function create()
    {
        $this->set_hashed_password();
        $this->validate();
        if (!empty($this->errors)) {
            return false;
        }
        $attributes = $this->sanitized_attributes();
        $sql = "INSERT INTO " . static::$table_name . " (";
        $sql .= join(', ', array_keys($attributes));
        $sql .= ") VALUES ('";
        $sql .= join("', '", array_values($attributes));
        $sql .= "')";
        $result = self::$database->query($sql);
        if ($result) {
            $this->id = self::$database->insert_id;
            echo $this->id;
        }
        echo $result;

        return $result;
    }

    protected function update()
    {
        if ($this->password != '') {
            $this->set_hashed_password();
            // validate password
        } else {
            // password not being updated, skip hashing and validation
            $this->password_required = false;
        }
        $this->validate();
        if (!empty($this->errors)) {
            return false;
        }

        $attributes = $this->sanitized_attributes();
        $attribute_pairs = [];
        foreach ($attributes as $key => $value) {
            $attribute_pairs[] = "{$key}='{$value}'";
        }

        $sql = "UPDATE " . static::$table_name . " SET ";
        $sql .= join(', ', $attribute_pairs);
        $sql .=
            " WHERE id='" . self::$database->escape_string($this->id) . "' ";
        $sql .= "LIMIT 1";
        $result = self::$database->query($sql);
        return $result;
    }

    public function save()
    {
        // A new record will not have an ID yet
        if (isset($this->id)) {
            return $this->update();
        } else {
            return $this->create();
        }
    }

    public function merge_attributes($args = [])
    {
        foreach ($args as $key => $value) {
            if (property_exists($this, $key) && !is_null($value)) {
                $this->$key = $value;
            }
        }
    }

    // Properties which have database columns, excluding ID
    public function attributes()
    {
        $attributes = [];
        foreach (static::$db_columns as $column) {
            if ($column == 'id') {
                continue;
            }
            $attributes[$column] = $this->$column;
        }
        return $attributes;
    }

    protected function sanitized_attributes()
    {
        $sanitized = [];
        foreach ($this->attributes() as $key => $value) {
            $sanitized[$key] = self::$database->escape_string($value);
        }
        return $sanitized;
    }

    public function delete()
    {
        $sql = "DELETE FROM " . static::$table_name . " ";
        $sql .= "WHERE id='" . self::$database->escape_string($this->id) . "' ";
        $sql .= "LIMIT 1";
        $result = self::$database->query($sql);
        return $result;
    }

    public static function find_by_username($username)
    {
        $sql = "SELECT * FROM " . static::$table_name . " ";
        $sql .=
            "WHERE username='" .
            self::$database->escape_string($username) .
            "'";
        $obj_array = static::find_by_sql($sql);
        if (!empty($obj_array)) {
            return array_shift($obj_array);
        } else {
            return false;
        }
    }

    // has_unique_username('johnqpublic')
    // * Validates uniqueness of admins.username
    // * For new records, provide only the username.
    // * For existing records, provide current ID as second argument
    //   has_unique_username('johnqpublic', 4)
    public function has_unique_username($username, $current_id = "0")
    {
        $object = new static();
        $user = $object::find_by_username($username);
        if ($user === false || $this->id == $current_id) {
            // is unique
            return true;
        } else {
            // not unique
            return false;
        }
    }
}

?>
