<?php
//Headers
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once './includes/classes/Database.php';
include_once './Models/Post.php';

//Instantiate blog posts object
$posts = new Posts();
//Retrieve the blog post data
$_arr = $posts->read();
//Get row/array count
$num = count($_arr);
//echo "{\"data\":" . json_encode($_arr) . "}<br /><br /><br />";
echo "read.php; ";

if($num > 0){
    $posts_arr = array();
    $posts_arr['data'] = array(); 

    foreach($_arr as $e){
        //Extract Arry keys into parameters
        extract($e);
        
        $post_item = [
            'id' => $id,
            'category_id' => $category_id,
            'title' => $title,
            'body' => $body,
            'author' => $author,
            'category_name' => $category_name
        ];
        
        array_push($posts_arr['data'], $post_item);
    }
    //print_r($posts_arr);
    echo json_encode($posts_arr);
}else{
    //No Posts
    echo json_encode(array('message'=>'No Posts'));
}


?>