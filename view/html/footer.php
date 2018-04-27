<footer class="py-5 bg-black">
  <div class="container">
    <p class="m-0 text-center text-white small">Copyright &copy; Zootopia 2018</p>
  </div>



<?php
if(isset($_SESSION['login'])){
?>
<p class="sessionID">
  <?php
    print_r($_SESSION);
  ?>
</p>

<?php
}
?>

  <!-- /.container -->
</footer>



</body>

</html>
