<?php
//Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once './includes/classes/Database.php';
include_once './Models/Post.php';

echo "TEST...";
// Instantiate @post object 
$post = new Posts();
// Get ID(will be passed via URL. ex http://site/?id=123)
$post->id = empty($_GET['id']) ? die() : $_GET['id'];

// Get single post 
$post->read_single();

// Create return array
$post_arr = [
    'category_id' => $post->category_id,
    'category_name' => $post->category_name,
    'title' => $post->title,
    'body' => $post->body,
    'author' => $post->author,
    'created_at' => $post->created_at,
    'updated_at' => $post->updated_at
];

// Return Json data
print_r(json_encode($post_arr));


?>