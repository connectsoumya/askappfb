

<?php  // Html safe containers

  $myOutput = <<<MYHTMLSAFEOUTPUT
<?xml version="1.0"?>
<html>
  <title>PHP Example</title>
  <body>
<? php
	$url = $_GET['https://graph.facebook.com/oauth/access_token?grant_type=fb_exchange_token&client_id=1788581694700829&client_secret=d95dde9374fe7d3715007c27db6a74a4&fb_exchange_token=CAACEdEose0cBAGA9omoAxZCcW7iy0ChfErDN4f5Izl4xrtmG01Tad6V8fRZAdPb4YqC4iRLuSdSio92BdFeyTI5U8B8rx5BmuUgBhll8wkoQFlfYKxLkr5FVIoPrPZCjINVaJzXDZAQsGwqsfmq4xHrr7LJKaH9blUtXTyPdhxc5FTubQcssxeO8sdhZBqMfno7uAix0ZCdwZDZD'];
	$token = file_get_contents($url);
	$fbinit="https://graph.facebook.com/1608260672741284/feed?fields=message,comments,likes&";
	$result = $fbinit . $token;
	$data = file_get_contents($result);
	file_put_contents("details.json",$data);
	print_r( json_decode($data, true) );
	echo $data
?>
  </body>
</html>
MYHTMLSAFEOUTPUT;

echo $myOutput;

?> 