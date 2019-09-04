  $(document).ready(function() {
      $("#success-alert").fadeTo(2000, 500).slideUp(500, function() {
        $("#success-alert").slideUp(500);
      });
  });

  $(document).ready( function () {
    $('#table_id').DataTable();
} );