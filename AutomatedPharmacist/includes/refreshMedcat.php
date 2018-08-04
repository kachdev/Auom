<?php
    require_once('connect.php');
    $query = "SELECT * FROM t_medicine_category";

    $response = @mysqli_query($connect,$query);

    if ($response) {
        echo'<table id="mytable" border="1">
        <thead>
            <tr>
                <th>#<i class="fa fa-sort-up"></i></th>
                <th>S/N<i class="fa fa-sort-up"></i></th>
                <th>Medicine Category Name <i class="fa fa-sort"></i></th>
                <th>Description<i class="fa fa-sort"></i></th>
                <th>Options<i class="fa fa-sort"></i></th>
            </tr>
        </thead>';

    while ($row = mysqli_fetch_array($response)) {
        echo '<tbody>';

        
        echo'<tr>';
        echo'<td>  <input type="checkbox" name="" id=""> </td>';
        echo '<td>'.$row['medicine_categoryID'].'</td>';
        echo
        '<td>'.$row['m_medicine_category_name'].'</td>'.
        '<td>'.$row['m_medicine_description'].'</td>';
        echo   '<td>
                    <div class = "table_btns">
                        <div class = "updatebtn" href="#">
                            <i class="fa fa-wrench"></i>
                        </div>    
                        <div class="delbtn" onClick="showDelete(\''.$row['m_medicine_category_name'].'\',\''.$row['medicine_categoryID'].'\')" href="">
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