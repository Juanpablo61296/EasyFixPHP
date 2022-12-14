<?php
include 'db.php';

class User extends DB{
    private $nombre;
    private $username;
    private $id;



    public function userExists($user, $pass){
        $md5pass = md5($pass);
        $query = $this->connect()->prepare('SELECT * FROM usuarios WHERE username = :user AND password = :pass');
        $query->execute(['user' => $user, 'pass' => $pass]);

        if($query->rowCount()){
            return true;
        }else{
            return false;
        }
    }

    


    public function setUser($user){
        $query = $this->connect()->prepare('SELECT * FROM usuarios WHERE username = :user');
        $query->execute(['user' => $user]);
        
        foreach ($query as $currentUser) {
            $this->nombre = $currentUser['nombre'];
            $this->usename = $currentUser['username'];
            $this->rol_id = $currentUser['rol_id'];

        }
    }

    public function getNombre(){
        return $this->nombre;
    }
    public function getRol_id(){
        return $this->rol_id;
    }
}

?>
