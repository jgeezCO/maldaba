<?php 
require_once "constant.php";

class Database{

    protected function connect(){
        $connection = mysqli_connect(SERVER_HOST, SERVER_USERNAME, SERVER_PASSWORD, DATABASE, SERVER_PORT);

        if(!$connection){
            die("Database Connection Issues: " . mysqli_connect_error());
        } else return $connection;

        return $connection;
    }

    protected function store($post_data){
        $title = $post_data["title"];
        $first_name = $post_data["fn"];
        $surname = $post_data["surname"];
        $dob = $post_data["dob"];
        $email = $post_data["email"];
        $address = $post_data["address"];
        $referred = $post_data["referred_email"];

        $query = "INSERT INTO `patient_record`(`title`, `first_name`, `surname`, `dob`, `email`, `address`, `referred`) 
        VALUES ('$title', '$first_name', '$surname', '$dob', '$email', '$address', '$referred')";

        $response = $this->excute($query);
    }

    protected function csv_upload($file_path, $table_name){
        $query = 'LOAD DATA LOCAL INFILE "' . $file_path . '"
        INTO TABLE ' . $table_name . '
        FIELDS TERMINATED BY \',\'
        LINES TERMINATED BY \'\n\'';

        $response = $this->excute($query);
    }

    protected function excute($query){
        $connection = $this->connect();
        $result = mysqli_query($connection, $query);            
    }

    protected function is_authorized(){
        return true; // since i am not required to create an auth system
    }
}

?>