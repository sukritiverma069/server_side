<?php

class Project  {
 
    // database connection and table name
    private $conn;
    private $table_name ;

    
    //dynamic variables
    public $table_column_names;
    public $new_table_row = array();
    public $updated_table_row = array();
 
    // constructor with $db as database connection
    public function __construct($db,$table){
        $this->conn = $db;
        $this->table_name = $table;
    }


function getColumns() {
    $query =  "SELECT COLUMN_NAME 
    FROM INFORMATION_SCHEMA.COLUMNS 
    WHERE TABLE_SCHEMA='99acresdb3' 
        AND 
        TABLE_NAME='".$this->table_name."'" ;

// prepare query statement
$stmt = $this->conn->prepare($query);

  // execute query
  $stmt->execute();

  $num = $stmt->rowCount();
 // new array which will contain all column names
 $columns_arr=array();
// check if more than 0 record found

if($num>0){
    
    $index=0;
    $column_names="";
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        //echo $row['COLUMN_NAME']."\n";
        //array_push($columns_arr,$row['COLUMN_NAME']);
        $column_names=$column_names.$row['COLUMN_NAME'].",";
    }

$column_names= substr($column_names,0,strlen($column_names)-1);
$this->table_column_names=$column_names;
return $column_names;
}

}

    // read projects
function read(){
    
    //echo "going to get column names \n";
    $cols = $this->getColumns();

    // $column_names=""
    // for($i=0; $i < count($cols);$i++){

    //     echo "column name = ".$cols[$i]."\n";
    // }
    
    // select all query
    $query = "SELECT ".$cols." FROM ".$this->table_name ." limit 200";
    echo "\n";
    //echo "going to execute ".$query;
    // prepare query statement


    $stmt = $this->conn->prepare($query);
 
    // execute query
    $stmt->execute();
 
    return $stmt;
}

// create product
function create(){
 
    $cols = "";
    $placeholders = "";

    foreach ($this->new_table_row as $key => $value) {
        $cols=$cols.$key.",";
        $placeholders=$placeholders.":".$key.",";
       }
      
       $cols= substr($cols,0,strlen($cols)-1);
       $placeholders= substr($placeholders,0,strlen($placeholders)-1);
    
    // query to insert record
    $query = "INSERT INTO " . $this->table_name . "(".$cols.")"." VALUES "."(".$placeholders.")";
       
    // prepare query
    $stmt = $this->conn->prepare($query);
    
    // execute query
    if($stmt->execute($this->new_table_row)){
        return true;
    }
    
    return false;
     
}

// update the product
function update(){

    $placeholders2 = "";

    foreach ($this->updated_table_row as $key => $value){
        $placeholders2=$placeholders2.$key."=:".$key.", ";

        }
       $placeholders2= substr($placeholders2,0,strlen($placeholders2)-2);
 
    // update query
    
   
    //$query = "UPDATE " . $this->table_name." (".$cols2.")"." VALUES "."(".$placeholders2.") WHERE ID = :ID " ;
    $query = "UPDATE " . $this->table_name." SET ".$placeholders2." WHERE ID = :ID";
    //$query = "UPDATE project_details (projectid,cityid,localityid,project_name,builderid,builder_name,construction_status,property_type) VALUES (:projectid,:cityid,:localityid,:project_name,:builderid,:builder_name,:construction_status,:property_type) WHERE ID = :ID";
 
    // prepare query statement
    $stmt = $this->conn->prepare($query);

    // execute the query
    if($stmt->execute($this->updated_table_row)){
        return true;
    }
 
    return false;
}
 
// delete the product
function delete(){
 
    // delete query
    $query = "DELETE FROM " . $this->table_name . " WHERE ID = ?";
    
 
    // prepare query
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $this->ID=htmlspecialchars(strip_tags($this->ID));
 
    // bind id of record to delete
    $stmt->bindParam(1, $this->ID);
    
 
    // execute query
    if($stmt->execute()){
        return true;
    }
 
    return false;
     
}


}


