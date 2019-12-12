
<script src="<?= base_url(). 'libraryapp/public/vendor/jquery/jquery.min.js' ?>"></script>
<script src="<?= base_url(). 'libraryapp/public/vendor/bootstrap/js/bootstrap.bundle.min.js' ?>"></script>
<script>
  $(document).ready(function() {
    $('#borrowed-book-status').on('change',function(){
      var status = $(this).val();
      if(status == 'returned'){
        $('#borrowed-book-fines').val(0);
      }
    });
  });    
</script>
</body>
</html>