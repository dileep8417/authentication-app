<?php
    session_start();
    session_destroy();
?>
<script>
    localStorage.removeItem("GUVI user");
    setInterval(() => {
        location.href = "../index.php";
    }, 1000);
</script>