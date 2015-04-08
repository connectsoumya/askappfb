

<?php  // Html safe containers

  $myOutput = <<<MYHTMLSAFEOUTPUT
<?xml version="1.0"?>
<html>
  <title>PHP Example</title>
  <body>
 <p> jjhjhjjhjhjhjhjhjhjhjhjhjhjh </p>
    <? php
echo "hi!";
$url = $_GET['https://graph.facebook.com/oauth/access_token?grant_type=fb_exchange_token&client_id=1788581694700829&client_secret=d95dde9374fe7d3715007c27db6a74a4&fb_exchange_token=CAAZAatKCQfR0BANDfu63WDp5q4ybS9GG5ZCAIjXt7BxVwbP3KIOSpDt4Qf5BTZAm8tIB5fiB5O8qa8IRNwkW7NopLEUw16nrSpNdLCgZClGWqQn2yma4tZBq7fj2ZAAbP9UYH835QZBgeIRRZBgS255l8n0ZCaqFixIO6ohKukWx5l92tm8OaAZBzeP6xZCLvUAZAt4ZD'];
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