<?php
class Name{

    private $conn;
    private $table_name = "names";

    public $id;
    public $name;

    public function __construct($db){
        $this->conn = $db;
    }

    function update(){

        $query = "UPDATE " . $this->table_name . "
                    SET
                    name = :name
                    WHERE id = :id";

        $stmt = $this->conn->prepare($query);

        $this->name=htmlspecialchars(strip_tags($this->name));
        $this->id=htmlspecialchars(strip_tags($this->id));

        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":id", $this->id);

        if($stmt->execute()){
            return true;
        }

        return false;
    }

    public function delete(){
		$query = "DELETE FROM " . $this->table_name . " WHERE name = ?";
		$stmt = $this->conn->prepare($query);
		$stmt->bindParam(1, $this->name);
		if($stmt->execute()){
			return true;
		}

		return false;
	}

    function readAll() {

        $query = "SELECT * FROM " . $this->table_name . " ORDER BY name ASC";

        $stmt = $this->conn->prepare( $query );
        

        $stmt->execute();

        return $stmt;
    }

    function countAll() {

        $query = "SELECT COUNT(id) as total_rows
                FROM " . $this->table_name . " 
                ORDER BY id DESC";

        $stmt = $this->conn->prepare( $query );
        

        $stmt->execute();

         $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return $row['total_rows'];
    }

    function create(){

        $query = "INSERT INTO " . $this->table_name . "
                SET name = :name";

        $stmt = $this->conn->prepare($query);

        $this->name=htmlspecialchars(strip_tags($this->name));

        $stmt->bindParam(":name", $this->name);

        if($stmt->execute()){
            return true;
        }

        return false;
    }

    public function recordExistsByName(){

        $query = "SELECT id FROM " . $this->table_name . "
                  WHERE name = :name";

        $stmt = $this->conn->prepare( $query );

        $this->name=htmlspecialchars(strip_tags($this->name));

        $stmt->bindParam(":name", $this->name);

        $stmt->execute();

        $num = $stmt->rowCount();

        return $num;
    }
}
?>
