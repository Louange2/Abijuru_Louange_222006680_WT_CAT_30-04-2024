<?php
include('database_connection.php');

// Check if paymentid is set
if(isset($_REQUEST['paymentid'])) {
    $pid = $_REQUEST['paymentid'];
    
    // Prepare and execute the DELETE statement
    $stmt = $connection->prepare("DELETE FROM payments WHERE paymentid=?");
    $stmt->bind_param("i", $pid);
    if ($stmt->execute()) {
        echo "Record deleted successfully.";
    } else {
        echo "Error deleting data: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "paymentid
     is not set.";
}

$connection->close();
?>
