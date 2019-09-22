<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/xid_summary.php';
 
// instantiate database and project object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$xid = new Xid($db);
 
// query projects
$stmt = $xid->read();
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // projects array
    $xids_arr=array();
    $xids_arr["records"]=array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $xid_item=array(
            "ID" => $ID,
            "PROJECTID" => $PROJECTID,
            "PROJ_NAME" => $PROJ_NAME,
            "CITY" => $CITY,
            "LOCALITY_ID" => $LOCALITY_ID,
            "BUILDERID" => $BUILDERID,
            "BUILDERNAME" => $BUILDERNAME,
            "ENTRY_DT" => $ENTRY_DT,
            "PROP_TYPE" => $PROP_TYPE,
            "POSSESSION_TYPE" => $POSSESSION_TYPE
           
        );
 
        array_push($xids_arr["records"], $xid_item);
    }
 
    // set response code - 200 OK
    http_response_code(200);
 
    // show projects data in json format
    echo json_encode($xids_arr);
}else{
 
    // set response code - 404 Not found
    http_response_code(404);
 
    // tell the user no projects found
    echo json_encode(
        array("message" => "No projects found.")
    );
}

