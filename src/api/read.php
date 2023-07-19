<?php 

    require_once("database.php");

    class Read extends Database{

        public function records(){
            $query = "SELECT * FROM `patient_records` ORDER BY id DESC";
            
            $result = mysqli_query($this->connect(), $query);

            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_assoc($result)){
                    $records[] = $row;
                }
            }

            return $records;
        }
    }
?>