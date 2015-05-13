<?php

$id=$_POST["id"];
$type=$_POST["type"];
$subtype=$_POST["subtype"];
$sender=$_POST["sender"];
$con_id=$_POST["conversation"];
$lang=$_POST["language"];
$sec_token=$_POST["securityToken"];
$content=$_POST["content"];

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>

type="$type";
message="KoI near Piazza Mosna";
sender: "$sender";
conversation: "$con_id";
securityToken:  "$sec_token";
language:  "$lang";

$(document).ready(function(){
      $.post("http://smartsociety.u-hopper.com/message/",

        {  
         "type": type
         "subtype": "answer",
         "content": message,
         "sender": sender,
         "conversation": conversation,
         "language":  language,
         "securityToken":  securityToken
        },

      function(data){
          alert("Data: " + data);
        });
});
</script>

echo $type;
echo $sender;
echo $con_id;
echo $lang;
echo $sec_token;
echo $content;

?>

<!-- include 'index.php'; -->