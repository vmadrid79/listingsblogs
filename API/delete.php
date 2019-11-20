<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: DELETE');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-Type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

include_once './includes/classes/Database.php';
include_once './Models/Post.php';

//Instantiate blog posts object
$post = new Posts();

// Get raw posted data
$data = json_decode(file_get_contents("php://input"));

//echo "PUT DATA: " . $data->category_id;
//die;
$post->id = $data->id;

//Update post
if($post->delete()){
    echo json_encode(
        array('message'=>'Post Deleted')
    );
}else{
    echo json_encode(
        array('message' => 'Post NOT Deleted')
    );
}

?>