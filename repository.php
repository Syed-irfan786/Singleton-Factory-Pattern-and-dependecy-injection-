<?php
//repository pattern in PHP  Example with code 
interface Crud {
    public function findById($id);
    public function findByName($name);
    public function save(User $user);
    public function delete(User $user);
}

class DbCrud implements Crud {
    protected $db;

    public function __construct(PDO $db) {
        $this->db = $db;
    }

    // public function findById($id) {
    //     $stmt = $this->db->prepare("SELECT * FROM users WHERE id = :id");
    //     $stmt->execute(['id' => $id]);
    //     $result = $stmt->fetch(PDO::FETCH_ASSOC);
    //     if (!$result) {
    //         return null;
    //     }
    //     return new User($result['id'], $result['name'], $result['email']);
    // }

    public function findById($id){
        $query = "SELECT * FROM users WHERE id = $id" ;
        $stmt = $this->db->prepare($query);
        $stmt->execute() ;
        $resultSet = $stmt->fetch(PDO::FETCH_ASSOC);
        if(!$resultSet)
        {
            return null; 
        }
        else {
            return new User($resultSet['id'],$resultSet['name'] , $resultSet['email']);
        }
    }


    public function findByName($name1){
        $query = "SELECT * FROM users WHERE name = :name" ;
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':name', $name1);
        $stmt->execute() ;
        $resultSet = $stmt->fetch(PDO::FETCH_ASSOC);
        if(!$resultSet)
        {
            return null; 
        }
        else {
            // return  count($resultSet);
            return $resultSet['id'];
        }
    }
    

    public function save(User $user) {
        if ($user->getId() === null) {
            $stmt = $this->db->prepare("INSERT INTO users (name, email) VALUES (:name, :email)");
            $stmt->execute(['name' => $user->getName(), 'email' => $user->getEmail()]);
            $user->setId($this->db->lastInsertId());
        } else {
            $stmt = $this->db->prepare("UPDATE users SET name = :name, email = :email WHERE id = :id");
            $stmt->execute(['name' => $user->getName(), 'email' => $user->getEmail(), 'id' => $user->getId()]);
        }
    }

    public function delete(User $user) {
        $stmt = $this->db->prepare("DELETE FROM users WHERE id = :id");
        $stmt->execute(['id' => $user->getId()]);
    }
}

class User {
    protected $id;
    protected $name;
    protected $email;

    public function __construct($id, $name, $email) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
    }

    public function getId() {
        return $this->id;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }
}
//database name = phppdo , table is users
$db = new PDO('mysql:host=localhost;dbname=phppdo', 'root', '');
$crud = new DbCrud($db);
// Create a new user
// $newUser = new User(null, 'irfan', 'johndoe@example.com');
// $crud->save($newUser);

// $obj = $crud->findById(12);
// $obj = $crud->findByName('irfan');

// echo $obj;


$user = new User(9, 'irfan', 'johndoe@example.com' );
// Delete a user
$crud->delete($user);
