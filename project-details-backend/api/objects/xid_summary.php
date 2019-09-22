<?php

class Xid  {
 
    // database connection and table name
    private $conn;
    private $table_name = "xid_summary";
 
    // // object properties
    // public $ID;
    // public $PROJECTID;
    // public $PROJ_NAME;
    // public $CITY;
    // public $LOCALITY_ID;
    // public $BUILDERID;
    // public $BUILDERNAME;
    // public $ENTRY_DT;
    // public $PROP_TYPE;
    // public $POSSESSION_TYPE;
   
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // read projects
function read(){
 
    // select all query
    $query =  "SELECT 'COLUMN_NAME' 
    FROM 'INFORMATION_SCHEMA'.'COLUMNS' 
    WHERE 'TABLE_SCHEMA'='99acresdb3' 
        AND '
        TABLE_NAME'='xid_summary'
            FROM
                " . $this->table_name ." order by projectid limit 80";

    for($i=0; $i<query.length; $i++){
        $query2 = 'select * from xid_summary';
        $result = mysql_query($query2);
        $k = 0;
       while ($k < mysql_num_fields($result))
       {
       $fld = mysql_fetch_field($result, $k);
       $myarray[]=$fld->name;
       $k = $k + 1;
       };
    
    }

    $query[i] == 

      
    // prepare query statement
    $stmt = $this->conn->prepare($query);
 
    // execute query
    $stmt->execute();
 
    return $stmt;
}

// create product
function create(){
 
    // query to insert record
    $query = "INSERT INTO
                " . $this->table_name . "
            SET
            PROJECTID=:PROJECTID, PROJ_NAME=:PROJ_NAME, CITY=:CITY, LOCALITY_ID=:LOCALITY_ID, BUILDERID=:BUILDERID,BUILDERNAME=:BUILDERNAME,ENTRY_DT=:ENTRY_DT,PROP_TYPE=:PROP_TYPE,POSSESSION_TYPE=:POSSESSION_TYPE";
 
    // prepare query
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    // $this->name=htmlspecialchars(strip_tags($this->name));
    // $this->price=htmlspecialchars(strip_tags($this->price));
    // $this->description=htmlspecialchars(strip_tags($this->description));
    // $this->category_id=htmlspecialchars(strip_tags($this->category_id));
    // $this->created=htmlspecialchars(strip_tags($this->created));
 
    // bind values
    $stmt->bindParam(":PROJECTID", $this->PROJECTID);
    $stmt->bindParam(":PROJ_NAME", $this->PROJ_NAME);
    $stmt->bindParam(":CITY", $this->CITY);
    $stmt->bindParam(":LOCALITY_ID", $this->LOCALITY_ID);
    $stmt->bindParam(":BUILDERID", $this->BUILDERID);
    $stmt->bindParam(":BUILDERNAME", $this->BUILDERNAME);
    $stmt->bindParam(":ENTRY_DT", $this->ENTRY_DT);
    $stmt->bindParam(":PROP_TYPE", $this->PROP_TYPE);
    $stmt->bindParam(":POSSESSION_TYPE", $this->POSSESSION_TYPE);
   
 
    // execute query
    
    if($stmt->execute()){
        return true;
    }
 
    return false;
     
}

// update the product
function update(){
 
    // update query
    $query = "UPDATE
                " . $this->table_name . "
            SET
            PROJECTID = :PROJECTID,
            PROJ_NAME = :PROJ_NAME,
            CITY = :CITY,
            LOCALITY_ID = :LOCALITY_ID,
            BUILDERID =:BUILDERID,
            BUILDERNAME =:BUILDERNAME,
            ENTRY_DT =:ENTRY_DT,
            PROP_TYPE =:PROP_TYPE,
            POSSESSION_TYPE = :POSSESSION_TYPE,
            
            WHERE
            ID = :ID" ;
 
    // prepare query statement
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    // $this->name=htmlspecialchars(strip_tags($this->name));
    // $this->price=htmlspecialchars(strip_tags($this->price));
    // $this->description=htmlspecialchars(strip_tags($this->description));
    // $this->category_id=htmlspecialchars(strip_tags($this->category_id));
    // $this->id=htmlspecialchars(strip_tags($this->id));
 
    // bind new values
    $stmt->bindParam(':ID', $this->ID);
    $stmt->bindParam(':PROJECTID', $this->PROJECTID);
    $stmt->bindParam(':PROJ_NAME', $this->PROJ_NAME);
    $stmt->bindParam(':CITY', $this->CITY);
    $stmt->bindParam(':LOCALITY_ID', $this->LOCALITY_ID);
    $stmt->bindParam(':BUILDERID', $this->BUILDERID);
    $stmt->bindParam(':BUILDERNAME', $this->BUILDERNAME);
    $stmt->bindParam(':ENTRY_DT', $this->ENTRY_DT);
    $stmt->bindParam(':PROP_TYPE', $this->PROP_TYPE);
    $stmt->bindParam(':POSSESSION_TYPE', $this->POSSESSION_TYPE);
    
    
 
    // execute the query
    if($stmt->execute()){
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
    $this->id=htmlspecialchars(strip_tags($this->ID));
 
    // bind id of record to delete
    $stmt->bindParam(1, $this->ID);
    
 
    // execute query
    if($stmt->execute()){
        return true;
    }
 
    return false;
     
}


}


