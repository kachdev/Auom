<?php
    require_once('connect.php');
    $query = "SELECT * FROM t_bedallotment";

    $response = @mysqli_query($connect,$query);

    if ($response) {
        echo'<table id="mytable" border="1">
        <thead>
            <tr>
                <th>#<i class="fa fa-sort-up"></i></th>
                <th>S/N<i class="fa fa-sort-up"></i></th>
                <th>Bed Number<i class="fa fa-sort"></i></th>
                <th>Bed Type<i class="fa fa-sort"></i></th>
                <th>Patient Name<i class="fa fa-sort"></i></th>
                <th>Allotment Date Time<i class="fa fa-sort"></i></th>
                <th>Discharge Date Time<i class="fa fa-sort"></i></th>
                <th>Options<i class="fa fa-sort"></i></th>
            </tr>
        </thead>';
        $counter =1;
    while ($row = mysqli_fetch_array($response)) {
        echo '<tbody>';

        
        echo'<tr>';
        echo'<td>  <input type="checkbox" name="" id=""> </td>';
        echo '<td>'.$counter.'</td>';
        echo
        '<td>'.$row['bed_bednumber'].'</td>'.
        '<td>'.$row['bed_bedtype'].'</td>'.
        '<td>'.$row ['inp_firstname'].' '.$row ['inp_lastname'].'</td>'.
        '<td>'.$row['bedall_allot_time'].'</td>'.
        '<td>'.$row['bedall_disch_time'].'</td>';
        echo'<td>
                <div class = "table_btns">
                    <div class = "updatebtn" href="#">
                        <i class="fa fa-wrench"></i>
                    </div>    
                    <div class="delbtn" onClick="showDelete(\''.$row['inp_firstname'].' '.$row['inp_lastname'].'\',\''.$row['bed_bedtype'].'\')" href="">
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