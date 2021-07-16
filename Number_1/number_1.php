<?php

for($i = 1; $i <= 9; $i++){
    for($j = 9 - $i; $j > 0; $j--){
        echo "&nbsp;&nbsp;";
        // echo "*";
    }

    for($j = 0;$j < $i; $j++){
        echo "&nbsp;".$i."&nbsp;";
    }

    echo "<br>";
}