<?php
    require_once('connect.php');
    $query = "SELECT * FROM t_department";

    $response = @mysqli_query($connect,$query);

    if ($response) {
        echo'<table id="mytable" border="1">
        <thead>
            <tr>
                <th>#<i class="fa fa-sort-up"></i></th>
                <th>S/N<i class="fa fa-sort-up"></i></th>
                <th>Department <i class="fa fa-sort"></i></th>
                <th>Description<i class="fa fa-sort"></i></th>
                <th>Options<i class="fa fa-sort"></i></th>
            </tr>
        </thead>';

    while ($row = mysqli_fetch_array($response)) {
        echo '<tbody>';

        
        echo'<tr>';
        echo'<td>  <input type="checkbox" name="" id=""> </td>';
        echo '<td>'.$row['DepartmentID'].'</td>';
        echo
        '<td>'.$row['dep_name'].'</td>'.
        '<td>'.$row['dep_description'].'</td>';
        echo   '<td>
                    <div class = "table_btns">
                        <div class = "updatebtn" href="#">
                            <i class="fa fa-wrench"></i>
                        </div>    
                        <div class="delbtn" onClick="showDelete(\''.$row['dep_name'].' '.$row['dep_description'].'\',\''.$row['DepartmentID'].'\')" href="">
                            <i class="fa fa-trash-o "></i>
                        </div>
                    </div>
                </td>';
        echo'</tr>';
        echo '</tbody>';
    }
        
        echo "</table>";
    }
    else {
        echo "Error retrieving data";
        echo mysqli_error($connect);

    }
    mysqli_close($connect);
    

?>