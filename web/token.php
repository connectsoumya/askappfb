<?php  

require 'phpsdk4/autoload.php';
 
use Facebook\FacebookSession;
use Facebook\FacebookRequest;
use Facebook\GraphNodes\GraphUser;
use Facebook\FacebookRequestException;
 
FacebookSession::setDefaultApplication('APP-ID', 'APP-SECRET');
$session = new FacebookSession($_GET['access_token']);
 
try {
  $me = (new FacebookRequest(
    $session, 'GET', '/me'
  ))->execute()->getGraphObject(GraphUser::className());
  echo $me->getName();
} catch (FacebookRequestException $e) {
  // The Graph API returned an error
}

$scope = array('manage_pages, read_stream');
$helper = new FacebookRedirectLoginHelper('https://www.mydomain.com/after_login.php');
$loginUrl = $helper->getLoginUrl($scope);
echo '<a href="' . $loginUrl . '">Login</a>';

try {
    $session = $helper->getSessionFromRedirect();
} catch(FacebookRequestException $ex) {
    // When Facebook returns an error
}
if ($session) {
    try {
        $user_profile = (new FacebookRequest(
            $session, 'GET', '/me'
        ))->execute()->getGraphObject(GraphUser::className());
        echo "Name: " . $user_profile->getName();
    } catch(FacebookRequestException $e) {
        echo "Exception occured, code: " . $e->getCode();
        echo " with message: " . $e->getMessage();
    }
}

$request = new FacebookRequest($session, 'GET', '/PAGE-ID?fields=access_token');
$response = $request->execute();
$result = $response->getGraphObject()->asArray();
$pageToken = $result['access_token'];
$facebookSession = new FacebookSession($pageToken);
$facebookSession->getLongLivedSession();
$request = new FacebookRequest($session, 'GET', '/PAGE-ID?fields=access_token');

echo $request;

?>