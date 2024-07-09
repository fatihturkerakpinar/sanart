<?php
session_start();
header("Location: odev.php"); 
session_destroy();
exit();
?>
<script>
  window.onload = function() {
    document.getElementById("logoutButton").style.display = "none";
  }
</script>