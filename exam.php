<?php
    include 'header1.php';
    session_start();
    echo '<h3>Welcome '.$_SESSION['user'].' Please click any exam link to proceed.</h3>';
?>
            <div class="nav">
                    <ul class="horizontal">
                        <li><a href="xml.php?v=XML">XML</a></li>
                        <li><a href="php.php?v=PHP">PHP</a></li>
                        <li><a href="html.php?v=HTML">HTML</a></li>   
                    </ul>
            </div>
        </div>
    </div>
</body>
</html>