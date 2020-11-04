<?php
    include 'header1.php';
    include 'admin/config.php';
    if(isset($_POST['submit'])){
        $ans=$_POST['answer'];
        $que=$_POST['question'];
        $next=$_POST['next'];
        echo $next;
        
        $sql = "SELECT * FROM correct where quest_id='$que'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
           if($row['anss_id']===$ans){
               header('Location:html.php?n='.$next+1);
           }else{
               echo "Your choice is wrong";
           }
        }
        } else {
        echo "0 results";
        }
        $conn->close();
        
    }
?>