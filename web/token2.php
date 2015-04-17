<?php

$acc_tok_temp = file_get_contents("https://graph.facebook.com/oauth/access_token?grant_type=fb_exchange_token&client_id=1788581694700829&client_secret=d95dde9374fe7d3715007c27db6a74a4&fb_exchange_token=CAACEdEose0cBAKc18m3hWx3ukIrxQ0N3O4BXsHl4voh3uKvq2c6IPZCLqyhkyZAibTZC9qpBilXVAHPM9ewq2EmWtjllZCYZAgTZCQi0ZAI582MTSNmERZArlOUfIP4P0SZCmlRQVOrzwOeZAStREmAWe8OCrJWtPgXcZAJc1gJ4yXWQHoxOVZAwabcgDTDRL5i6J0RFm80WpqBLEwZDZD");
$code_url_1="https://graph.facebook.com/oauth/client_code?";
$code_url_2="&client_secret=d95dde9374fe7d3715007c27db6a74a4&redirect_uri=https://askappfb.herokuapp.com/&client_id=1788581694700829";
$code_url = $code_url_1 . $acc_tok_temp . $code_url_2;
$code_json = file_get_contents($code_url);
echo $code_json;
$p = json_decode($code_json);
$code1 = $p->code;
$acc_tok_1 = "https://graph.facebook.com/oauth/access_token?code=";
$acc_tok_2 = "&client_id=1788581694700829&redirect_uri=https://askappfb.herokuapp.com/";
$acc_tok_url = $acc_tok_1 . $code1 . $acc_tok_2;
$token_json = file_get_contents($acc_tok_url);
$q = json_decode($token_json);
$token=$q->access_token;

?>