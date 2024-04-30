<?php
include('database_connection.php');

// Check if agentid is set
if(isset($_REQUEST['agentid'])) {
    $agid = $_REQUEST['agentid'];
    
    // Prepare and execute the DELETE statement
    $stmt = $connection->prepare("DELETE FROM realestateagents WHERE agentid=?");
    $stmt->bind_param("i", $agid);
    if ($stmt->execute()) {
        echo "Record deleted successfully.";
    } else {
        echo "Error deleting data: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "agentid is not set.";
}

$connection->close();
?>
