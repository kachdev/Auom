<?php
    require_once('connect.php');
    // $counter = 1;
    $query = "SELECT * FROM t_doctor";

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
                <th>Department<i class="fa fa-sort"></i></th>
                <th>Options<i class="fa fa-sort"></i></th>
            </tr>
        </thead>';

    while ($row = mysqli_fetch_array($response)) {

        // $doc_ID=$row['DoctorID']; echo $doc_ID;
        echo '<tbody>';

        
        echo'<tr>';
        echo'<td>  <input type="checkbox" name="" id=""> </td>';
        echo '<td>'.$row['DoctorID'].'</td>';
        echo
        '<td>'.$row['d_firstname'].'</td>'.
        '<td>'.$row['d_lastname'].'</td>'.
        '<td>'.$row['d_username'].'</td>'.
        '<td>'.$row['d_department'].'</td>';
        echo   '<td>
                    <div class = "table_btns">
                        <div class = "updatebtn" href="#">
                            <i class="fa fa-wrench"></i>
                        </div>    
                        <div class="delbtn" onClick="showDelete(\''.$row['d_firstname'].' '.$row['d_lastname'].'\',\''.$row['DoctorID'].'\')" href="">
                            <i class="fa fa-trash-o "></i>
                        </div>
                    </div>
                </td>';
        echo'</tr>';
        echo '</tbody>';
        // $counter++;
    }
        
        echo "</table>";
    }
    else {
        echo "Error retrieving data";
        echo mysqli_error($connect);

    }
    mysqli_close($connect);
    

?>