<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
function find_minValue($arr){
    for ($i=0;$i<count($arr)-1;$i++){
        $object=$arr[$i];
        for ($j=1;$j<count($arr);$j++){
            if ($object > $arr[$j]){
                $object=$arr[$j];
            }
        }
    }echo $object;
}
$array = array(15,23,65,34,12,65,34,65,23,87,98,12,54,1,54,23);
find_minValue($array);
?>
</body>
</html>
