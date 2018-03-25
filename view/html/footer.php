<footer class="py-5 bg-black">
  <div class="container">
    <p class="m-0 text-center text-white small">Copyright &copy; Zootopia 2018</p>
  </div>

<p id="sessionID">
  Session ID: <?php echo session_id()?>
</p>

<?php
if(isset($_SESSION['login'])){
?>

<p id="welcome_footer">
  Welcome <?php echo $_SESSION['firstname'];?>!
</p>

<?php
}
?>

  <!-- /.container -->
</footer>



</body>

</html>
