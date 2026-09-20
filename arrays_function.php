<?php
    $F1 =array("Redbull","Mclaren","Mercedes","Ferrari","Alpine");
    array_push($F1,"Williams");
    array_push($F1,"Racing Bulls");
    array_pop($F1);
    array_shift($F1);
    //array_slice()
    $reverse =array_reverse($F1);
    foreach($F1 as $f1s){
        echo $f1s . "<br>";
    }
   
    echo("---Reversed order --- <br>");

    
    foreach($reverse as $f11s){
        echo $f11s . "<br>";

    }
    ?>


<?php
    
    $driver =array("Redbull"=>"MAX VERSTAPPEN",
                        "Mercedes"=>"kimi antonelli",
                            "Ferrari"=>"Lewis hamilton",
                                "Mclaren"=>"oscar piastri");

            echo("<br>");
         echo("The driver of Redbull is " . $driver["Redbull"] . "<br>");
         echo("The driver of Mercedes is " . $driver["Mercedes"] . "<br>");    
         echo("The driver of Ferrari is " . $driver["Ferrari"] . "<br>");
         echo("The driver of Mclaren is " . $driver["Mclaren"] . "<br>");                       
    ?>