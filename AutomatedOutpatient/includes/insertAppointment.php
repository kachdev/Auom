<?php
require_once('connect.php');   
$ka=$_SESSION['doc_id']; 

$doc_name = $_POST['doc'];


$doc_id = '';
$patient_name = "";
$pa_id = $_SESSION['in_id'];
$first_name = $last_name = '';




    if (isset($_POST['insert-appointment'])) {

        $doc = mysqli_real_escape_string($connect, $_POST['doc']);
        $dept = mysqli_real_escape_string($connect, $_POST['dept']);
        $dob = mysqli_real_escape_string($connect, $_POST['date']);

        $doc = explode(" ", $doc);
        

        $doc_first = $doc[0];
        $doc_last = $doc[1];

        
        
        $count=mysqli_query($connect,"SELECT * FROM t_doctor WHERE d_firstname='$doc_first' AND d_lastname = '$doc_last'");
        $result=mysqli_affected_rows($connect);

        if($result>0)
        {
            while($row=mysqli_fetch_assoc($count))
            {
                $doc_id=$row['DoctorID'];
                
            }
            
        }

        if(empty($doc) && empty($patient) && empty($dob)){
            // header("Location:  ../manage_appointment.php?signup=empty values");
            // exit();
                  
        }
       
        else {

            $doc = implode(" ", $doc);

            
            //CHECK IF INPUT CHARACTERS ARE VALID
            if(!preg_match("/^[a-zA-Z*S]/", $doc) || !preg_match("/^[a-zA-Z*S]/", $dept)){
                header("Location: ../manage_appointment.php?signup=invalid values");
                exit();
            }
                else {
                        //INSERTING USER INTO THE DATABASE   
                        $sql2 = "SELECT * FROM t_inpatient WHERE InpatientID = '$pa_id'";
                        $query2 = mysqli_query($connect, $sql2);
                        $result =  mysqli_affected_rows($connect);

                        if($result > 0){
                            while ($row = mysqli_fetch_assoc($query2)) {
                                  $first_name = $row['inp_firstname'];
                                  $last_name = $row['inp_lastname'];
                                  
                                  
                            }

                            $patient_name = $first_name.' '.$last_name;
                            
                          
                            
                        }
                        

                            $sql = "INSERT INTO t_appointment (d_name, d_dept,inp_name, ap_date, DoctorID, InpatientID) 
                            VALUES('$doc', '$dept','$patient_name','$dob', $doc_id, $pa_id) ";
                       $query = mysqli_query($connect, $sql).mysqli_error($connect);
                        var_dump($sql);
                        var_dump($query);
                        if($query > 0){
                            header("Location: ../manage_appointment.php?signup=success");
                            exit();
                        }else{
                            echo "ERRRORRRRO";
                        }
                        
                        // header("Location: ../manage_appointment.php?signup=success");
                        // exit();
                    }
               
            }
        
        
    }else{
        header("Location: ../manage_appointment.php");
        exit();
    }

?>  