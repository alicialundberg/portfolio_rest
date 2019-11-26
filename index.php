<?php 
  // Required headers
 header("Content-Type: application/json; charset=UTF-8");
 header("Access-Control-Allow-Origin: *");
 header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT');

 include('provider.php');
 
 // Get HTTP method, path and input of the request
 $method = $_SERVER['REQUEST_METHOD'];
 $request = explode('/', trim($_SERVER['PATH_INFO'], '/'));
 $input = json_decode(file_get_contents('php://input'), true);


 $provider = new provider;

// Method to get database object to function
switch ($method){
 case "GET":
     $response = $provider->get_data($request[0]);
     break;
 case "POST":
     if($provider->add_data($input['table'], $input['tablename'], $input['name'], $input['title'], $input['description'], $input['start_date'], $input['end_date'])) {
         $response = array("message" => "Data added.");
     } else {
         $response = array("message" => "Error adding data");
     }
     break;
 case "PUT":
     if($provider->update_data($input['table'], $input['id'], $input['name'], $input['title'], $input['description'], $input['start_date'], $input['end_date'])) {
        $response = array("message" => "Data updated.");
     } else {
        $response = array("message" => "Error updating data");
     }
     break;
 case "DELETE":
    $provider->delete_data($input['table'], $input['id']);
    $response = array("message" => "Data deleted.");
    break;
 }
 echo json_encode($response);

?>
