<?php
    include 'admin/config.php';
    session_start();
    function User(){
        global $conn;
        if(isset($_POST['login'])){
            $user=$_POST['username'];
            $pass=$_POST['password'];
            $sql = "SELECT * FROM users";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                 if($row['username']===$user && $row['password']===$pass){
                    $_SESSION['user']=$row['username'];
                    header('Location: exam.php');
                 }else{
                    echo "Username does not exist!! Please click the link to register <a href='home.php'>Home Page</a>"; 
                 }
            }
            } else {
            echo "Data Fields Empty!! Please click the link to register <a href='home.php'>Home Page</a>"; 
            }
            $conn->close();
        }    
    }

    function RegisterUser(){
        global $conn;
        if(isset($_POST['register'])){
            $user=$_POST['username'];
            $pass=$_POST['password'];
            $email=$_POST['email'];
            $sql = "SELECT * FROM users where username='$user' and email='$email'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                echo "Username Exists Already!!!";
            } else {
                $sql = "INSERT INTO users (username, `password`, email)
                VALUES ('$user', '$pass', '$email')";

                if ($conn->query($sql) === TRUE) {
                echo "New record created successfully";
                } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
                }            
            }
            $conn->close();
        }    
    }
    function QuestionXML(){
        global $conn;
        if(isset($_GET['v'])){
            $value=$_GET['v'];
        }else{
            $value=" ";
        }
        $sql = "SELECT * FROM ques_type where quetype='$value'limit $offset,1";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $q=$row['quetion_id'];
            $sq = "SELECT question FROM questions where que_id='$q'";
            $res = $conn->query($sq);

            if ($res->num_rows > 0) {
            // output data of each row
            while($row = $res->fetch_assoc()) {
                echo "Question : ".$row['question'].  "<br>";
            }
            } else {
            echo "0 results";
            }
        }
        } else {
        echo "0 results";
        }
        $conn->close();
        return $value;
    }
    function AnswerXML($call){
        echo $call;
    }
?>