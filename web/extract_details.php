<?php
$data = file_get_contents("https://graph.facebook.com/1608260672741284/feed?fields=message,comments,likes&access_token=CAAZAatKCQfR0BAO8JaBcFJXRns5whf4CyNhjA6EJ1tWwUSPOTLB99XldBMwXJOXpAsIIvHOjhkKMnuo4dpkNJMZBgvZBkEHqK3EIReb3vJoyavKYZBBxG5OuddAwo48jTo6HF0ieSX3XEzrZAqGSRLemMJxtV2SNYCoGfvR6UmmmZCoNanU6rf1YjZCH0vv3dBwixAyFR5lsAZDZD");
file_put_contents("details.json",$data);
print_r( json_decode($data, true) );
?>