<?php
$conn=oci_connect('apatel2','avitron2', '//dbserver.engr.scu.edu/db11g');
if($conn) {
                print "<br> Connection to the database successful";
} else {
                $e = oci_error;
                        print "<br> connection failed:";
                                print htmlentities($e['message']);
                                        exit;
}

// create SQL statement

$sql = "Select * from Classes"; 

// parse SQL statement

$sql_statement = OCIParse($conn,$sql);

// execute SQL query

OCIExecute($sql_statement);
// get number of columns for use later

$num_columns = OCINumCols($sql_statement);

// start results formatting

echo "<TABLE BORDER=1>";
echo "<TR><TH>SCU Core Class</TH><TH>Alternate Class</TH><TH>University</TH></TR>";

// format results by row

while (OCIFetch($sql_statement)){
echo "<TR>";
 for ($i = 1; $i <= $num_columns; $i++) {
    $column_value = OCIResult($sql_statement,$i);
    echo "<TD>$column_value</TD>";
}
echo "</TR>";
}
echo "</TABLE>";

OCIFreeStatement($sql_statement);
OCILogoff($conn);

?>
<html>
 <head>
 <title>Step 1</title>
 </head>
 <body>
</body>
</html>