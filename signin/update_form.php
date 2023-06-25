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


// Prepare the SQL statement
$query = "UPDATE tours SET name = ?, country = ?, description = ?, price = ?, discount_price = ? WHERE id = ?";
$statement = $con->prepare($query);

// Assign values to the placeholders
$name = $_POST['name'];
$country = $_POST['country'];
$description = $_POST['description'];
$price = $_POST['price'];
$discount_price = $_POST['discount_price'];
$id = $_POST['id'];

// Bind the values to the statement
$statement->bind_param("sssddi", $name, $country, $description, $price, $discount_price, $id);

// Execute the statement
$statement->execute();

// Check if the update was successful
if ($statement->affected_rows > 0) {
    // echo "Update successful!";
    header("location: admin.php?status=successfulupdate");
} else {
    echo "Update failed.";
}

// Close the statement and the database connection
$statement->close();
$con->close();
?>
