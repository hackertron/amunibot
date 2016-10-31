<?php
# This function reads your DATABASE_URL config var and returns a connection
# string suitable for pg_connect. Put this in your app.
function pg_connection_string_from_database_url() {
  extract(parse_url($_ENV["DATABASE_URL"]));
  return "user=$user password=$pass host=$host dbname=" . substr($path, 1); # <- you may want to add sslmode=require there too
}
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
		echo $ans["ans"];
		#while ($ans = pg_fetch_row($result))
		 #{ 
		 #	print("$ans[0]\n");
		 #}
		
	}
}

get_ans("dress code");

?>

