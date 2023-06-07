<?php
session_start();

unset($_SESSION["email"]);
unset($_SESSION["user_id"]);

echo "<script>
  alert('Logging you out. Please wait...');
  setTimeout(function(){
    window.location.href = '../index.php';
  }, 1000);
  setTimeout(function(){
    window.location.href = '../index.php';
  }, 3000); // Additional fallback redirect after 6 seconds
</script>";
?>
