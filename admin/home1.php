<?php
    include 'header.php';
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add</title>
</head>
<body>
    <div class="div1">
        <form action="submit_html.php" class="form" method="post">
            <label for="question">Question     <input type="text" name="que" class="in"></label>
            <label for="question">Option 1      <input type="text" name="opt1" class="in"></label>
            <label for="question">Option 2      <input type="text" name="opt2" class="in"></label>
            <label for="question">Option 3      <input type="text" name="opt3" class="in"></label>
            <label for="question">Option 4      <input type="text" name="opt4" class="in"></label>
            <label for="question">Type of question<input type="text" name="type" class="int"></label>
            <label for="correct">Correct Option&nbsp&nbsp&nbsp<input type="text" name="opt5" class="int"></label>
            <input type="submit" value="Submit" name="submit" class="btn">
        </form>
    </div>
</body>
</html>
