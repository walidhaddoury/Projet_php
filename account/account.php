<?php 

class Account {
    public $id;
    public $username;
    public $email;
    public $password;
    public $role;
    public $created_at;

    public function hydrate(array $datas) {
        foreach($datas as $key => $value) {
            if (property_exists('Account', $key)) {
                $this->$key = $value;
            }
        }
    }
}

?>