<?php
  session_start();

  if (!isset($_SESSION['loggedin'])) {
    header('location: login.php');
  }

  /**
   * the if statement below is for Exercise 2
   */
  if (isset($_POST['act'])) {
    $product = [
      'name' => $_POST['product_name'],
      'price' => $_POST['price'],
      'sizes' => $_POST['sizes'],
      'created_time' => date('Y-m-d h:i:s')
    ];
    $_SESSION['products'][] = $product;
  }
?>

<form method="post" action="add_product.php">
  Product name <input type="text" name="product_name"><br>
  Price <input type="number" name="price"><br>
  Sizes <input type="checkbox" name="sizes[]" value="XS"> XS
    <input type="checkbox" name="sizes[]" value="S"> S
    <input type="checkbox" name="sizes[]" value="M"> M
    <input type="checkbox" name="sizes[]" value="L"> L
    <input type="checkbox" name="sizes[]" value="XL"> XL<br>
  <input type="submit" name="act" value="Add Product">
</form>

<?php
/**
 * you can use a foreach loop to extract individual product
 * and display it the way you want
 */
  if (isset($_SESSION['products'])) {
    echo '<pre>';
    print_r($_SESSION['products']);
    echo '</pre>';
  }
?>