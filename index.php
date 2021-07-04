<?php 
  // importing the modules
  require('model/database.php');
  require('model/category_db.php');
  require('model/item_db.php');

  function show_error_page($error){
    $page_title = "Error!";
    include('view/error.php');
    exit();
  }

  // $page_title="Error Page";
  // $error = "No Error";
  // include('view/error.php');
  
  // Getting the item details and category name
  $item_id = filter_input(INPUT_POST, 'item_id', FILTER_VALIDATE_INT);
  $item_name = filter_input(INPUT_POST, 'item_name', FILTER_SANITIZE_STRING);
  $manufacturer = filter_input(INPUT_POST, 'manufacturer', FILTER_SANITIZE_STRING);
  $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
  $quantity = filter_input(INPUT_POST, 'quantity', FILTER_VALIDATE_INT);
  $category_name = filter_input(INPUT_POST, 'category_name', FILTER_SANITIZE_STRING);
  $search_query = filter_input(INPUT_POST, 'search_query', FILTER_SANITIZE_STRING);
  $additional_quantity = filter_input(INPUT_POST, 'additional_quantity', FILTER_VALIDATE_INT);

  // Getting the category id from GET or POST method
  $category_id = filter_input(INPUT_POST, 'category_id', FILTER_SANITIZE_STRING);

  if (!$category_id){
    $category_id = filter_input(INPUT_GET, 'category_id', FILTER_SANITIZE_STRING);
  }

  // Getting the action variable from GET or POST method
  $action = filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING);

  if (!$action){
    $action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING);
    if(!$action){
      $action = "list_items";
    }
  }

  // echo $action;
  switch($action) {
    case "edit_category_page":
      if($category_id){
        $page_title = "Edit Category";
        $category= get_category($category_id);
        include('view/edit_category.php');
      } else {
        show_error_page("Missing Category ID Parameter");
      }
      break;
    case "edit_category":
      if ($category_id && $category_name){
        try{
          update_category($category_id, $category_name);
          header("Location: .?action=list_category");
        } catch (PDOException $e){
          show_error_page($e->getMessage());
        }
      }
      break;
    case "add_quantity":
      try {
        add_quantity($item_id, $additional_quantity);
        header("Location: .?action=list_items");
      } catch (PDOException $e){
        show_error_page($e->getMessage());
      }
      break;
    case "edit_item_page":
      $page_title = "Edit Item";
      $item = get_item($item_id);
      $categories = get_categories();
      include('view/edit_item.php');
      break;
    case "edit_item":
      if($item_id && $item_name && $quantity && $price && $manufacturer && $category_id){
        try{
          update_item($item_id, $item_name,$manufacturer,$price,$quantity,$category_id);
          header("Location: .?action=list_items");
        } catch (PDOException $e){
          $error = $e->getMessage();
          show_error_page($error);
        }
      } else {
        show_error_page("Missing Parameters");
      }
    case "add_category_page":
      $page_title = "Add Category";
      include ('view/add_category.php');
      break;
    case "add_category":
      if($category_id && $category_name){
        try{
          add_category($category_id, $category_name);
          header("Location: .?action=list_category");
        } catch (PDOException $e){
          $error = "Database Error: ".e->getMessage();
          show_error_page($error);
        }
      } else {
        $error = "Missing or Invalid Item";
        show_error_page($error);
      }
      break;
    case "delete_item":
      if($item_id){
        delete_item($item_id);
        header("Location: .?category_id=$category_id");
      } else {
        $error = "Missing or Invalid Item";
        show_error_page($error);
      }
      break;
    case "add_item":
      if ($item_name && $manufacturer && $price && $quantity && $category_id){
        add_item($item_name, $manufacturer, $price, $quantity, $category_id);
        header("Location: .?category_id=$category_id");
      } else {
        $error = "Invalid parameters, Check if all the fields have valid data.";
        show_error_page($error);
      }
      break;
    case "search":
      try {
        $page_title = "Seatrch Result for $search_query";
        $items = search($search_query);
        include('view/search_result.php');
      } catch (PDOException $e){
        show_error_page("Database Error: ".$e->getMessage());
      }
    break;
    case "add_item_page":
      $categories = get_categories();
      include('view/add_item.php');
      break;
    case "delete_category":
      if($category_id){
        try{
          delete_category($category_id);
        } catch (PDOException $e){
          $error= "There are some items that belong in this category , you can not delete it while they exist";
          show_error_page($error);
        }
        header("Location: .?action=list_category");
      }
      break;
    case "list_category":
      $page_title = "Add Item";
      $categories = get_categories();
      include('view/category_list.php');
      break;
    case "category_stats_page":
      $page_title = "Category Stats";
      $categories = get_categories_display();
      include('view/category_stats.php');
      break;
    default:
      $page_title = "View Items";
      $categories = get_categories();
      $items = get_item_by_category($category_id);
      include ('view/item_list.php');
  } 

?>