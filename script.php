<?php
// Function to read CSV and return array
function readCSV($file) {
    $rows = [];
    if (($handle = fopen($file, "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
            $rows[] = $data;
        }
        fclose($handle);
    }
    return $rows;
}

// Display data in table format
function displayTable($data) {
    echo "<table>";
    foreach ($data as $index => $row) {
        echo "<tr>";
        foreach ($row as $cell) {
            echo $index === 0 ? "<th>$cell</th>" : "<td>$cell</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}

// Load and display CSV files
function displayAnesthesiaData() {
    $roster = readCSV('data/roster.csv');
    $orAssignments = readCSV('data/OR.csv');
    $oncallAssignments = readCSV('data/oncall.csv');

    echo "<h2>Anesthesiologists</h2>";
    displayTable($roster);

    echo "<h2>OR Assignments</h2>";
    displayTable($orAssignments);

    echo "<h2>On-Call Assignments</h2>";
    displayTable($oncallAssignments);
}
?>
