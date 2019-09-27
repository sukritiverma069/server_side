<?php

class Project  {
 
    // database connection and table name
    private $conn;
    private $table_name = "project_details";

    
    // object properties
    public $ID;
    public $projectId;
    public $cityid;
    public $localityid;
    public $project_name;
    public $builderid;
    public $builder_name;
    public $property_type;
    public $construction_status;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }

    // read projects
function read(){
 
    // select all query
    $query = "SELECT ID,projectId,cityid,localityid,project_name,builderid,builder_name,property_type,construction_status 
            FROM
                " . $this->table_name ." order by projectid limit 200";
 
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
            projectId=:projectId, cityid=:cityid, localityid=:localityid, project_name=:project_name, builderid=:builderid,builder_name=:builder_name,property_type=:property_type,construction_status=:construction_status";
 
    // prepare query
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    // $this->name=htmlspecialchars(strip_tags($this->name));
    // $this->price=htmlspecialchars(strip_tags($this->price));
    // $this->description=htmlspecialchars(strip_tags($this->description));
    // $this->category_id=htmlspecialchars(strip_tags($this->category_id));
    // $this->created=htmlspecialchars(strip_tags($this->created));
 
    // bind values
    $stmt->bindParam(":projectId", $this->projectId);
    $stmt->bindParam(":cityid", $this->cityid);
    $stmt->bindParam(":localityid", $this->localityid);
    $stmt->bindParam(":project_name", $this->project_name);
    $stmt->bindParam(":builderid", $this->builderid);
    $stmt->bindParam(":builder_name", $this->builder_name);
    $stmt->bindParam(":property_type", $this->property_type);
    $stmt->bindParam(":construction_status", $this->construction_status);
 
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
                cityid = :cityid,
                localityid = :localityid,
                construction_status = :construction_status,
                localityid = :localityid,
                project_name =:project_name,
                property_type =:property_type,
                builder_name =:builder_name,
                projectId =:projectId
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
    $stmt->bindParam(':cityid', $this->cityid);
    $stmt->bindParam(':localityid', $this->localityid);
    $stmt->bindParam(':construction_status', $this->construction_status);
    $stmt->bindParam(':localityid', $this->localityid);
    $stmt->bindParam(':project_name', $this->project_name);
    $stmt->bindParam(':property_type', $this->property_type);
    $stmt->bindParam(':builder_name', $this->builder_name);
    $stmt->bindParam(':projectId', $this->projectId);
 
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


