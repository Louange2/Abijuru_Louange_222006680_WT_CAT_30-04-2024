<?php
include('database_connection.php');

// Check if transactionid is set
if(isset($_REQUEST['transactionid'])) {
    $tid = $_REQUEST['transactionid'];
    
    $stmt = $connection->prepare("SELECT * FROM transaction WHERE transactionid=?");
    $stmt->bind_param("i", $tid);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $x = $row['transactionid'];
        $u = $row['userid'];
        $y = $row['propertyid'];
        $z = $row['date'];
        $w = $row['amount'];
    } else {
        echo "Transaction not found.";
    }
}
?>

<html>
<body>
    <form method="POST">
        <label for="uid">userid</label>
        <input type="number" name="uid" value="<?php echo isset($u) ? $u : ''; ?>">
        <br><br>

        <label for="prid">propertyid:</label>
        <input type="text" name="prid" value="<?php echo isset($y) ? $y : ''; ?>">
        <br><br>

        <label for=dt>date:</label>
        <input type="text" name="dt" value="<?php echo isset($z) ? $z : ''; ?>">
        <br><br>

        <label for="amt">amount:</label>
        <input type="date" name="amt" value="<?php echo isset($w) ? $w : ''; ?>">
        <br><br>
        <input type="submit" name="up" value="Update">
        
    </form>
</body>
</html>

<?php
if(isset($_POST['up'])) {
    // Retrieve updated values from form
    $userid = $_POST['uid'];
    $propertyid = $_POST['prid'];
    $date = $_POST['dt'];
    $amount = $_POST['amt'];
    
    // Update the transaction in the database
    $stmt = $connection->prepare("UPDATE transaction SET userid=?, propertyid=?, date=?, amount=? WHERE transactionid=?");
    $stmt->bind_param("ssdd", $userid, $propertyid, $date, $amount);
    $stmt->execute();
    
    // Redirect to transaction.php
    header('Location: transaction.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
