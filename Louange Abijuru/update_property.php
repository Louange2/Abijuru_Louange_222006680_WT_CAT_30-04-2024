<?php
include('database_connection.php');

// Check if propertyid is set
if(isset($_REQUEST['propertyid'])) {
    $prid = $_REQUEST['propertyid'];
    
    $stmt = $connection->prepare("SELECT * FROM property WHERE propertyid=?");
    $stmt->bind_param("i", $prid);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $x = $row['propertyid'];
        $u = $row['address'];
        $y = $row['type'];
        $z = $row['price'];
    } else {
        echo "property not found.";
    }
}
?>

<html>
<body>
    <form method="POST">
        <label for="adr">address:</label>
        <input type="number" name=adr" value="<?php echo isset($u) ? $u : ''; ?>">
        <br><br>

        <label for="ty">type:</label>
        <input type="text" name="ty" value="<?php echo isset($y) ? $y : ''; ?>">
        <br><br>

        <label for="pr">price:</label>
        <input type="text" name="pr" value="<?php echo isset($z) ? $z : ''; ?>">
        <br><br>

        <input type="submit" name="up" value="Update">
        
    </form>
</body>
</html>

<?php
if(isset($_POST['up'])) {
    // Retrieve updated values from form
    $address = $_POST['adr'];
    $type = $_POST['ty'];
    $price = $_POST['pr'];
    
    // Update the property in the database
    $stmt = $connection->prepare("UPDATE property SET address=?, type=?, price=? WHERE propertyid=?");
    $stmt->bind_param("ssdi", $address, $type, $price, $prid);
    $stmt->execute();
    
    // Redirect to property.php
    header('Location: property.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
