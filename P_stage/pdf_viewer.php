<?php

$htmlContent = urldecode($_GET['pdf_content']);



?>
<div id="thediv" >
    <?php echo $htmlContent;?>

</div>
<script src="jquery/jquery-3.7.1.min.js" crossorigin="anonymous" ></script>

<script>
    $(document).ready(function () {
        $("#thediv").dblclick(function(){
            let thepdf = document.getElementById("thediv").contentWindow;
            
           window.print()
        })
    })

</script>