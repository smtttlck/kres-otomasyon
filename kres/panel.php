


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <meta charset="utf-8">



  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="style/style.css">
  <link rel="stylesheet" href="style/panel.css">

  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE = edge,chrome = 1">
  <title>Hello World using Backbone.js</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/js/jquery.dataTables.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.13/js/dataTables.bootstrap4.min.js"></script>



</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">Kreş Panel </div>
      <div class="list-group list-group-flush">
        <a href="#" id="ogretmen" class="list-group-item list-group-item-action bg-light">Öğretmenleri Yönet</a>
        <a href="#" id="ogrenci" class="list-group-item list-group-item-action bg-light">Öğrencileri Yönet</a>
        <a href="#" id="sinif" class="list-group-item list-group-item-action bg-light">Sınıfları Yönet</a>
        <a href="#" id="stok" class="list-group-item list-group-item-action bg-light">Stokları yönet</a>
      </div>
    </div>


    <div class="icerik">
      <div class="container" id="tablo">







      </div>
    </div>



    <script type="text/javascript">
      $(document).ready(function() {
        $('#example').DataTable({
          "language": {
            "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Turkish.json"
          }
        });
      });
    </script>
    <script>
      $(document).ready(function() {

        $("#ogretmen").click(function() {

          $.ajax({
            type: "POST",
            url: "php/ogretmen/show.php",

            success: function(data) {
              $("#tablo").empty().append(data);
              $('#example').DataTable({
                "language": {
                  "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Turkish.json"
                }
              });
              
              $("#example").DataTable().ajax.reload(null, false );
            },

          });
        });


        $("#ogrenci").click(function() {

          $.ajax({
            type: "POST",
            url: "php/ogrenci/show.php",

            success: function(data) {
              $("#tablo").empty().append(data);
              $('#example').DataTable({
                "language": {
                  "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Turkish.json"
                }
              });
              
              $("#example").DataTable().ajax.reload(null, false );
            },

          });
        });

        

        $("#sinif").click(function() {

          $.ajax({
            type: "POST",
            url: "php/sinif/show.php",

            success: function(data) {
              $("#tablo").empty().append(data);
              $('#example').DataTable({
                "language": {
                  "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Turkish.json"
                }
              });
              
              $("#example").DataTable().ajax.reload(null, false );
            },

          });
        });

        $("#stok").click(function() {

          $.ajax({
            type: "POST",
            url: "php/stok/show.php",

            success: function(data) {
              $("#tablo").empty().append(data);
              $('#example').DataTable({
                "language": {
                  "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Turkish.json"
                }
              });
              
              $("#example").DataTable().ajax.reload(null, false );
            },

          });
        });

      });
    </script>


  </div>





</body>

</html>