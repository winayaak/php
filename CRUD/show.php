<?php

    include "db.php";
    $result=$conn->query("select * from emp");

    ?>
    <table style="border: 1px solid black;">
        <tr>
            <td style="border: 1px solid black;">id</td>
            <td style="border: 1px solid black;">username</td>
            <td style="border: 1px solid black;">email</td>
            <td style="border: 1px solid black;">age</td>
            <td style="border: 1px solid black;">address</td>
        </tr>
        <?php
        while($row=$result->fetch_assoc()){
            ?>
            <tr>
                <td><?php echo $row["id"]?></td>
                <td><?php echo $row["username"]?></td>
                <td><?php echo $row["email"]?></td>
                <td><?php echo $row["age"]?></td>
                <td><?php echo $row["address"]?></td>
            </tr>
            <?php
        }
        ?>
    </table>
