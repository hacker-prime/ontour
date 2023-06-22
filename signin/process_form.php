<?php

require_once 'handlers/config.php';

/** FILTER_SANITIZE_FULL_SPECIAL_CHARS Explanation
 *  HTML entities are sequences of characters that begin with an ampersand (&) and end with a semicolon (;). They are used in HTML to represent special characters that have a specific meaning in HTML syntax or might be interpreted incorrectly by the browser.
 *  For example, let's consider the special character <. If this character is used directly within an HTML context, it would be interpreted as the start of an HTML tag. To prevent this interpretation and treat it as a literal character, it can be represented using the HTML entity &lt;.
 *  Similarly, other special characters like >, ", ', and & also have their corresponding HTML entities: &gt;, &quot;, &apos;, and &amp;, respectively.
 *  By encoding special characters to their HTML entities, we ensure that they are properly represented and will not be interpreted as part of HTML markup or introduce any potential security risks. This practice helps prevent issues like HTML injection or cross-site scripting (XSS) attacks, where malicious code can be injected into a web page.
 *  So, when the code uses the FILTER_SANITIZE_FULL_SPECIAL_CHARS filter, it sanitizes the input by encoding special characters (such as <, >, ", ', and &) in the "name" field to their respective HTML entities. This ensures that the output is safe for displaying within HTML content. 
**/

/** FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION Explanation
 *  filter_input: It is a PHP function used to get a specific external input variable.
 *  INPUT_POST: It is a constant that specifies the type of external input to retrieve. In this case, it indicates that we want to retrieve the value from the POST array.
 *  "price": It is the name of the input field from which we want to retrieve the value. In this case, it is "price".
 *  FILTER_SANITIZE_NUMBER_FLOAT: It is a filter constant that indicates the type of sanitization to apply to the input value. Here, FILTER_SANITIZE_NUMBER_FLOAT is used to sanitize the input as a floating-point number.
 *  FILTER_FLAG_ALLOW_FRACTION: It is a flag used with FILTER_SANITIZE_NUMBER_FLOAT to allow fractions (decimal values) in the sanitized number.
 *  After executing this line of code, the $price variable will contain the sanitized value of the "price" input field, converted to a floating-point number. The input will be cleaned of any non-numeric characters, ensuring that it is a valid number with optional decimal places. This helps maintain the integrity of the input and provides a sanitized value for further processing in your application.
**/

/** $timezone/$datetime Explanation https://chat.openai.com/share/e78a340c-1598-46b0-b0bd-c6a301fc9692
 *
 *  $timezone = new DateTimeZone('Jamaica');
 *  A new DateTimeZone object is created with the timezone identifier set to 'Jamaica'. This line specifies the desired timezone for the DateTime object.
 *
 *  $datetime = new DateTime();
 *  A new DateTime object is created without any arguments. This creates a DateTime object representing the current date and time in the default timezone (which is usually the timezone set in the PHP configuration).
 *
 *  $datetime->setTimezone($timezone);
 *  The setTimezone() method is used to change the timezone of the DateTime object. Here, it sets the timezone to the one defined by the $timezone DateTimeZone object created earlier (in this case, 'Jamaica').
 *
 *  $signuptime = $datetime->format('Y-m-d H:i:s');
 *  The format() method is used to convert the DateTime object to a string representation based on the specified format. In this case, the format 'Y-m-d H:i:s' is used, which represents the year, month, day, hour, minute, and second of the DateTime object.
 *  The resulting formatted string is assigned to the variable $signuptime.
 * 
 *  In summary, this code creates a DateTime object representing the current date and time, sets its timezone to 'Jamaica', and then formats it to a string representation in the format 'Y-m-d H:i:s'. The resulting formatted date and time string is stored in the $signuptime variable.
 *
**/

$name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

$country = filter_input(INPUT_POST, "country", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

$description = filter_input(INPUT_POST, "description", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

$price = filter_input(INPUT_POST, "price", FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

$discount_price = filter_input(INPUT_POST, "discount_price", FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);

$timezone = new DateTimeZone('Jamaica');
$datetime = new DateTime();
$datetime->setTimezone($timezone);
$datetime = $datetime->format('Y-m-d H:i:s');

// https://www.tutorialrepublic.com/php-tutorial/php-mysql-prepared-statements.php - OOP
// Prepare an insert statement
$sql = "INSERT INTO tours (name, country, description, price, discount_price, datetime) VALUES (?, ?, ?, ?, ?, ?)";

if($stmt = $con->prepare($sql)){
    // Bind variables to the prepared statement as parameters
    $stmt->bind_param("sssdds", $name, $country, $description, $price, $discount_price, $datetime);
    
    /* Set the parameters values and execute the statement to insert a row NOTE - We will instead use the variables set/established further up the file */
    // $first_name = "Ron";
    // $last_name = "Weasley";
    // $email = "ronweasley@mail.com";
    $stmt->execute();
    
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not prepare query: $sql. " . $con->error;
}
 
// Close statement
$stmt->close();
 
// Close connection
$con->close();

?>