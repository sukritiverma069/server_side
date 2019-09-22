<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");


$table=$_REQUEST['table'];

// include database and object files
include_once '../config/database.php';
include_once '../objects/project_2.php';
 
// instantiate database and project object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$project = new Project($db,$table);
 
// query projects
$stmt = $project->read();
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // projects array
    $projects_arr=array();
    $projects_arr["records"]=array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        
        $column_names = array();
        $column_names=explode(",", $project->table_column_names);
              // extract row
        // this will make $row['name'] to
        // just $name only
        //extract($row);
        
        $array_size = count($column_names);
        $project_item=array();
        
        for($i=0; $i < $array_size;$i++){
                $project_item[$column_names[$i]]=$row[$column_names[$i]];
                $project_item["edit"]="edit";
                $project_item["dropdown"]="dropdown";

          };

        array_push($projects_arr["records"], $project_item);
    }
 
    // set response code - 200 OK
    http_response_code(200);
 
    // show projects data in json format
    echo json_encode($projects_arr);
}else{
 
    // set response code - 404 Not found
    http_response_code(404);
 
    // tell the user no projects found
    echo json_encode(
        array("message" => "No projects found.")
    );
}
