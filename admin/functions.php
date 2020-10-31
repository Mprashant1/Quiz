<?php
    include 'config.php';
    function FetchQuestion(){
        global $conn;
        if(isset($_POST['submit'])){
            $que=$_POST['que'];
            $sql = "SELECT * FROM questions where question='$que'";
            $output = $conn->query($sql);
            if ($output->num_rows > 0) {
                echo("Question exists already!!!");
            }else {
                    $in = "INSERT INTO questions (question)
                    VALUES ('$que')";
                    if ($conn->query($in) === TRUE) {
                    echo "New record created successfully";
                    } else {
                    echo "Error: " . $in . "<br>" . $conn->error;
                    }   
                }           
        }       
    }
    function AddAnswer(){
        global $conn;
        if(isset($_POST['submit'])){
            $que=$_POST['que'];
            $option=array();
            $option[0]=$_POST['opt1'];
            $option[1]=$_POST['opt2'];
            $option[2]=$_POST['opt3'];
            $option[3]=$_POST['opt4']; 
            foreach ($option as $key => $value) {
                $sql = "SELECT * FROM answer where ans='$value'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    echo("Answer exists already!!!");
                }else{
                    $sq = "INSERT INTO answer (ans,ques_id)
                    VALUES ('$value',(SELECT que_id from questions where question='$que'))";

                    if ($conn->query($sq) === TRUE) {
                    echo "New record created successfully";
                    } else {
                    echo "Error: " . $sq . "<br>" . $conn->error;
                    }   
                }
            }    
        } 
    }
    function CorrectAnswer(){
        global $conn;
        if(isset($_POST['submit'])){
            $que=$_POST['que'];
            $correct=$_POST['opt5'];
            $sql = "SELECT * FROM correct where anss_id=(SELECT ans_id from answer where ans='$correct')";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    echo("Option exists already!!!");
                }else{
                    $insert = "INSERT INTO correct (anss_id,quest_id)
                    VALUES ((SELECT ans_id from answer where ans='$correct'),(SELECT que_id from questions where question='$que'))";
                    if ($conn->query($insert) === TRUE) {
                    echo "New record created successfully";
                    } else {
                    echo "Error: " . $insert . "<br>" . $conn->error;
                    }   
                }             
        }
        
    }
    function QuestionType(){
        global $conn;
        if(isset($_POST['submit'])){
            $que=$_POST['que'];
            $que_type=$_POST['type'];
            $sql = "SELECT * FROM ques_type where quetion_id=(SELECT que_id from questions where question='$que')";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                echo("Type with this question exists already!!!");
            }else{
                $in = "INSERT INTO ques_type (quetype,quetion_id)
                VALUES ('$que_type',(SELECT que_id from questions where question='$que'))";
                if ($conn->query($in) === TRUE) {
                    echo "New record created successfully";
                } else {
                     echo "Error: " . $in . "<br>" . $conn->error;
                } 
            }
           
        $conn->close();              
        }       
    }
    
?>