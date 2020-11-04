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
        if(isset($_GET['n'])){
            $i=$_GET['n'];
        }else{
            $i=0;
        }
        echo $i;
            $sql = "SELECT * FROM ques_type where quetype='XML'limit $i,1";
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
                            echo "Question : ".htmlspecialchars($row['question']).  "<br>";
                            $sql = "SELECT ans FROM answer where ques_id='$q'";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                echo htmlspecialchars($row['ans'])."<br>";
                            }
                            } else {
                            echo "0 results";
                            }
                        }
                    } else {
                    echo "0 results";}
                }
            } else {
                echo "0 results";
            }
            echo '<a href="xml.php?n='.($i+1).'">Next</a>';
        $conn->close();
    }
    function QuestionPHP(){
        global $conn;
        if(isset($_GET['n'])){
            $i=$_GET['n'];
        }else{
            $i=0;
        }
        echo $i;
            $sql = "SELECT * FROM ques_type where quetype='PHP'limit $i,1";
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
                            echo "Question : ".htmlspecialchars($row['question']).  "<br>";
                            $sql = "SELECT ans FROM answer where ques_id='$q'";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                echo htmlspecialchars($row['ans'])."<br>";
                            }
                            } else {
                            echo "0 results";
                            }
                        }
                    } else {
                    echo "0 results";}
                }
            } else {
                echo "0 results";
            }
            echo '<a href="php.php?n='.($i+1).'">Next</a>';
        $conn->close();
    }
    function QuestionHTML(){
        global $conn;
        if(isset($_GET['n'])){
            $i=$_GET['n'];
        }else{
            $i=0;
        }
        echo $i;
            $sql = "SELECT * FROM ques_type where quetype='HTML'limit $i,1";
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
                            echo "Question : ".htmlspecialchars($row['question']).  "<br>";
                            $sql = "SELECT * FROM answer where ques_id='$q'";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                echo '<div class="answer"><input type="radio" name="answer" value="<?php echo $row["ans_id"];?>'.htmlspecialchars($row['ans']).'</div><br>';
                            }
                            } else {
                            echo "0 results";
                            }
                                                        
                        }
                    } else {
                    echo "0 results";}
                }
            } else {
                echo "0 results";
            }
            echo '<a href="html.php?n='.($i+1).'">Next</a>';
        $conn->close();
    }
    function AnswerXML(){
        //echo $call;
    }
?>