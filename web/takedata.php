<?php include 'index.php';


$type=$_POST["type"];
$sender=$_POST["sender"]
$con_id=$_POST["conversation"];
$lang=$_POST["language"]
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
echo $message;
echo $sender;
echo $conversation;
echo $language;
echo $securityToken;


?>