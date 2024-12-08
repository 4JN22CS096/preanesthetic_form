<?php
include 'config.php'; // Include the database connection file

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Check if all necessary fields are set in the POST request
    if (isset($_POST['name'], $_POST['age'], $_POST['gender'], $_POST['contact'], $_POST['emergency_contact'], 
              $_POST['height'], $_POST['weight'], $_POST['blood_group'], $_POST['allergies'], 
              $_POST['medical_history'], $_POST['surgical_history'], $_POST['medications'], 
              $_POST['smoking_status'], $_POST['alcohol_consumption'], $_POST['procedure'], 
              $_POST['symptoms'], $_POST['fasting_duration'])) {

        // Collect the form data from POST
        $name = $_POST['name'];
        $age = $_POST['age'];
        $gender = $_POST['gender'];
        $contact = $_POST['contact'];
        $emergency_contact = $_POST['emergency_contact'];
        $height = $_POST['height'];
        $weight = $_POST['weight'];
        $blood_group = $_POST['blood_group'];
        $allergies = $_POST['allergies'];
        $medical_history = $_POST['medical_history'];
        $surgical_history = $_POST['surgical_history'];
        $medications = $_POST['medications'];
        $smoking_status = $_POST['smoking_status'];
        $alcohol_consumption = $_POST['alcohol_consumption'];
        $procedure = $_POST['procedure'];
        $symptoms = $_POST['symptoms'];
        $fasting_duration = $_POST['fasting_duration'];

        // Prepare the SQL query with backticks around 'procedure'
        $stmt = $conn->prepare("INSERT INTO evaluations (name, age, gender, contact, emergency_contact, height, weight, blood_group, allergies, medical_history, surgical_history, medications, smoking_status, alcohol_consumption, `procedure`, symptoms, fasting_duration) 
                                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        // Bind the parameters to the prepared statement
        $stmt->bind_param("sissssssssssssssi", $name, $age, $gender, $contact, $emergency_contact, $height, $weight, $blood_group, $allergies, $medical_history, $surgical_history, $medications, $smoking_status, $alcohol_consumption, $procedure, $symptoms, $fasting_duration);

        // Execute the statement
        if ($stmt->execute()) {
            // Successfully inserted data, now retrieve the inserted data and display
            $last_id = $stmt->insert_id;

            // Fetch the inserted data using the last inserted ID
            $result = $conn->query("SELECT * FROM evaluations WHERE id = $last_id");

            // Display the submitted form details
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                echo "<h2>Form Details Submitted Successfully!</h2>";
                echo "<table border='1' cellpadding='10'>";
                echo "<tr><th>Name</th><td>" . $row['name'] . "</td></tr>";
                echo "<tr><th>Age</th><td>" . $row['age'] . "</td></tr>";
                echo "<tr><th>Gender</th><td>" . $row['gender'] . "</td></tr>";
                echo "<tr><th>Contact</th><td>" . $row['contact'] . "</td></tr>";
                echo "<tr><th>Emergency Contact</th><td>" . $row['emergency_contact'] . "</td></tr>";
                echo "<tr><th>Height</th><td>" . $row['height'] . "</td></tr>";
                echo "<tr><th>Weight</th><td>" . $row['weight'] . "</td></tr>";
                echo "<tr><th>Blood Group</th><td>" . $row['blood_group'] . "</td></tr>";
                echo "<tr><th>Allergies</th><td>" . $row['allergies'] . "</td></tr>";
                echo "<tr><th>Medical History</th><td>" . $row['medical_history'] . "</td></tr>";
                echo "<tr><th>Surgical History</th><td>" . $row['surgical_history'] . "</td></tr>";
                echo "<tr><th>Medications</th><td>" . $row['medications'] . "</td></tr>";
                echo "<tr><th>Smoking Status</th><td>" . $row['smoking_status'] . "</td></tr>";
                echo "<tr><th>Alcohol Consumption</th><td>" . $row['alcohol_consumption'] . "</td></tr>";
                echo "<tr><th>Procedure</th><td>" . $row['procedure'] . "</td></tr>";
                echo "<tr><th>Symptoms</th><td>" . $row['symptoms'] . "</td></tr>";
                echo "<tr><th>Fasting Duration</th><td>" . $row['fasting_duration'] . "</td></tr>";
                echo "</table>";
            } else {
                echo "Error: Data not found!";
            }
        } else {
            echo "Error: " . $stmt->error;
        }

        // Close the prepared statement
        $stmt->close();
    } else {
        echo "Please fill in all required fields!";
    }
}

// Close the database connection
$conn->close();
?>
