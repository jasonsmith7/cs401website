<?php
class Dao {
private $host = "us-cdbr-iron-east-01.cleardb.net";
private $db = "heroku_d7e41e479b812b2";
private $user = "bba680437f68c5";
private $pass = "c36e0393";
public function getConnection () {
return
new PDO("mysql:host={$this->host};dbname={$this->db}"
}
... 
}
?>