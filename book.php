<?php 

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve form data

    // Function to sanitize input
    function sanitizeInput($input) {
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);
        return $input;
    }

    if (isset($_POST['airport_form'])) {

        // echo "The airport form was selected";
        
        // Validate and sanitize form values
        $firstName = sanitizeInput($_POST['first-name']);
        $lastName = sanitizeInput($_POST['last-name']);
        $email = sanitizeInput($_POST['email']);
        $phone = sanitizeInput($_POST['phone']);
        $pickUpDate = sanitizeInput($_POST['pick-up-date']);
        $pickUpLocation = sanitizeInput($_POST['pick-up-location']);
        $dropOffLocation = sanitizeInput($_POST['drop-off-location']);
        $numPersons = sanitizeInput($_POST['num-persons']);
        // $piecesLuggage = sanitizeInput($_POST['pieces-luggage']);


        // Validate the form fields (example validation, modify as per your requirements)
        $errors = [];

        if (empty($firstName)) {
            $errors[] = "First name is required.";
        }

        if (empty($lastName)) {
            $errors[] = "Last name is required.";
        }

        if (empty($email)) {
            $errors[] = "Email is required.";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Invalid email format.";
        }

        if (empty($phone)) {
            $errors[] = "Phone number is required.";
        }

        if (empty($pickUpDate)) {
            $errors[] = "Pick up date and time is required.";
        }

        if (empty($pickUpLocation)) {
            $errors[] = "Pick up location is required.";
        }

        if (empty($dropOffLocation)) {
            $errors[] = "Drop off location is required.";
        }

        if (empty($numPersons)) {
            $errors[] = "Number of persons is required.";
        } elseif (!is_numeric($numPersons) || $numPersons < 1) {
            $errors[] = "Invalid number of persons.";
        }
        
        // if (empty($piecesLuggage)) {
        //     $errors[] = "Pieces of luggage are required.";
        // } elseif (!is_numeric($piecesLuggage) || $piecesLuggage < 1) {
        //     $errors[] = "Invalid pieces of luggage.";
        // }

        // Check if there are any errors
        if (!empty($errors)) {
            // Display errors to the user
            foreach ($errors as $error) {
                echo $error . "<br>";
            }
        } else {
            // No errors, proceed with further processing (e.g., saving to database or sending email)
            echo "Airport form was submitted!";
            // $submit_status = "<div class='submit_status'>Your request submission was successful!</div>";
            // require_once "email.php";
        }


    } elseif(isset($_POST['tour_form'])) {

        // echo "The tour form was selected";

        $firstName = sanitizeInput($_POST['first_name']);
        $lastName = sanitizeInput($_POST['last_name']);
        $email = sanitizeInput($_POST['email']);
        $phone = sanitizeInput($_POST['number']);
        $tour = sanitizeInput($_POST['tour']);
        $hotel = sanitizeInput($_POST['hotel']);
        $service_type = sanitizeInput($_POST['service_type']);
        $numPersons = sanitizeInput($_POST['num-persons']);
        // $piecesLuggage = sanitizeInput($_POST['pieces-luggage']);


        // Validate the form fields (example validation, modify as per your requirements)
        $errors = [];

        if (empty($firstName)) {
            $errors[] = "First name is required.";
        }

        if (empty($lastName)) {
            $errors[] = "Last name is required.";
        }

        if (empty($email)) {
            $errors[] = "Email is required.";
        } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Invalid email format.";
        }

        if (empty($phone)) {
            $errors[] = "Phone number is required.";
        }

        if (empty($tour)) {
            $errors[] = "Tour is required.";
        }

        if (empty($hotel)) {
            $errors[] = "Hotel is required.";
        }

        if (empty($service_type)) {
            $errors[] = "Service type is required.";
        }

        if (empty($numPersons)) {
            $errors[] = "Number of persons is required.";
        } elseif (!is_numeric($numPersons) || $numPersons < 1) {
            $errors[] = "Invalid number of persons.";
        }
        
        // if (empty($piecesLuggage)) {
        //     $errors[] = "Pieces of luggage are required.";
        // } elseif (!is_numeric($piecesLuggage) || $piecesLuggage < 1) {
        //     $errors[] = "Invalid pieces of luggage.";
        // }

        // Check if there are any errors
        if (!empty($errors)) {
            // Display errors to the user
            foreach ($errors as $error) {
                echo $error . "<br>";
            }
        } else {
            // No errors, proceed with further processing (e.g., saving to database or sending email)
            // echo "success";
            // $submit_status = "<div class='submit_status'>Your request submission was successful!</div>";
            require_once "email.php";
        }


    }

}


?>