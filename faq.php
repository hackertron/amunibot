<?php
# This function reads your DATABASE_URL config var and returns a connection
# string suitable for pg_connect. Put this in your app.
function pg_connection_string_from_database_url() {
  extract(parse_url($_ENV["DATABASE_URL"]));
  return "user=$user password=$pass host=$host dbname=" . substr($path, 1); # <- you may want to add sslmode=require there too
}
# Here we establish the connection. Yes, that's all.
#$pg_conn = pg_connect(pg_connection_string_from_database_url());
# Now let's use the connection for something silly just to prove it works:
/*$result = pg_query($pg_conn, "SELECT * FROM faq");
print "<pre>\n";
if (!pg_num_rows($result)) {
  print("Your connection is working, but your database is empty.\nFret not. This is expected for new apps.\n");
} else {
  print "Tables in your database:\n";
  $arr = pg_fetch_all($result);
  print_r("arr : $arr");
  while ($row = pg_fetch_row($result)) { print("- $row[0]\n"); }
}
print "\n";


$ans = array();
		while ($value = pg_fetch_row($result))
		 { 
		 	print("- $value[0]\n");
		 	array_push($ans, $value[0]);
		 }
		 return $ans;

*/
function get_ans($query)
{
	$pg_conn = pg_connect(pg_connection_string_from_database_url());
	$result = pg_query($pg_conn,"SELECT ans FROM faq where ques LIKE '%$query%'");
	if (!$result)
	{
		return "no result found";
	}
	else
	{
		$ans = pg_fetch_assoc($result);
		
		return $ans["ans"];

	}
}
?>