<?php
// Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: PUT');
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
$post->title = $data->title;
$post->category_id = $data->category_id;
$post->author = $data->author;
$post->body = $data->body;

//Update post
if($post->update()){
    echo json_encode(
        array('message'=>'Post Updated', 'success' =>true, 'post' => 'Data' )
    );
}else{
    echo json_encode(
        array('message' => 'Post NOT Updated', 'success'=>false)
    );
}

?>