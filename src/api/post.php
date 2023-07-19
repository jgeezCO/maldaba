<?php 

    require_once("database.php");

    class Post extends Database{
        protected $post_data = null;

        public function __construct($post_data){
            if(!empty($post_data)){
                $this->post_data = $post_data;
            }
        }

        public function is_empty(){
            $empty = false;

            if(!empty($this->post_data)){
                $white_list_label = ["fn", "title", "surname", "dob", "email", "address"];
                
                foreach($white_list_label as $key){
                    
                    if(!isset($this->post_data[$key])){
                        $empty = true;
                        break;
                    }
                }

                return $empty;
            }

            return true;
        }

        public function is_file_uploaded(){
            if(isset($_FILES) && isset($_FILES["file_upload"])){
                if(!empty($_FILES["file_upload"]["name"])){
                    return true;
                }
            }

            return false;
        }

        public function clean_data($single_data){
            if(!empty($single_data)){
                return htmlspecialchars(stripslashes(trim($single_data))); 
            }

            return null;
        }

        private function single_upload(){
            if(!$this->is_empty()){
                //check if the email address is in the correct format
                if(filter_var($this->post_data["email"], FILTER_VALIDATE_EMAIL)){
                    
                    foreach($this->post_data as $key => $data)
                        $this->post_data[$key] = $this->clean_data($data);
                    
                    $response = $this->store($this->post_data);

                    //toast response and redirect ... if success (record submitted .... ), if failed (something went wrong ....)
                }
            }
        }

        private function batch_upload(){
            if($this->is_file_uploaded()){
                $file_data = FileProcess::upload($_FILES["file_upload"]);

                if(!empty($file_data)){
                    $response = $this->csv_upload($file_data["path"], "patient_record");
                    
                    //toast response and redirect ... if success (record submitted .... ), if failed (something went wrong ....)
                }
            }
        }

        public function run(){
            if($this->is_authorized()){
                if($this->is_file_uploaded()){
                    $this->batch_upload();
                } else {
                    if(!$this->is_empty()){
                        $this->single_upload();
                    }
                }
            }
        }
    }


    class FileProcess{
        public static function upload($file){
            $newFileName = self::getNewFileName($file["name"], "csv");
            $file['name'] = $newFileName;

            $is_upload_ok = false;
            $env_root = "../uploads";
           
            $absolute_path = $env_root . "/" . $newFileName;

            if (move_uploaded_file($file["tmp_name"], $absolute_path)) {
                $is_upload_ok = true;
                return ["filename" => $newFileName, "path" => $absolute_path];
            } 


            if($is_upload_ok == false){
                die("file not upload");
            }
        }

        private static function getNewFileName($filename, $extension){
            $random = "";
            for($i = 0; $i < 10; $i++)
               $random .= dechex(rand(10, 50));
            $random.= time();
            $data = md5($random . $filename);
            if(strlen($data) > 50)
                return substr($data, 0, 50) . "." . $extension;
            else return $data . "." . $extension;
        }
    }

    $post = new Post($_POST);
    $post->run();
?>