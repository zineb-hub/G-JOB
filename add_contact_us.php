<?php
include('database_connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Use prepared statement to prevent SQL injection

    // Retrieve other input values
    $subject = trim($_POST['subject']);
    $message = trim($_POST['message']);

    // Basic validation
    if (empty($subject) || empty($message)) {
        echo "Subject and message are required.";
    } else {
        try {
            // ********* I should add the query of the name from the user id and the rating section 
            // Use prepared statement for inserting values into the database
            $sql = "INSERT INTO contact_us (msg_subject, msg_content) VALUES (?, ?)";
            $stmt = $connect->prepare($sql);
            $stmt->bind_param('ss', $subject, $message);

            // Execute the SQL statement
            if ($stmt->execute()) {
                // Success message or further processing
                echo "Message sent successfully!";
            } else {
                // Error message
                echo "Error sending message. Execution failed.";
            }
        } catch (Exception $e) {
            // Handle exceptions (database-related errors)
            echo "Error: " . $e->getMessage();

            // Log the error to a file or database for further analysis
            error_log("Exception: " . $e->getMessage(), 0);
        } finally {
            // Close the statement
            $stmt->close();

            // Close the database connection
            $connect->close();
        }
    }
}
?>
