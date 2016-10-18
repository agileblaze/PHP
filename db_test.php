<?php

$link = mysql_connect('localhost', 'test-db', 'testpwd');
if (!$link) {
    die('Not connected : ' . mysql_error());
}

$db_selected = mysql_select_db('employees', $link);
if (!$db_selected) {
    die ('Can\'t use employees : ' . mysql_error());
}

$query = "SELECT * FROM `employees` WHERE `birth_date` = '1965-02-01' and 
		`gender`='M' and `hire_date`>'1990-01-01' ORDER BY first_name,last_name";

$result = mysql_query($query);

$row_num = mysql_num_rows($result);

?>
<!DOCTYPE html>
<html>
<head>
<style>
table, td, th {
    border: 1px solid black;
}

table {
    border-collapse: collapse;
}
</style>
</head>
<body>

<?php

echo '<table style="border:1px solid;">';
echo '<tr><th>emp_no</th><th>birth_date</th><th>first_name</th><th>last_name</th><th>gender</th><th>hire_date</th><tr>';

if($row_num>0){
while ($row=mysql_fetch_array($result)) {
	echo '<tr><td>'.$row['emp_no'].'</td><td>'.$row['birth_date'].'</td><td>'.$row['first_name'].'</td><td>'.$row['last_name'].'</td><td>'.$row['gender'].'</td><td>'.$row['hire_date'].'</td><tr>';
}
} else {
	echo '<tr><td colspan="6">No record found</td></tr>';
}
echo '</table>';

?>

</body>
</html>
