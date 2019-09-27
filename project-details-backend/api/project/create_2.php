<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With,Origin");

$table=$_REQUEST['table'];

// get database connection
include_once '../config/database.php';
 
// instantiate project object
include_once '../objects/project_2.php';
 
$database = new Database();
$db = $database->getConnection();
 
$project = new Project($db,$table);
 
// get posted data
$data = json_decode(file_get_contents("php://input"));
 
 
    // set project property values

    foreach($data as $key => $value){
        $project->new_table_row[$key]=$value;
    }
   
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