<?php
require_once('connect.php');   


$pa_name = $_POST['pname'];


$pa_id = '';




    if (isset($_POST['submit'])) {

        $dname = mysqli_real_escape_string($connect, $_POST['dname']);
        $pname = mysqli_real_escape_string($connect, $_POST['pname']);
        $case = mysqli_real_escape_string($connect, $_POST['case']);
        $med = mysqli_real_escape_string($connect, $_POST['med']);
        $phmed = mysqli_real_escape_string($connect, $_POST['phmed']);
        $desc = mysqli_real_escape_string($connect, $_POST['desc']);
        $dob = mysqli_real_escape_string($connect, $_POST['date']);

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

        if(empty($dname) && empty($pname) && empty($case) && empty($dob)){
            // header("Location:  ../manage_appointment.php?signup=empty values");
            // exit();
                  
        }
       
        else {

            $pname = implode(" ", $pname);

            
            //CHECK IF INPUT CHARACTERS ARE VALID
            if(!preg_match("/^[a-zA-Z*S]/", $case) || !preg_match("/^[a-zA-Z*S]/", $desc)){
                header("Location: ../manage_prescription.php?signup=invalid values");
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
                        

                            $sql = "INSERT INTO t_prescription (d_name, p_name, pre_case, pre_medication, pre_medpharmacist, pre_description, pre_date, InpatientID) 
                            VALUES('$dname', '$pname','$case','$med', '$phmed', '$desc', '$dob', '$pa_id');";
                       $query = mysqli_query($connect, $sql).mysqli_error($connect);
                        var_dump($sql);
                        if($query > 0){
                            header("Location: ../manage_prescription.php?signup=success");
                            exit();
                        }else{
                            echo "ERRRORRRRO";
                        }
                        
                        // header("Location: ../manage_prescription.php?signup=success");
                        // exit();
                    }
               
            }
        
        
    }else{
        header("Location: ../manage_prescription.php");
        exit();
    }

?>  