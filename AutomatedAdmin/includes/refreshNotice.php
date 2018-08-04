<?php
    require_once('connect.php');
    $query = "SELECT * FROM t_noticeboard";

    $response = @mysqli_query($connect,$query);

    if ($response) {
        echo'<table id="mytable" border="1">
        <thead>
            <tr>
                <th>#<i class="fa fa-sort-up"></i></th>
                <th>S/N<i class="fa fa-sort-up"></i></th>
                <th>Title <i class="fa fa-sort"></i></th>
                <th>Notice<i class="fa fa-sort"></i></th>
                <th>Date<i class="fa fa-sort"></i></th>
                <th>Options<i class="fa fa-sort"></i></th>
            </tr>
        </thead>';

    while ($row = mysqli_fetch_array($response)) {
        echo '<tbody>';

        
        echo'<tr>';
        echo'<td>  <input type="checkbox" name="" id=""> </td>';
        echo '<td>'.$row['NoticeboardID'].'</td>';
        echo
        '<td>'.$row['no_title'].'</td>'.
        '<td>'.$row['no_notice'].'</td>'.
        '<td>'.$row['no_date'].'</td>';
        echo   '<td>
                    <div class = "table_btns">
                        <div class = "updatebtn" href="#">
                            <i class="fa fa-wrench"></i>
                        </div>    
                        <div class="delbtn" onClick="showDelete(\''.$row['no_title'].' '.$row['no_notice'].'\',\''.$row['NoticeboardID'].'\')" href="">
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