<?php 
  function get_item_by_category($category_id){
    global $db;
    /**
     * Since the query in the else block doesnot have a parameter
     * trying to bind the value outside the if else block will throw the following error
     * Uncaught PDOException: SQLSTATE[HY093]:
     * Thus to prevent this prepare and bind the values inside the if/else block and execute them outside 
     * Solved by referencing the following link
     * https://www.codeproject.com/Questions/5264292/Error-SQLSTATE-HY093-invalid-parameter-number-numb
     * 
     */
    if ($category_id){
      $query = "SELECT item.item_id, item.item_name, item.manufacturer, item.price, item.quantity, (item.price * item.quantity) AS total_stock_value, category.category_name FROM item JOIN category on item.category = category.category_id WHERE item.category = :category_id ORDER BY item.item_id";
      $statement = $db->prepare($query);
      $statement->bindValue(":category_id", $category_id);
    } else {
      $query = "SELECT item.item_id, item.item_name, item.manufacturer, item.price, item.quantity, (item.price * item.quantity) AS total_stock_value, category.category_name FROM item JOIN category on item.category = category.category_id ORDER BY item.item_id";
      $statement = $db->prepare($query);
    }
    $statement->execute();
    $items = $statement->fetchAll();
    $statement->closeCursor();
    return $items; 
  }

  // function get_items(){
  //   global $db;
  //   $query = "SELECT * FROM item";
  //   $statement = $db->prepare($query);
  //   $statement->execute();
  //   $items = $statement->fetchAll();
  //   $statement->closeCursor();
  //   return $items;
  // }

  function get_item($item_id){
    global $db;
    $query = "SELECT * FROM item WHERE item_id = :item_id";
    $statement = $db->prepare($query);
    $statement->bindValue(":item_id", $item_id);
    $statement->execute();
    $item = $statement->fetchAll();
    $statement->closeCursor();
    return $item;
  }

  function delete_item($item_id){
    global $db;
    $query = "DELETE FROM item WHERE item_id = :item_id";
    $statement = $db->prepare($query);
    $statement->bindValue(":item_id", $item_id);
    $statement->execute();
    $statement->closeCursor();
  }

  function add_item($name, $manufacturer, $price, $quantity, $category_id){
    global $db;
    $query = "INSERT INTO item (item_name, manufacturer, price, quantity, category) VALUES (:name, :manufacturer, :price, :quantity, :category_id)";
    $statement = $db->prepare($query);
    $statement->bindValue(":name", $name);
    $statement->bindValue(":manufacturer", $manufacturer);
    $statement->bindValue(":price", $price);
    $statement->bindValue(":quantity", $quantity);
    $statement->bindValue(":category_id", $category_id);
    $statement->execute();
    $statement->closeCursor();
  }

  function update_item($item_id, $name, $manufacturer, $price, $quantity, $category_id){
    global $db;
    $query = "UPDATE item SET item_name = :name, manufacturer = :manufacturer, price = :price, quantity = :quantity, category = :category_id WHERE item_id = :item_id";
    $statement = $db->prepare($query);
    $statement->bindValue(":name", $name);
    $statement->bindValue(":manufacturer", $manufacturer);
    $statement->bindValue(":price", $price);
    $statement->bindValue(":quantity", $quantity);
    $statement->bindValue(":category_id", $category_id);
    $statement->bindValue(":item_id", $item_id);
    $statement->execute();
    $statement->closeCursor();
  }

  function add_quantity($item_id, $quantity){
    global $db;
    $query = "UPDATE item SET quantity = quantity + :quantity WHERE item_id = :item_id";
    $statement = $db->prepare($query);
    $statement->bindValue(':quantity', $quantity);
    $statement->bindValue(':item_id', $item_id);
    $statement->execute();
    $statement->closeCursor();
  }

  function search($search_string){
    global $db;
    $query = "SELECT item.item_id, item.item_name, item.manufacturer, item.price, item.quantity, (item.price * item.quantity) AS total_stock_value, category.category_name FROM item JOIN category on item.category = category.category_id WHERE CONCAT(item.item_name, item.manufacturer) LIKE :search_string ORDER BY item.item_id";
    $statement = $db->prepare($query);
    $statement->bindValue(":search_string", '%'.$search_string.'%');
    $statement->execute();
    $items = $statement->fetchAll();
    $statement->closeCursor();
    return $items;
  }
?>