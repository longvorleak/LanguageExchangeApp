<!-- comment -->
<?php


$lang = "English&5,Korean&3";
$proficiency = [];
$lang = explode("," ,$lang);
foreach($lang as $key){
    array_push($proficiency, explode("&",$key));
}


echo count($proficiency);
echo "<pre>";
print_r($proficiency);
echo "</pre>";echo $proficiency[0][1];