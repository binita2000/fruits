<?php
session_start();
include '../admin/config/config.php'; // Database connection file

if(isset($_POST['cart'])){
    $product_id = $_POST['product_id'];
    $quantity = $_POST['quantity'];
    $user_id = $_SESSION['user_id']; // Assuming user ID is stored in session

    // Check if the product is already in the cart
    $cart_count_query = "SELECT SUM(quantity) AS cart_count FROM cart WHERE user_id = '$user_id'";
$cart_count_result = mysqli_query($conn, $cart_count_query);
$cart_count_data = mysqli_fetch_assoc($cart_count_result);
$cart_count = $cart_count_data['cart_count'] ?? 0;
    if(mysqli_num_rows($result) > 0){
        // If product is already in the cart, update the quantity
        $update_cart = "UPDATE cart SET quantity = quantity + '$quantity' WHERE product_id = '$product_id' AND user_id = '$user_id'";
        if (!mysqli_query($conn, $update_cart)) {
            echo "Error updating record: " . mysqli_error($conn);
        }
    } else {
        // If product is not in the cart, insert a new record
        $cart = "INSERT INTO cart (product_id, quantity, user_id) VALUES ('$product_id', '$quantity', '$user_id')";
        if (!mysqli_query($conn, $cart)) {
            echo "Error inserting record: " . mysqli_error($conn);
        }
    }

    // Redirect to cart page or display a success message
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE .php>
<.php lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add to Cart</title>
</head>
<body>
    <form action="cart.php" method="POST">
        <input type="hidden" name="product_id" value="1"> <!-- Replace with dynamic product ID -->
        <input type="number" name="quantity" value="1" min="1">
        <button type="submit" name="cart">Add to Cart</button>
    </form>
</body>
</.php>
