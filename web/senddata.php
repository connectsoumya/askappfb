<?php

$myOutput = <<<MYHTMLSAFEOUTPUT

<!DOCTYPE html>
<html>
<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("button").click(function(){
        $.post("takedata.php",
        {
        id: "cb636a3efae"
        type: "ask",
        subtype:"question",
        sender:"def9317da",
        conversation:"636ae0fe2a93",
        language: "",
        securityToken:"e91736ae2a",
        content: "{ question:\"Which is the best Japanese Restaurant in Trento?\",
            timestamp: 1431417550371 }"
        },
        function(data,status){
            alert("Data: " + data + "\nStatus: " + status);
        });
    });
});
</script>

</head>
<body>

<button>Send an HTTP POST request to a page and get the result back</button>

</body>
</html>

MYHTMLSAFEOUTPUT;
echo $myOutput; 

?>