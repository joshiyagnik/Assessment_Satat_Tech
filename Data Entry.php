<!DOCTYPE html>
<html>
<head>
    <title>Login Form</title>
</head>
<body>

<?php

$username = $password = $usernameErr = $passwordErr = "";
$studentName = $phoneNumber = $enrollmentNumber = $branch = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["username"])) {
        $usernameErr = "Username is required";
    } else {
        $username = test_input($_POST["username"]);
        if (!preg_match("/^[a-zA-Z][a-zA-Z0-9]*$/", $username)) {
            $usernameErr = "Username can only include alphanumeric characters and must start with a letter";
        }
    }

 
    if (empty($_POST["password"])) {
        $passwordErr = "Password is required";
    } else {
        $password = test_input($_POST["password"]);
        if (!preg_match("/^(?=.*[!@#$%^&*(),.?\":{}|<>])(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z]).{8,}$/", $password)) {
            $passwordErr = "Password must contain at least one punctuation mark, one digit, and one uppercase and lowercase letter.";
        }
    }

}
?>

<h2>Login Form</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Username: <input type="text" name="username" value="<?php echo $username;?>">
    <span class="error">* <?php echo $usernameErr;?></span>
    <br><br>
    Password: <input type="password" name="password" value="<?php echo $password;?>">
    <span class="error">* <?php echo $passwordErr;?></span>
    <br><br>
    <input type="submit" name="submit" value="Submit">
</form>


<?php

$studentName = $phoneNumber = $enrollmentNumber = $branch = "";
$studentNameErr = $phoneNumberErr = $enrollmentNumberErr = $branchErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    if (empty($_POST["student_name"])) {
        $studentNameErr = "Student Name is required";
    } else {
        $studentName = test_input($_POST["student_name"]);
    }

   
    if (empty($_POST["phone_number"])) {
        $phoneNumberErr = "Phone Number is required";
    } else {
        $phoneNumber = test_input($_POST["phone_number"]);
    }


    if (empty($_POST["enrollment_number"])) {
        $enrollmentNumberErr = "Enrollment Number is required";
    } else {
        $enrollmentNumber = test_input($_POST["enrollment_number"]);
    }

  
    if (empty($_POST["branch"])) {
        $branchErr = "Branch is required";
    } else {
        $branch = test_input($_POST["branch"]);
    }

    // Checking if all fields are vaid or not
    if (!empty($studentName) && !empty($phoneNumber) && !empty($enrollmentNumber) && !empty($branch)) {
        $studentData = "Student Name: " . $studentName . ", Phone Number: " . $phoneNumber . ", Enrollment Number: " . $enrollmentNumber . ", Branch: " . $branch . "\n";
        file_put_contents('studinfo.txt', $studentData, FILE_APPEND);
        echo "Student information added successfully.";
    }
}

//Reading data from the file
$studentRecords = file_get_contents('studinfo.txt');
if (!empty($studentRecords)) {
    echo "<h2>Student Records</h2>";
    echo "<pre>$studentRecords</pre>";
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<h2>Student Information Form</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Student Name: <input type="text" name="student_name" value="<?php echo $studentName;?>">
    <span class="error">* <?php echo $studentNameErr;?></span>
    <br><br>
    Phone Number: <input type="number" name="phone_number" value="<?php echo $phoneNumber;?>">
    <span class="error">* <?php echo $phoneNumberErr;?></span>
    <br><br>
    Enrollment Number: <input type="number" name="enrollment_number" value="<?php echo $enrollmentNumber;?>">
    <span class="error">* <?php echo $enrollmentNumberErr;?></span>
    <br><br>
    Branch: <input type="text" name="branch" value="<?php echo $branch;?>">
    <span class="error">* <?php echo $branchErr;?></span>
    <br><br>
    <input type="submit" name="submitStudent" value="Submit Student">
</form>