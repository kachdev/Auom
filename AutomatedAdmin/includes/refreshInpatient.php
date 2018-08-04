<?php

    require_once('connect.php');
    $counter = 1;
    $query = "SELECT * FROM t_inpatient";

    $response = @mysqli_query($connect,$query);

    if ($response) {
        echo'<table id="mytable" border="1">
        <thead>
            <tr>
                <th>#<i class="fa fa-sort-up"></i></th>
                <th>S/N<i class="fa fa-sort-up"></i></th>
                <th>First Name <i class="fa fa-sort"></i></th>
                <th>Last Name<i class="fa fa-sort"></i></th>
                <th>Username<i class="fa fa-sort"></i></th>
                <th>Options<i class="fa fa-sort"></i></th>
            </tr>
        </thead>';

    while ($row = mysqli_fetch_array($response)) {
        echo '<tbody>';

        
        echo'<tr>';
        echo'<td>  <input type="checkbox" name="" id=""> </td>';
        echo '<td>'.$row['InpatientID'].'</td>';
        echo
        '<td>'.$row['inp_firstname'].'</td>'.
        '<td>'.$row['inp_lastname'].'</td>'.
        '<td>'.$row['inp_username'].'</td>';
        echo   '<td>
                    <div class = "table_btns">
                        <div class = "updatebtn" href="#">
                            <i class="fa fa-wrench"></i>
                        </div>    
                        <div class="delbtn" onClick="showDelete(\''.$row['inp_firstname'].' '.$row['inp_lastname'].'\',\''.$row['InpatientID'].'\')" href="">
                            <i class="fa fa-trash-o "></i>
                        </div>
                    </div>
                </td>';
        echo'</tr>';
        echo '</tbody>';
        $counter++;
    }
        
        echo "</table>";
    }
    else {
        echo "Error retrieving data";
        echo mysqli_error($connect);

    }
    mysqli_close($connect);
    

?>