<?php
require_once('connect.php');  

$pa_name = $_POST['pname'];

$pa_id = '';


    if (isset($_POST['insert-bedallot'])) {

         $bedno = mysqli_real_escape_string($connect, $_POST['bedno']);
         $bedtype = mysqli_real_escape_string($connect, $_POST['bedtype']);
         $pname = mysqli_real_escape_string($connect, $_POST['pname']);
         $allotime = mysqli_real_escape_string($connect, $_POST['allotime']);
         $dischtime = mysqli_real_escape_string($connect, $_POST['dischtime']);

        $pname = explode(" ",$pname);

        $p_first = $pname[0];
        $p_last = $pname[1];


        $count=mysqli_query($connect,"SELECT * FROM t_inpatient WHERE inp_firstname ='$p_first' AND inp_lastname = '$p_last'");
        $result=mysqli_affected_rows($connect);
        
        if($result>0)
        {
            while($row=mysqli_fetch_assoc($count))
            {
                $pa_id=$row['InpatientID'];
                
            }
            
        }
        // var_dump($pname);
        // die();
     

        if(empty($bedno) || empty($bedtype) || empty($pname) || empty($allotime) || empty($dischtime)){
            // header("Location:  ../manage_bed_allotment.php?signup=empty values");
            // exit();
        }

        

        else {

            $pname = implode(" ", $pname);
            //CHECK IF INPUT CHARACTERS ARE VALID
            if(!preg_match("/^[a-zA-Z*S]/", $pname) || !preg_match("/^[a-zA-Z*S]/", $bedtype)){
                header("Location: ../manage_bed_allotment.php?signup=invalid values");
                exit();
            }

            else {

                    $sql2 = "SELECT * FROM t_inpatient WHERE InpatientID = '$pa_id'";
                    $query2 = mysqli_query($connect, $sql2);
                    $result =  mysqli_affected_rows($connect);

                    if($result > 0){
                        while ($row = mysqli_fetch_assoc($query2)) {
                            $first_name = $row['inp_firstname'];
                            $last_name = $row['inp_lastname'];
                            
                        }
                    
                    
                    //INSERTING USER INTO THE DATABASE
                    
                    $sql = "INSERT INTO t_bedallotment (bed_bednumber, bed_bedtype, inp_name, bedall_allot_time, bedall_disch_time, InpatientID)
                     VALUES('$bedno', '$bedtype', '$pname', '$allotime', '$dischtime', '$pa_id');";

                    $query = mysqli_query($connect, $sql);
                    // var_dump($sql);
                    // var_dump($query);
                    // die();
                    // echo $pa_id;
                    // die();
                    header("Location: ../manage_bed_allotment.php?signup=success");
                    exit();
                }
            
            } 
     }
    }else{
        header("Location: ../manage_bed_allotment.php");
        exit();
    }

?>  