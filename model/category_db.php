<?php 
  function get_categories(){
    global $db;
    $query = "SELECT * FROM category";
    $statement = $db->prepare($query);
    $statement->execute();
    $categories = $statement->fetchAll();
    $statement->closeCursor();
    return $categories;
  }

  function get_category($category_id){
    global $db;
    $query = "SELECT * FROM category WHERE category_id = :category_id";
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $statement->execute();
    $categories = $statement->fetchAll();
    $statement->closeCursor();
    return $categories[0];
  }



  function get_category_name($category_id){
    global $db;
    $query = "SELECT * FROM category WHERE category_id = :category_id";
    $statement= $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $statement->execute();
    $category = $statement->fetchAll();
    $statement->closeCursor();
    return $category;
  }
  
  function get_categories_display(){
    global $db;
    $query = "SELECT category.category_id, category.category_name, i.total_unique_items, i.total_items, i.total_stock_value FROM (SELECT category, count(*) total_unique_items, SUM(quantity) total_items, SUM(quantity * price) total_stock_value FROM item GROUP BY category) AS i JOIN category ON i.category = category.category_id";
    $statement = $db->prepare($query);
    $statement->execute();
    $categories = $statement->fetchAll();
    $statement->closeCursor();
    return $categories;
  }

  function add_category($category_id, $category_name){
    global $db;
    $query = "INSERT INTO category (category_id, category_name) VALUES(:category_id, :category_name)";
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $statement->bindValue(':category_name', $category_name);
    $statement->execute();
    $statement->closeCursor();
  }

  function update_category($category_id, $category_name){
    global $db;
    $query = "UPDATE category SET category_name = :category_name WHERE category_id = :category_id";
    $statement = $db->prepare($query);
    $statement->bindValue(':category_name', $category_name);
    $statement->bindValue(':category_id', $category_id);
    $statement->execute();
    $statement->closeCursor();
  }

  function delete_category($category_id){
    global $db;
    $query = "DELETE FROM category WHERE category_id = :category_id";
    $statement = $db->prepare($query);
    $statement->bindValue(':category_id', $category_id);
    $statement->execute();
    $statement->closeCursor();
  }
?>