<?php
    class Contact{
        private $db;

        public function __construct(Database $database){
            $this->db = $database->getConnection();
        }

        public function index(){
            $statement = $this->db->prepare("SELECT * FROM data");
            $statement->execute();
            return $statement->fetchAll(PDO::FETCH_ASSOC);

        }
        public function destroy($id) {
            $statement = $this->db->prepare("DELETE FROM data WHERE id = :id");
            $statement->bindParam(':id', $id, PDO::PARAM_INT);
            return $statement->execute();
        }
        
        public function create($name, $email, $subject, $message){
            $statement = $this->db->prepare("INSERT INTO data (name, email, subject, message) VALUES (:name, :email, :subject, :message)");            $statement->bindParam(':email', $email, PDO::PARAM_STR);
            $statement->bindParam(':name', $name, PDO::PARAM_STR);
            $statement->bindParam(':email', $email, PDO::PARAM_STR);
            $statement->bindParam(':subject', $subject, PDO::PARAM_STR);
            $statement->bindParam(':message', $message, PDO::PARAM_STR);
            return $statement->execute();

        }
        public function show($id){
            $statement = $this->db->prepare("SELECT * FROM data WHERE id = :id");
            $statement->bindParam(':id', $id, PDO::PARAM_INT);
            $statement->execute();
            return $statement->fetch(PDO::FETCH_ASSOC);
        }

        public function edit($id, $name, $email, $subject, $message) {
            $statement = $this->db->prepare("UPDATE data SET name = :name, email = :email, subject = :subject, message = :message WHERE id = :id");
            $statement->bindParam(':id', $id, PDO::PARAM_INT);
            $statement->bindParam(':name', $name, PDO::PARAM_STR);
            $statement->bindParam(':email', $email, PDO::PARAM_STR);
            $statement->bindParam(':subject', $subject, PDO::PARAM_STR);
            $statement->bindParam(':message', $message, PDO::PARAM_STR);
            return $statement->execute();
        }
    
    }
?>