<?php

require_once 'handlers/config.php';

// https://docs.google.com/document/d/10nSjss4yJDp7ycySYUaHYOGx4hydNM8V/edit

if(!empty($_GET['status'])){

    // Retrieve the 'status' parameter from the URL
    $status = $_GET['status'];

    // Validate the 'status' parameter
    if (empty($status)) {
        // Handle the case when the parameter is empty
        // // Redirect or display an error message, for example
        // header("Location: error.php");
        // exit;
    }

    // Sanitize the 'status' parameter
    $sanitized_value = filter_var($status, FILTER_SANITIZE_FULL_SPECIAL_CHARS);

    if($sanitized_value === "success"){
        $submit_status = "<div class='success'>Tour Uploaded Successfully</div>";
    }

    if($sanitized_value === "error"){
        $submit_status = "<div class='error'>There was an error :(</div>";
    }

    if($sanitized_value === "successfulupdate"){
        $update_status = "<div class='success'>Tour Updated Successfully</div>";
        echo 
        <<<EOD
            <script type="text/javascript">
                document.addEventListener("DOMContentLoaded", function() {

                    var filterElements = document.querySelector("#filter-btns").children;
                    for (let j = 0; j < filterElements.length; j++) {
                        filterElements[j].classList.remove("active")
                    }
                    
                    const lastElement = filterElements[filterElements.length - 1];
                    lastElement.classList.add("active");

                })
            </script>
        EOD;
    }

}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Update Tours</title>
    <link rel="icon" href="../assets/images/logo.jpeg">
</head>
<body>
    <section class="portfolio" id="Portfolio">
        <div class="portfolio_container">
            <!-- <div class="row">
                <div class="section-title text-center">
                    <h1>Portfolio Filter</h1>
                </div>
            </div> -->
            <div class="row">
                <div class="filter-buttons">
                    <ul id="filter-btns">
                        <!-- <li class="active" data-target="all">ALL</li> -->
                        <li class="active" data-target="uploadtour">Upload Tour</li>
                        <li data-target="viewtours">View Tours</li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="portfolio-gallery">

                    <!-- <div data-id="uploadtour">
                        <p>
                            Have lunch like a local at this rustic gem. Enjoy Ocho Rios’ best-kept culinary secret with home-
                            style dishes that will have your taste buds dancing with joy.
                        </p>
                    </div> -->
 
                    <div class="item" data-id="uploadtour">

                        <?php require_once('form.php'); ?>

                    </div>
 
                    <div class="item" data-id="viewtours">

                        <?php

                            echo !empty($update_status) ? $update_status : "";

                            // Assuming you have already established a database connection
                            // and stored it in the $connection variable

                            // Prepare the SQL statement
                            $query = "SELECT * FROM tours";
                            $statement = $con->prepare($query);

                            // Execute the statement
                            $statement->execute();

                            // Get the result set
                            $result = $statement->get_result();

                            // Fetch and process the results
                            while ($row = $result->fetch_assoc()) {
                                // Access the values using the associative array
                                // echo "Column 1: " . $row['name'] . "<br>";
                                // echo "Column 2: " . $row['country'] . "<br>";
                                // echo "Column 3: " . $row['description'] . "<br>";
                                // echo "<br>";
                                require ("form2.php");
                            }

                            // Close the statement and the database connection
                            $statement->close();
                            $con->close();

                        ?>


                    </div>

                </div>
            </div>
 
        </div>
 
 
    </section>
 

    <script src="script.js"></script>
    
</body>
</html>