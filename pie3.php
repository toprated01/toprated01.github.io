<?php
// Connecting, selecting database
include 'dbconnect.php';

// Performing SQL query
$query = 
"select name, ratings from programming_languages";
$result = mysqli_query($db_handle, $query);

// Printing results inside an HTML infographic tag
echo "<infographic-piechart  width='500'  height='500'>\n";
echo "<infographic-data>\n";
while ($row = mysqli_fetch_array($result)) {
    echo "<infographic-pieslice value='" . 
         $row['name'] . "'>" . 
         $row['ratings'] . 
         "</infographic-pieslice>\n";
}
echo "<infographic-data>\n";
echo "</infographic-piechart>\n";

// Free resultset
mysqli_free_result($result);

// Closing connection

?>