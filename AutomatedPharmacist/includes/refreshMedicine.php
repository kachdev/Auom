<?php
    require_once('connect.php');
    $query = "SELECT * FROM t_medicine";

    $response = @mysqli_query($connect,$query);

    if ($response) {
        echo'<table id="mytable" border="1">
        <thead>
            <tr>
                <th>#<i class="fa fa-sort-up"></i></th>
                <th>S/N<i class="fa fa-sort-up"></i></th>
                <th>Medicine <br>Name <i class="fa fa-sort"></i></th>
                <th>Medicine <br> Category <i class="fa fa-sort"></i></th>
                <th>Description<i class="fa fa-sort"></i></th>
                <th>Price <i class="fa fa-sort"></i></th>
                <th>Manufacturing Company <i class = "fa fa-sort"></i></th>
                
                <th>Status <i class="fa fa-sort"></i></th>
                <th>Options<i class="fa fa-sort"></i></th>
            </tr>
        </thead>';

    while ($row = mysqli_fetch_array($response)) {
        echo '<tbody>';

        
        echo'<tr>';
        echo'<td>  <input type="checkbox" name="" id=""> </td>';
        echo '<td>'.$row['medicineID'].'</td>';
        echo
        '<td>'.$row['me_medicine_name'].'</td>'.
        '<td>'.$row['me_medicine_category'].'</td>'.
        '<td>'.$row['me_description'].'</td>'.
        '<td>'.$row['me_price'].'</td>'.
        '<td>'.$row['me_manufacturing_company'].'</td>'.
        '<td>'.$row['me_status'].'</td>';
        echo'<td>
                <div class = "table_btns">
                    <div class = "updatebtn" href="#">
                        <i class="fa fa-wrench"></i>
                    </div>    
                    <div class="delbtn" onClick="showDelete(\''.$row['me_medicine_name'].'\',\''.$row['medicineID'].'\')" href="">
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