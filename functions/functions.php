<?php 

function getLastPost($db) {
    $query = "SELECT po.id, us.name AS 'user-name', ca.name, po.title, po.description, po.date 
              FROM  post po 
              INNER JOIN users us ON us.id = po.user_id 
              INNER JOIN categories ca ON  ca.id = po.category_id ORDER BY po.id DESC LIMIT 4;";
    $data = mysqli_query($db, $query);
    
    return $data;
}

function getCategories($db) {
    $query = "SELECT * FROM categories;";
    $data = mysqli_query($db, $query);
    return $data; 
}

function getAllViews($db) {
    $query = "SELECT po.id, us.name AS 'user-name', ca.name, po.title, po.description, po.date 
              FROM  post po 
              INNER JOIN users us ON us.id = po.user_id 
              INNER JOIN categories ca ON  ca.id = po.category_id ORDER BY po.id DESC;";
    $data = mysqli_query($db, $query);
    return $data;
}

function getCategory($db, $id){
    
     $query = "SELECT po.id, us.name AS 'user-name', ca.name, po.title, po.description, po.date 
              FROM  post po 
              INNER JOIN users us ON us.id = po.user_id 
              INNER JOIN categories ca ON  ca.id = po.category_id  WHERE po.category_id = $id ORDER BY po.id DESC;";
     
    $data = mysqli_query($db, $query);
    return $data;
}

function getNameCategory($db, $id) {
    $query = "SELECT * from categories WHERE categories.id = $id ;";
    $data = mysqli_query($db, $query);
    return $data;
}

function getNew($db, $id) {
    $query = "SELECT po.id, us.name AS 'user-name', ca.name, po.title, po.description, po.date 
              FROM  post po 
              INNER JOIN users us ON us.id = po.user_id 
              INNER JOIN categories ca ON  ca.id = po.category_id WHERE po.id = $id";
    $data = mysqli_query($db, $query);
    return $data;
}



?>

