<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With,Origin");
 
$table=$_REQUEST['table'];
// include database and object files
include_once '../config/database.php';
include_once '../objects/project_2.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare project$project object
$project = new Project($db, $table);
 
// get id of project$project to be edited
$data = json_decode(file_get_contents("php://input"));
 
// set ID property of project$project to be edited
foreach($data as $key => $value){
    $project->updated_table_row[$key]=$value;
}

// update the project$project
if($project->update()){
 
    // set response code - 200 ok
    http_response_code(200);
 
    // tell the user
    echo json_encode(array("message" => "Project was updated."));
}
 
// if unable to update the project$project, tell the user
else{
 
    // set response code - 503 service unavailable
    http_response_code(503);
 
    // tell the user
    echo json_encode(array("message" => "Unable to update project."));
}
?>