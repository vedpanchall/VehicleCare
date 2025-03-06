<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicle Service Appointment</title>
    <link rel="stylesheet" href="service.css">
    <link href="/DE/Homepage/assets/img/logo-no-background.png" rel="icon">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<?php
include("connect.php");
ob_start();
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if user is logged in
if (!isset($_SESSION['userId'])) {
    // If not, redirect to login page
    header("Location: /DE/loginpage/login-form-14/login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   // Step 1: Check Incoming POST Data
    // echo "Incoming POST Data:<br>";
    // print_r($_POST);
    // echo "<br>";
    
    //     // Step 2: Check Assigned Variables
    //     echo "vehicle_number: $vn<br>";
    //     echo "service_type: $service_type<br>";
    //     echo "preferred_datetime: $pd<br>";
    //     echo "state: $state<br>";
    //     echo "city: $ci<br>";
    //     echo "area: $ar<br>";
    //     echo "pickup  :  $pickup <br>";
    //     echo "additional_comments: $ac<br>";
    //     echo "pickup_drop_address: $pa<br>";
    if (isset($_POST['vehicle_number']) && isset($_POST['service_type']) && isset($_POST['preferred_datetime']) && isset($_POST['state']) && isset($_POST['city']) && isset($_POST['area']) && isset($_POST['additional_comments']) && isset($_POST['pickup_drop_address'])) {
        $vn = $_POST['vehicle_number'];
        $service_type = $_POST['service_type'];
        $pd = $_POST['preferred_datetime'];
        $state = $_POST['state'];
        $ci = $_POST['city'];
        $ar = $_POST['area'];
        $ac = $_POST['additional_comments'];
        $pickup = isset($_POST['pickup']) ? $_POST['pickup'] : 'no';
        $drop = isset($_POST['drop']) ? $_POST['drop'] : 'no';
        
        $pa = $_POST['pickup_drop_address'];


        // Database connection is already included in connect.php
        // Prepare the SQL query
        $sql = "INSERT INTO appointments (vehicle_number, service_type, preferred_datetime, city, state, area, additional_comments,pickup,drop_off,pickup_drop_address) VALUES ('$vn', '$service_type', '$pd', '$ci', '$state', '$ar', '$ac','$pickup','$drop', '$pa')";

        // Step 3: Check SQL Query
        echo "SQL Query: $sql<br>";

        if ($con->query($sql) === TRUE) {
       
            echo "<p style='color:#0047AB;' align='center'>Data inserted successfully</p>";            
            $last_id = $con->insert_id;
            $_SESSION['userId'] = $last_id;
            header('Location:http://localhost/DE/vehicle_service_monitoring_system/confirmation.php');
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }

        $con->close();
    } else {
        echo "Some POST data is missing.";
    }
} else {
    // echo "Form not submitted.";
}
?>
 
 <div class="logo">
			<a href="/DE/Homepage/index.html"><img src="/DE/Homepage/assets/img/logo-no-background.png" width="200px" height="100px"/></a>
 </div>
    <div class="glass-background" style="background-image: url('pic.jpg'); background-repeat: no-repeat; background-size: cover;">
    
        <div class="container" style="width:400px">
            <h2>Vehicle Service Appointment</h2>
            <form action="#" method="post"> <!-- Ensure this points to the correct PHP script -->
                <!-- Vehicle Number -->
                <label for="vehicle_number">Vehicle Number:</label>
                <input type="text" name="vehicle_number" required>

                <!-- Service Type -->
                <label for="service_type">Select Service Type:</label>
                <select name="service_type" required>
                    <option value="regular_maintenance">Regular Maintenance</option>
                    <option value="repairs">Repairs</option>
                    <option value="inspection">Inspection</option>
                </select>

                <!-- Preferred Date and Time -->
                <label for="preferred_datetime">Preferred Date and Time:</label>
                <input type="datetime-local" name="preferred_datetime" required>
                

                <!-- Location Selection -->
                <label for="state">Select State:</label>
<select name="state" id="state" onchange="updateCities()">
    <option value="">Select a state</option>
    <option value="Gujarat">Gujarat</option>
    <option value="Maharashtra">Maharashtra</option>
    <option value="Rajasthan">Rajasthan</option>
</select>

<label for="city">Select City:</label>
<select name="city" id="city" onchange="updateAreas()">
    <option value="">Select a city</option>
</select>

<label for="area">Select Service Centre:</label>
<select name="area" id="area">
    <option value="">Select an area</option>
</select>   
                               <script>
    const citiesByState = {
        Gujarat: ['Surat', 'Navsari', 'Ahmedabad'],
        Maharashtra: ['Nagpur', 'Pune', 'Thane'],
        Rajasthan: ['Jodhpur', 'Jaisalmer', 'Udaipur']
    };

    const areasByCity = {
        'Surat': ['Castrol Auto Service - Devi ', 'Jalaram Automobiles', 'G M Motors'],
        'Navsari': ['Jay Jalaram Auto Spares', 'Khodiyar Motors'],  
        'Ahmedabad': ['Khushi Automobile', 'Ram Auto Care', 'Ashok Motors'],
        'Nagpur': ['Modern Tyres and Services.', 'Nagpur Auto Works and Car Ac', 'Unnati Motors'],
        'Pune': ['Shaw Toyota', 'Kothari Hyundai'],
        'Thane': ['Shreenath Motors', 'Ritu Nissan PVT Limited'],
        'Jodhpur': [' Shree Krishna Motors', 'Om S S Car Services', 'Shree Ram Motors'],
        'Jaisalmer': ['Mahadev Automobiles', 'Swastik Wheel Alignment And Service Centre'],
        'Udaipur': ['Ratan TATA Leyland Automobiles', ' Auto 360']
    };

    function updateCities() {
        const stateSelect = document.getElementById('state');
        const citySelect = document.getElementById('city');
        const areaSelect = document.getElementById('area');
        const selectedState = stateSelect.value;

        // Clear the city and area dropdowns
        citySelect.innerHTML = '<option value="">Select a city</option>';
        areaSelect.innerHTML = '<option value="">Select an area</option>';

        // If a state is selected, populate the city dropdown
        if (selectedState) {
            const cities = citiesByState[selectedState];
            for (const city of cities) {
                const option = document.createElement('option');
                option.value = city;
                option.textContent = city;
                citySelect.appendChild(option);
            }
        }
    }

    function updateAreas() {
        const citySelect = document.getElementById('city');
        const areaSelect = document.getElementById('area');
        const selectedCity = citySelect.value;

        // Clear the area dropdown
        areaSelect.innerHTML = '<option value="">Select an area</option>';

        // If a city is selected, populate the area dropdown
        if (selectedCity) {
            const areas = areasByCity[selectedCity];
            if (areas) {
                for (const area of areas) {
                    const option = document.createElement('option');
                    option.value = area;
                    option.textContent = area;
                    areaSelect.appendChild(option);
                }
            }
        }
    }
</script>
                       
                <!-- Additional Comments -->
                <label for="additional_comments">Additional Comments:</label>
                <textarea name="additional_comments"></textarea>

                <!-- Pickup/Drop Option -->
                <div class="pickup-drop" name="option">
                    <label>Pickup/Drop Option:</label>
                    <input type="checkbox" name="pickup" value="yes"> Pickup
                    <input type="checkbox" name="drop" value="yes"> Drop
                </div>

                <!-- Address for Pickup/Drop -->
                <label for="pickup_drop_address">Address for Pickup/Drop:</label>
                <input type="text" name="pickup_drop_address">

                

                <!-- Submit Button -->
                <input type="submit" value="Submit">
            </form>
        </div>
    </div>
</body>
</html>
