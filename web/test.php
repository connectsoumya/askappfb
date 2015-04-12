<?php


$json = file_get_contents('https://askappfb.herokuapp.com/details_test.json');
$json_o = json_decode($json);
$i=1;
$a=array();
$b=array();

if($json_o->data!=null)
{
foreach($json_o->data as $p)
{





{if(isset($p->message))

if(isset($p->comments))


{
$obj1=$p->comments->data;
echo "The message is  ";

echo $p->message.' ';
echo "The comments are   ";
foreach($obj1 as $p1)
{
	
	
	echo $p1->message.'=';
	echo $p1->like_count.'   ';
	$a[$i]=$p1->message;
	$b[$i]=$p1->like_count;
	$i++;
	

	
	
	
}
echo "The best answer is   ";
echo $a[array_search(max($b), $b)].'<br />';
}
}
}
}



?>