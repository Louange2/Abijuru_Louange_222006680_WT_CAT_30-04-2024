<?php
include('database_connection.php');

// Check if paymentid is set
if(isset($_REQUEST['paymentid'])) {
    $pid = $_REQUEST['paymentid'];
    
    $stmt = $connection->prepare("SELECT * FROM payments WHERE paymentid=?");
    $stmt->bind_param("i", $pid);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $x = $row['paymentid'];
        $u = $row['transactionid'];
        $y = $row['date'];
        $z = $row['amount'];
        $b = $row['method'];
    } else {
        echo "Payment not found.";
    }
}
?>

<html>
<body>
    <form method="POST">
        <label for="tid">transactionid:</label>
        <input type="number" name="tid" value="<?php echo isset($u) ? $u : ''; ?>">
        <br><br>

        <label for="dt">date:</label>
        <input type="number" name="dt" value="<?php echo isset($y) ? $y : ''; ?>">
        <br><br>

        <label for="amt">amount:</label>
        <input type="date" name="amt" value="<?php echo isset($z) ? $z : ''; ?>">
        <br><br>

        <label for="mtd">method:</label>
        <input type="number" name="mtd" value="<?php echo isset($z) ? $b : ''; ?>">
        <br><br>


        <input type="submit" name="up" value="Update">
        
    </form>
</body>
</html>

<?php
if(isset($_POST['up'])) {
    // Retrieve updated values from form
    $transactionid= $_POST['tid'];
    $date = $_POST['dt'];
    $amount = $_POST['amt'];
    $method= $_POST['mtd'];
    
    // Update the payments in the database
    $stmt = $connection->prepare("UPDATE payments SET transactionid=?, date=?, amount=? , method=? WHERE paymentid=?");
    $stmt->bind_param("ssdii", $transactionid, $date, $amount, $method, $pid);
    $stmt->execute();
    
    // Redirect to payments.php
    header('Location: payments.php');
    exit(); // Ensure that no other content is sent after the header redirection
}
?>
