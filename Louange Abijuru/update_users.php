<?php
include('database_connection.php');

// Check if userid is set
if(isset($_REQUEST['userid'])) {
    $uid = $_REQUEST['userid'];
    
    $stmt = $connection->prepare("SELECT * FROM users WHERE userid=?");
    $stmt->bind_param("i", $uid);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $x = $row['userid'];
        $u = $row['username'];
        $y = $row['email'];
        $z = $row['gender'];
    } else {
        echo "userid not found.";
    }
}
?>

<html>
<body>
    <form method="POST">
        <label for="unm">username:</label>
        <input type="number" name="unm" value="<?php echo isset($u) ? $u : ''; ?>">
        <br><br>

        <label for="eml">email:</label>
        <input type="text" name="eml" value="<?php echo isset($y) ? $y : ''; ?>">
        <br><br>

        <label for="gd">gender:</label>
        <input type="number" name="gd" value="<?php echo isset($z) ? $z : ''; ?>">
        <br><br>

        <input type="submit" name="up" value="Update">
        
    </form>
</body>
</html>

<?php
if(isset($_POST['up'])) {
    // Retrieve updated values from form
    $username = $_POST['unm'];
    $email = $_POST['eml'];
    $gender = $_POST['gd'];
    
    // Update the product in the database
    $stmt = $connection->prepare("UPDATE users SET username=?, email=?, gender=? WHERE userid=?");
    $stmt->bind_param("ssdi", $Cusername, $email, $gender, $uid);
    $stmt->execute();
    
    // Redirect to users.php
    header('Location: users.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
