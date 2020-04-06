<?php
    if ($_SERVER["REQUEST_METHOD"]=="POST"){
        $num1=$_POST["obA"];
        $num2=$_POST["obB"];
        $operator=$_POST["operation"];
        include "condition.php";
        cal($operator,$num1,$num2);
    }
?>