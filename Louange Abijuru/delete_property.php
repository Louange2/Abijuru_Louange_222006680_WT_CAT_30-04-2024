<?php
include('database_connection.php');
// Check if propertyid is set
if(isset($_REQUEST['propertyid'])) {
    $prid = $_REQUEST['propertyid'];
    
    // Prepare and execute the DELETE statement
    $stmt = $connection->prepare("DELETE FROM property WHERE propertyid=?");
    $stmt->bind_param("i", $prid);
    if ($stmt->execute()) {
        echo "Record deleted successfully.";
    } else {
        echo "Error deleting data: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "propertyid is not set.";
}

$connection->close();
?>
