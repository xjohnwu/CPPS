<?php
    session_start();
    include("include/header.php")
?>
    <body>
        <div id="wrap">
            <div id="title">
                <div id="logo">
                    <a href="index.php">
                        <img id="logo" src="images/huaju_logo-300x150.png" alt="HUA JU"/>
                    </a>
                </div>
                <div id="title_right">
                    <?php include("Users/mini_login.php")?>
                    <?php include("include/menu.php")?>
                </div>
            </div>
            <?php include("Properties/SearchEngine.php") ?>
            <div id="footer">
            	<div id="links">
                    <ul>
                        <li><a>CPPS主页</a></li>
                        <li><a>移民</a></li>
                        <li><a>工作</a></li>
                        <li><a>留学</a></li>
                        <li><a>海外置业</a></li>
                        <li><a>教育</a></li>
                        <li><a>联系我们</a></li>
                    </ul>
                </div>
                <div id="copyright">Copyright@ 2008-2011 cpps.org.uk</div>
            </div>
        </div>
    </body>
</html>