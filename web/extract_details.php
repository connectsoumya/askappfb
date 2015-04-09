

<?php  // Html safe containers

	// $url1=$_GET['https://graph.facebook.com/oauth/access_token?grant_type=fb_exchange_token&client_id=1788581694700829&client_secret=d95dde9374fe7d3715007c27db6a74a4&fb_exchange_token=CAAZAatKCQfR0BAEAh2e2fN72FIQ1BzKNE0x6TcbMqjQotvu3ESAN9rTmBH3GRwk7C2H9QguqdreBfgdG3CwRXugetfW6dohJApCxU9OONAiD81TEbSpAEouV7Pdl90hzlhs46RdDk6BW8BGrKwHwg5HTdEuZBq8gXtmZATMqOuC4gEiJMH9Odc5j9EJcdEE58VrdZBrttQZDZD'];
	$url=file_get_contents("https://graph.facebook.com/oauth/access_token?grant_type=fb_exchange_token&client_id=1788581694700829&client_secret=d95dde9374fe7d3715007c27db6a74a4&fb_exchange_token=CAAZAatKCQfR0BAEAh2e2fN72FIQ1BzKNE0x6TcbMqjQotvu3ESAN9rTmBH3GRwk7C2H9QguqdreBfgdG3CwRXugetfW6dohJApCxU9OONAiD81TEbSpAEouV7Pdl90hzlhs46RdDk6BW8BGrKwHwg5HTdEuZBq8gXtmZATMqOuC4gEiJMH9Odc5j9EJcdEE58VrdZBrttQZDZD");
	$token = file_get_contents($url);
	$fbinit="https://graph.facebook.com/1608260672741284/feed?fields=message,comments,likes&";
	$result = $fbinit . $token;
	$data = file_get_contents($result);
	file_put_contents("details.json",$data);
	print_r( json_decode($data, true) );
	echo $data

?> 