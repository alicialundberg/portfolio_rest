<?php
 
 class provider {
    //DB 
    protected $db;

    public $table;
    public $tablename;
    public $id;
    public $name;
    public $title;
    public $description;
    public $start_date;
    public $end_date;

     //Constructor with DB

     function __construct() {
        $this->db = new mysqli('localhost', 'root', '', '') or die('Fel vid anslutning');
        if($this->db->connect_errno > 0) {
          die("Fel vid anslutning");
        }
      }


    public function get_data($table) {

        $sql = "SELECT * FROM $table ORDER BY id DESC";

        // Execute SQL command and create a result set
        $result = $this->db->query($sql);
        
        if($result->num_rows > 0) { // return true
        $output = array();
            while($row = mysqli_fetch_assoc($result)){
                $output[] = $row;
            }
            return $output;
        }
    
    }

    public function add_data($table, $tablename, $name, $title, $description, $start_date, $end_date) {

        //If statement that send different queries depending on table
        if($table == "education") {
            $sql = "INSERT INTO $table (tablename, name, title, description, start_date, end_date) VALUES ('$tablename', '$name', '$title', '$description', '$start_date', '$end_date');";
            return $result = $this->db->query($sql);
        }
        if($table == "experience") {
            $sql = "INSERT INTO $table (tablename, name, title, description, start_date, end_date) VALUES ('$tablename', '$name', '$title', '$description', '$start_date', '$end_date');";
            return $result = $this->db->query($sql);
        }
        if($table == "portfolio") {
            $sql = "INSERT INTO $table (tablename, name, title, description, start_date, end_date) VALUES ('$tablename', '$name', '$title', '$description', '$start_date', '$end_date');";
            return $result = $this->db->query($sql);
        }
    }

    public function update_data($table, $id, $name, $title, $description, $start_date, $end_date) {
        
        //If statement that send different queries depending on table
        if($table == "education") {
            $sql = "UPDATE $table SET name = '$name', title = '$title', description ='$description', start_date = '$start_date', end_date = '$end_date' WHERE id = '$id'"; 
            return $result = $this->db->query($sql);
        }
        if($table == "experience") {
            $sql = "UPDATE $table SET name = '$name', title = '$title', description ='$description', start_date = '$start_date', end_date = '$end_date' WHERE id = '$id'";
            return $result = $this->db->query($sql);
        }
        if($table == "portfolio") {
            $sql = "UPDATE $table SET name = '$name', title = '$title', description ='$description', start_date = '$start_date', end_date = '$end_date' WHERE id = '$id'";
            return $result = $this->db->query($sql);
        }
    }

    public function delete_data($table, $id) {
        
        $sql = "DELETE FROM $table WHERE id = $id";

        // Execute SQL command and create a result set
        return $result = $this->db->query($sql);
    }

 }

?>
