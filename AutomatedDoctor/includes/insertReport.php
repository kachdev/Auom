<?php
require_once('connect.php');   


$pa_name = $_POST['pname'];


$pa_id = '';




    if (isset($_POST['submit'])) {

        $type = mysqli_real_escape_string($connect, $_POST['type']);
        $desc = mysqli_real_escape_string($connect, $_POST['desc']);
        $date = mysqli_real_escape_string($connect, $_POST['date']);
        $doc = mysqli_real_escape_string($connect, $_POST['doc']);
        $pname = mysqli_real_escape_string($connect, $_POST['pname']);;

        $pname = explode(" ",$pname);
        
        

        $p_first = $pname[0];
        $p_last = $pname[1];

        
        
        $count=mysqli_query($connect,"SELECT * FROM t_inpatient WHERE inp_firstname='$p_first' AND inp_lastname = '$p_last'");
        $result=mysqli_affected_rows($connect);

        if($result>0)
        {
            while($row=mysqli_fetch_assoc($count))
            {
                $pa_id=$row['InpatientID'];
                
            }
            
        }

        if(empty($type) && empty($pname) && empty($desc) && empty($doc)){
            // header("Location:  ../manage_appointment.php?signup=empty values");
            // exit();
                  
        }
       
        else {

            $pname = implode(" ", $pname);

            
            //CHECK IF INPUT CHARACTERS ARE VALID
            if(!preg_match("/^[a-zA-Z*S]/", $doc) || !preg_match("/^[a-zA-Z*S]/", $desc)){
                header("Location: ../manage_report.php?signup=invalid values");
                exit();

                // echo $case;
                // die();
            }
                else {
                        //INSERTING USER INTO THE DATABASE   
                        $sql2 = "SELECT * FROM t_inpatient WHERE InpatientID = '$pa_id'";
                        // echo $sql2;
                        // die();
                        
                        $query2 = mysqli_query($connect, $sql2);
                        $result =  mysqli_affected_rows($connect);

                        if($result > 0){
                            while ($row = mysqli_fetch_assoc($query2)) {
                                  $first_name = $row['inp_firstname'];
                                  $last_name = $row['inp_lastname'];
                                  
                                  
                            }

                            
                          
                            
                        }
                        

                            $sql = "INSERT INTO t_report (r_type, r_description, r_date, d_name, p_name, InpatientID) 
                            VALUES('$type', '$desc','$date','$doc', '$pname', '$pa_id');";
                       $query = mysqli_query($connect, $sql).mysqli_error($connect);
                        // var_dump($sql);
                        // var_dump($query);
                        if($query > 0){
                            header("Location: ../manage_report.php?signup=success");
                            exit();
                        }else{
                            echo "ERRRORRRRO";
                        }
                        
                        // header("Location: ../manage_report.php?signup=success");
                        // exit();
                    }
               
            }
        
        
    }else{
        header("Location: ../manage_report.php");
        exit();
    }

?>  