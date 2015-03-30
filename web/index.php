<?php

$myOutput = <<<MYHTMLSAFEOUTPUT
<?xml version="1.0"?>
<html>
  <title>PHP Example</title>
  <body>
    <p>...all sorts goes here...</p>
  </body>
</html>
MYHTMLSAFEOUTPUT;

echo $myOutput; 

// require('../vendor/autoload.php');

// $app = new Silex\Application();
// $app['debug'] = true;

// // Register the monolog logging service
// $app->register(new Silex\Provider\MonologServiceProvider(), array(
//   'monolog.logfile' => 'php://stderr',
// ));

// // Our web handlers

// $app->post('/', function() use($app) {
//   $app['monolog']->addDebug('logging output.');
//   return 'Hello, help me to make this app';
  
// });

// $app->run();


//  </body>
// </html>

?>