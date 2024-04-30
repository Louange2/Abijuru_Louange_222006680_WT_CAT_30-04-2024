<?php
include('database_connection.php');

// Check if transactionid is set
if(isset($_REQUEST['transactionid'])) {
    $tid = $_REQUEST['transactionid'];
    
    // Prepare and execute the DELETE statement
    $stmt = $connection->prepare("DELETE FROM transaction WHERE transactionid=?");
    $stmt->bind_param("i", $tid);
    if ($stmt->execute()) {
        echo "Record deleted successfully.";
    } else {
        echo "Error deleting data: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "transactionid is not set.";
}

$connection->close();
?>
