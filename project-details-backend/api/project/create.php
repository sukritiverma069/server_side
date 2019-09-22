<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With,Origin");

// get database connection
include_once '../config/database.php';
 
// instantiate project object
include_once '../objects/project.php';
 
$database = new Database();
$db = $database->getConnection();
 
$project = new Project($db);
 
// get posted data
$data = json_decode(file_get_contents("php://input"));
 
// make sure data is not empty
// if(
//     !empty($data->projectId) &&
//     !empty($data->cityid) &&
//     !empty($data->localityid) &&
//     !empty($data->project_name) &&
//     !empty($data->builderid) &&
//     !empty($data->builder_name) &&
//     !empty($data->property_type) &&
//     !empty($data->construction_status) 
// ){
 
    // set project property values
    $project->projectId = $data->projectId;
    $project->cityid = $data->cityid;
    $project->localityid = $data->localityid;
    $project->project_name = $data->project_name;
    $project->builderid = $data->builderid;
    $project->builder_name = $data->builder_name;
    $project->property_type = $data->property_type;
    $project->construction_status = $data->construction_status;
    // $project->created = date('Y-m-d H:i:s');
 
    // create the project
    if($project->create()){
 
        // set response code - 201 created
        http_response_code(201);
 
        // tell the user
        echo json_encode(array("message" => "project was created."));
    }
 
    // if unable to create the project, tell the user
    else{
 
        // set response code - 503 service unavailable
        http_response_code(503);
 
        // tell the user
        echo json_encode(array("message" => "Unable to create project."));
    }
//  }else{
 
//     // set response code - 400 bad request
//     http_response_code(400);
 
//     // tell the user
//     echo json_encode(array("message" => "Unable to create project. Data is incomplete."));
// }
?>