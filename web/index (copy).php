<?php

require('../vendor/autoload.php');

$app = new Silex\Application();
$app['debug'] = true;

// Register the monolog logging service
$app->register(new Silex\Provider\MonologServiceProvider(), array(
  'monolog.logfile' => 'php://stderr',
));

// Our web handlers

$app->post('/', function() use($app) {
  $app['monolog']->addDebug('logging output.');
  return 'Hello, help me to make this app';
  echo file_get_contents("index.html");
});

$app->run();

?>
<html>
 <head>
  <title>PHP Test</title>
 </head>
 <body>

<?php

require('../vendor/autoload.php');

$app = new Silex\Application();
$app['debug'] = true;

// Register the monolog logging service
$app->register(new Silex\Provider\MonologServiceProvider(), array(
  'monolog.logfile' => 'php://stderr',
));

// Our web handlers

$app->post('/', function() use($app) {
  $app['monolog']->addDebug('logging output.');
  return 'Hello, help me to make this app';
  echo file_get_contents("index.html");
});

$app->run();


 </body>
</html>