<?php

$string=file_get_contents("php://input");
error_log("GOT " . $string);
file_put_contents('tested.json', $string);

?>