<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="resources/css/first.css"> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>   
</head>
            <div class="header">
                <div class="title">
                    <h1>Admin Panel</h1>
                </div>
                <div class="nav">
                    <ul class="horizontal">
                        <li class="active"><a href="html.php">Add Questions</a></li>
                    </ul>
                </div>
            </div>
<script>
    $(document).ready(function(){
        $('.horizontal li ').click(function(){
            $('.horizontal li').removeClass('active');
            $(this).addClass('active');
        });
    });
</script>