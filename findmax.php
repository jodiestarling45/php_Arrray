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
$arr=array(
    [1,2,5,65,23,1,65,34,2],
    [4,1,67,443,2,64,68,76,43,23,41],
    [434,23,42,542,123,425,13]
);
$max=$arr[0][0];
for ($i = 0; $i < count($arr); $i++) {
    for ($j = 0; $j < count($arr[$i]); $j++) {
        if ($max < $arr[$i][$j]) {
            $max = $arr[$i][$j];
        }
    }
}
echo $max
?>
</body>
</html>
