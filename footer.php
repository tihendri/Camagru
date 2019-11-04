<?php
  if ($_GET[err]){echo "<script>alert(\"".htmlentities($_GET[err])."\");window.location.href = \"profile.php\";</script>";}
  include_once "header.php";
?>
    <head>
 <style type ="text/css" >
   .footer{ 
       position: fixed;     
       text-align: center;    
       bottom: 0px; 
       width: 100%;
   }  
</style>
</head>
<body>
    <div class="footer">&copy tihendri All Rights Reserved</div>
</body>