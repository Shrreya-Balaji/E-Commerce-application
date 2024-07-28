<?php
include 'db_conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['selectedItems'])) {
    // Ensure selectedItems is an array
    $selectedItems = $_POST['selectedItems'];
    if (!is_array($selectedItems)) {
        $selectedItems = array($selectedItems);
    }

    // Sanitize and validate the selected dress IDs
    $validDressIDs = array();
    foreach ($selectedItems as $dressID) {
        $dressID = filter_var($dressID, FILTER_VALIDATE_INT);
        if ($dressID !== false) {
            $validDressIDs[] = $dressID;
        }
    }

    if (!empty($validDressIDs)) {
        // Generate the comma-separated list of dress IDs
        $dressIDList = implode(',', $validDressIDs);

        // Update availability of selected dresses
        $sqlUpdateDresses = "UPDATE dresses SET availability = NOT availability WHERE dress_id IN ($dressIDList)";
        if ($conn->query($sqlUpdateDresses) === TRUE) {
            echo "Selected items' availability status has been changed.";
        } else {
            echo "Error updating items: " . $conn->error;
        }
    } else {
        echo "Invalid dress IDs selected.";
    }
} else {
    echo "Invalid request.";
}

$conn->close();
?>
