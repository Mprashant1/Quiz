<?php
    include 'header1.php';
    include 'function.php';
    echo '<h3>Welcome '.$_SESSION['user'].' Please click any exam link to proceed.</h3>';
?>
            <div class="nav">
                    <ul class="horizontal">
                        <li class="active"><a href="php.php">PHP</a></li>
                    </ul>
            </div>
        </div>
        <div class="question">
            <p>
                <?php 
                    QuestionPHP();
                ?>
            </p>
        </div>
        <?php AnswerXML();?>
    </div>
</body>
</html>