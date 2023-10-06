<?php

    include("components/db.php");

    $sql = "SELECT * FROM user";
    $result = $con->query($sql);

    $count = 1;
    while($row = $result->fetch_assoc()){
        echo "<tr>
                <td scope='row' id='row$count'>$count</td>
                <td>$row[username]</td>
                <td>$row[password]</td>
                <td>";
                if($row['isActive'] == 1){
                    echo '<p><a href="status.php"></a>enable<p>';
                }
                else{
                    echo "disable";
                }
                    
                // </td>

                // </tr>
                $count++;


            }
            

            // <div class='btn-group' role='group' aria-label='Basic radio toggle button group'>
            //             <input type='radio' class='btn-check toggle' name='btnstatus$count' data-id = '$row[s_no]' id='btnstatus1$count' value='0' autocomplete='off' checked>
            //             <label class='btn btn-outline-primary' for='btnstatus1$count'>OFF</label>
                    
            //             <input type='radio' class='btn-check toggle' name='btnstatus$count' id='btnstatus2$count' data-id = '$row[s_no]' value='1' autocomplete='off'>
            //             <label class='btn btn-outline-primary' for='btnstatus2$count'>ON</label>
            //         </div>

?>