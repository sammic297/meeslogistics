<style type="text/css">
	
	table.db-table 		{ border-right:1px solid #ccc; border-bottom:1px solid #ccc; }
table.db-table th	{ background:#eee; padding:5px; border-left:1px solid #ccc; border-top:1px solid #ccc; }
table.db-table td	{ padding:5px; border-left:1px solid #ccc; border-top:1px solid #ccc; }
</style>

<?php /* connect to the db */
$connection = mysqli_connect('localhost','root','');
mysqli_select_db('registration',$connection);

/* show tables */
$result = mysqli_query('SHOW TABLES',$connection) or die('cannot show tables');
while($tableName = mysqli_fetch_row($result)) {

	$table = $tableName[0];
	
	echo '<h3>',$table,'</h3>';
	$result2 = mysqli_query('SHOW COLUMNS FROM '.$table) or die('cannot show columns from '.$table);
	if(mysqli_num_rows($result2)) {
		echo '<table cellpadding="0" cellspacing="0" class="db-table">';
		echo '<tr><th>Field</th><th>Type</th><th>Null</th><th>Key</th><th>Default<th>Extra</th></tr>';
		while($row2 = mysqli_fetch_row($result2)) {
			echo '<tr>';
			foreach($row2 as $key=>$value) {
				echo '<td>',$value,'</td>';
			}
			echo '</tr>';
		}
		echo '</table><br />';
	}
} ?>