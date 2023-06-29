<?php

require_once 'handlers/config.php';

if (isset($_POST['delete'])) {
    // Code to execute when the button is selected
    // echo "The button was selected!";
    // Additional actions or function calls can be performed here

    // Assuming you have already established a database connection
    // and stored it in the $con variable

    // Prepare the SQL statement
    $query = "DELETE FROM tours WHERE id = ?";
    $statement = $con->prepare($query);

    // Assign the value to the placeholder
    $id = $_POST['id'];

    // Bind the value to the statement
    $statement->bind_param("i", $id);

    // Execute the statement
    $statement->execute();

    // Check if the delete was successful
    if ($statement->affected_rows > 0) {
        // echo "Delete successful!";
        header("location: admin.php?status=successfuldelete");
    } else {
        echo "Delete failed.";
    }

    // Close the statement and the database connection
    // $statement->close();
    // $con->close();


}

// echo $_POST['id']; //testing to see if it works

// Assuming you have already established a database connection
// and stored it in the $con variable

// These lines retrieve the name and temporary location of the uploaded image, specify the directory where you want to save the image, and move the uploaded file to the specified directory.$image = $_FILES['image']['name'];
$image = $_FILES['image']['name'];
$image_tmp = $_FILES['image']['tmp_name'];
$image_dir = './assets/images/'; // Current directory
$image_path = $image_dir . basename($image);
move_uploaded_file($image_tmp, $image_path);

$imagename = $_POST['imagename'];

$image = !empty($image) ? $image : $imagename; 

// if(empty($image)){


// }

// Prepare the SQL statement
$query = "UPDATE tours SET name = ?, country = ?, description = ?, price = ?, discount_price = ?, image = ? WHERE id = ?";
$statement = $con->prepare($query);

// Assign values to the placeholders
$name = $_POST['name'];
$country = $_POST['country'];
$description = $_POST['description'];
$price = $_POST['price'];
$discount_price = $_POST['discount_price'];
$id = $_POST['id'];

// Bind the values to the statement
$statement->bind_param("sssddsi", $name, $country, $description, $price, $discount_price, $image, $id);

// Execute the statement
$statement->execute();

// Check if the update was successful
if ($statement->affected_rows > 0) {
    // echo "Update successful!";
    header("location: admin.php?status=successfulupdate");
} else{
    header("location: admin.php");
}
// else {
//     echo "Update failed.";
// }

// Close the statement and the database connection
$statement->close();
$con->close();
?>
