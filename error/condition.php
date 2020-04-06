<?php
function cal($operation, $number1, $number2)
{
    try {
        switch ($operation) {
            case "+":
                echo $number1 + $number2;
                break;
            case  "-":
                echo $number1 - $number2;
                throw new Exception($number2>$number1);
                echo "number bigger than a";
                break;
            case  "*":
                echo $number1 * $number2;
                break;
            case "/":
                echo $number1 / $number2;
                throw new Exception($number2===0);
                echo "not avalible";
                break;
        }


    }catch (Exception $exception){
        echo "error".$exception->getMessage();
    }

}

?>
