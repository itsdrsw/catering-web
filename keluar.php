<?php
    session_status();
    session_destroy();
    echo "<script>location='login.php'</script>";