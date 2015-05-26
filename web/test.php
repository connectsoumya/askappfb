<?php

$string=file_get_contents("php://input");
file_put_contents('tested.json', $string);

?>