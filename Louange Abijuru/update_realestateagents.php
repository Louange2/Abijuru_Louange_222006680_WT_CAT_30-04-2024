<?php
include('database_connection.php');

// Check if agentid is set
if(isset($_REQUEST['agentid'])) {
    $agid = $_REQUEST['agentid'];
    
    $stmt = $connection->prepare("SELECT * FROM realestateagents WHERE agentid=?");
    $stmt->bind_param("i", $agid);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $x = $row['agentid'];
        $u = $row['name'];
        $y = $row['phone'];
        $f = $row['email'];
    } else {
        echo "agent not found.";
    }
}
?>

<html>
<body>
    <form method="POST">
        <label for="nm">name:</label>
        <input type="text" name="nm" value="<?php echo isset($u) ? $u : ''; ?>">
        <br><br>

        <label for="ph">phone:</label>
        <input type="text" name="ph" value="<?php echo isset($y) ? $y : ''; ?>">
        <br><br>

        <label for="eml">email:</label>
        <input type="text" name="eml" value="<?php echo isset($y) ? $f : ''; ?>">
        <br><br>
        <input type="submit" name="up" value="Update">
        
    </form>
</body>
</html>

<?php
if(isset($_POST['up'])) {
    // Retrieve updated values from form
    $name = $_POST['nm'];
    $phone = $_POST['ph'];
    $email = $_POST['eml'];
    
    // Update the agent in the database
    $stmt = $connection->prepare("UPDATE realestateagents SET name=?, phone=? email=? WHERE agentid=?");
    $stmt->bind_param("ssdi", $name, $phone, $email, $agid);
    $stmt->execute();
    
    // Redirect to realestateagents.php
    header('Location: realestateagents.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
