<?php
  // Headers
  header('Access-Control-Allow-Origin: *'); // auth, tokens? how?
  header('Content-Type: application/json'); //Mine type? Do you always have to say what data type your using

  include_once '../../config/Database.php';
  include_once '../../models/Post.php';

  // Instantiate DB & connect
  $database = new Database(); //Database function created in Database.php
  $db = $database->connect(); // Uses the connect fuction to make the connection to the database

  // Instantiate blog post object
  $post = new Post($db); // Passes the database to the post class to read it and return it

  //Blog post query
  $result = $post->read(); // Query was ran in the call
  // Get row count
  $num = $result->rowCount(); // PDO function 

  // Check if any posts
  if($num > 0) {
    //Post array
    $posts_arr = array();
    $posts_arr['data'] = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);  // EXTRACT. it turns arrays in to Variables ????

      $post_item = array(
        'id' => $id,
        'title' => $title,
        'body' => html_entity_decode($body),
        'author' => $author,
        'category_id' => $category_id,
        'category_name' => $category_name
      );

      // Push to "data"
      array_push($posts_arr['data'], $post_item);
    }

    // Turn to JSON & output
    echo json_encode($posts_arr);

  } else {
    // No Posts
    echo json_encode(
      array('message' => 'No Posts Found')
    );
  }