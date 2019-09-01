<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// include database and object files
include_once '../config/database.php';
include_once '../objects/project.php';
 
// get database connection
$database = new Database();
$db = $database->getConnection();
 
// prepare project$project object
$project = new Project($db);
 
// get id of project$project to be edited
$data = json_decode(file_get_contents("php://input"));
 
// set ID property of project$project to be edited
$project->projectId = $data->projectId;
 
// set project$project property values
$project->cityid = $data->cityid;
$project->localityid = $data->localityid;
$project->project_name = $data->project_name;
$project->builderid = $data->builderid;
$project->builder_name = $data->builder_name;
$project->construction_status = $data->construction_status;
$project->property_type = $data->property_type;
 
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