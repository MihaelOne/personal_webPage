$(document).ready(function() {
  $(document).on('click', '.delete_product_btn', function(e) {
      e.preventDefault();

      var id = $(this).val();
      var deleteButton = $(this);
      swal({
          title: "Are you sure?",
          text: "Once deleted, you will not be able to recover",
          icon: "warning",
          buttons: true,
          dangerMode: true,
      })
      .then((willDelete) => {
          if (willDelete) {
              $.ajax({
                  method: "POST",
                  url: "code.php",
                  data: {
                      'product_id':id,
                      'delete_product_btn':true
                  },
                  success: function (response) {
                    console.log(response);
                      if(response == 200) {
                          swal("Uspiješno", "Proizvod je uspješno obrisan", "success");
                          deleteButton.closest('tr').remove();
                      }
                      else if(response == 500) {
                          swal("Greška", "Proizvod nije obrisan", "error");
                      }
                  }
              });
          }
      });
  });
  $(document).on('click', '.delete_category_btn', function(e) {
    e.preventDefault();

    var id = $(this).val();
    var deleteButton = $(this);
    swal({
        title: "Are you sure?",
        text: "Once deleted, you will not be able to recover",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            $.ajax({
                method: "POST",
                url: "code.php",
                data: {
                    'category_id':id,
                    'delete_category_btn':true
                },
                success: function (response) {
                  console.log(response);
                    if(response == 200) {
                        swal("Uspiješno", "Kategorija je uspješno obrisana", "success");
                        deleteButton.closest('tr').remove();
                    }
                    else if(response == 500) {
                        swal("Greška", "Kategorija nije obrisana", "error");
                    }
                }
            });
        }
    });
});
});
