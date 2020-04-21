


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

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

  <script src="https://kit.fontawesome.com/de1126d062.js" crossorigin="anonymous"></script>




  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css" rel="stylesheet">
  <link href="https://cdn.datatables.net/1.10.16/css/dataTables.bootstrap4.min.css" rel="stylesheet">


  <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.16/js/dataTables.bootstrap4.min.js"></script>


  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/css/bootstrap-select.min.css">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/bootstrap-select.min.js"></script>

  <!-- (Optional) Latest compiled and minified JavaScript translation files -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.9/dist/js/i18n/defaults-*.min.js"></script>

  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker.standalone.min.css" rel="stylesheet" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.min.js"></script>



</head>

<body>

  <div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="bg-light border-right" id="sidebar-wrapper">
      <div class="sidebar-heading">Kreş Panel </div>
      <div class="list-group list-group-flush">
        <a href="#" id="calisan" class="list-group-item list-group-item-action bg-light">Çalışanları Yönet</a>
        <a href="#" id="ogrenci" class="list-group-item list-group-item-action bg-light">Öğrencileri Yönet</a>
        <a href="#" id="sinif" class="list-group-item list-group-item-action bg-light">Sınıfları Yönet</a>
        <a href="#" id="kategori" class="list-group-item list-group-item-action bg-light">Kategorileri yönet</a>
        <a href="#" id="stok" class="list-group-item list-group-item-action bg-light">Stokları yönet</a>
        <a href="#" id="kirtasiye" class="list-group-item list-group-item-action bg-light">Kırtasiyeyi yönet</a>
      </div>
    </div>


    <div class="icerik">
      <div class="container" id="tablo">







      </div>

      
      <div class="alert alert-success alert-dismissible fade" id="alertsucces" style="  position:fixed; 
    top: 0px; 
    left: 240px; 
    width: 100%;
    z-index: 9999; 
    border-radius:0px" role="alert">

      <div id="succes"></div>

      <button type="button" class="close" data-dismiss="alert" style="right: 240px" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>

    <div class="alert alert-danger alert-dismissible fade" id="alertdanger" style="  position:fixed; 
    top: 0px; 
    left: 240px; 
    width: 100%;
    z-index: 9999; 
    border-radius:0px" role="alert">

      <div id="danger"></div>



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

    function succes($mesaj) {
        $("#succes").empty().append($mesaj);
        $("#alertsucces").addClass("show");
        $("#alertsucces").fadeTo(2000, 500).slideUp(500, function() {
          $("#alertsuccest").slideUp(500);
        });
      }

      function error($mesaj) {
        $("#danger").empty().append($mesaj);
        $("#alertdanger").addClass("show");
        $("#alertdanger").fadeTo(2000, 500).slideUp(500, function() {
          $("#alertdanger").slideUp(500);
        });
      }
      $(document).ready(function() {

        $("#calisan").click(function() {  

          $.ajax({
            type: "POST",
            url: "php/calisanlar/fetch.php",
            data: {
              islem: '1'
            },
            success: function(data) {

              $("#tablo").empty().append(data);
              $('#example').DataTable({
                "language": {
                  "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Turkish.json"
                }
              });



            },

          });
        });


        $("#ogrenci").click(function() {  

          $.ajax({
            type: "POST",
            url: "php/ogrenci/fetch.php",
            data: {
              islem: '1'
            },
            success: function(data) {

              $("#tablo").empty().append(data);
              $('#example').DataTable({
                "language": {
                  "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Turkish.json"
                }
              });



            },

          });
        });


        $("#sinif").click(function() {  

          $.ajax({
            type: "POST",
            url: "php/sinif/fetch.php",
            data: {
              islem: '1'
            },
            success: function(data) {

              $("#tablo").empty().append(data);
              $('#example').DataTable({
                "language": {
                  "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Turkish.json"
                }
              });



            },

          });
        });


         $("#kategori").click(function() {  

          $.ajax({
            type: "POST",
            url: "php/kategori/fetch.php",
            data: {
              islem: '1'
            },
            success: function(data) {

              $("#tablo").empty().append(data);
              $('#example').DataTable({
                "language": {
                  "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Turkish.json"
                }
              });



            },

          });
        });

        $("#stok").click(function() {  

          $.ajax({
            type: "POST",
            url: "php/stok/fetch.php",
            data: {
              islem: '1'
            },
            success: function(data) {

              $("#tablo").empty().append(data);
              $('#example').DataTable({
                "language": {
                  "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Turkish.json"
                }
              });



            },

          });
        });

        $("#kirtasiye").click(function() {  

          $.ajax({
            type: "POST",
            url: "php/kirtasiye/fetch.php",
            data: {
              islem: '1'
            },
            success: function(data) {

              $("#tablo").empty().append(data);
              $('#example').DataTable({
                "language": {
                  "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Turkish.json"
                }
              });



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

      });

      $(document).on('click', '#deleteogr', function() {           
        var deger = $(this).val();

        $.ajax({
          type: 'POST',
          url: 'php/ogrenci/fetch.php',
          data: {
            islem: 2,
            id: deger
          },
          success: function(data) {
            var $response = $(data);

            var hata = $response.filter('#hatakodu').val();

            if (hata == 'silindi') {
              succes("Veri başarıyla silindi.");
            } else if (hata == 'guncellenemedi') {
              error("Veri silinemedi.");
            }




            $('#tablo').empty().append(data);
            $('#example').DataTable({
              'language': {
                'url': '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Turkish.json'
              }
            });


          },

        });

      });

      $(document).on('click', '#ogrupdate', function() {         




        var $isim = $(this).closest("tr").find(".ogradi").text();
        $('#ogradi').val($isim);

        var $sinifid = $(this).closest("tr").find(".sinifid").text();
        $('#sinifid').val($sinifid);

        var $yas = $(this).closest("tr").find(".yas").text();
        $('#yas').val($yas);

        var $cinsiyeti = $(this).closest("tr").find(".cinsiyeti").text();
        $('#cinsiyeti').val($cinsiyeti);

        var $adresi = $(this).closest("tr").find(".adresi").text();
        $('#adresi').val($adresi);
        
        var $veliadi = $(this).closest("tr").find(".veliadi").text();
        $('#veliadi').val($veliadi);

        var $velino = $(this).closest("tr").find(".velino").text();
        $('#velino').val($velino);
        
        
        $('#updateid').val($(this).val());


      });

      $(document).on('click', '.ogrupdate', function() {             
        
        
        var id2 = $('#updateid').val(); 
        var ogradi2 = $('#ogradi').val();
        var sinifid2 = $('#sinifid').val();
        var yas2 = $('#yas').val();
        var cinsiyeti2 = $('#cinsiyeti').val();
        var adresi2 = $('#adresi').val();
        var veliadi2 = $('#veliadi').val();
        var velino2 = $('#velino').val();


        $.ajax({
          type: 'POST',
          url: 'php/ogrenci/fetch.php',
          data: {
            islem: 4,
            id2 : id2,
            ogradi2 : ogradi2,
            sinifid2 : sinifid2,
            yas2 : yas2,
            cinsiyeti2 : cinsiyeti2,
            adresi2 : adresi2,
            veliadi2 : veliadi2,
            velino2 : velino2
          },
          success: function(data) {
            var $response = $(data);

            var hata = $response.filter('#hatakodu').val();

            if (hata == 'guncellendi') {
              succes("Veri başarıyla güncellendi.");
            } else if (hata == 'guncellenemedi') {
              error("Veri  güncellenemedi.");
            }


            $('#tablo').empty().append(data);
            $('#example').DataTable({
              'language': {
                'url': '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Turkish.json'
              }
            });


          },

        });

      });

      $(document).on('click', '#ogrinsert', function() {




        var ogradi1 = $('#ogradi1').val();
        var sinifid1 = $('#sinifid1').val();
        var yas1 = $('#yas1').val();
        var cinsiyeti1 = $('#cinsiyeti1').val();
        var adresi1 = $('#adresi1').val();
        var veliadi1 = $('#veliadi1').val();
        var velino1 = $('#velino1').val();

        $('#insertogr').modal('hide');

        $.ajax({
          type: 'POST',
          url: 'php/ogrenci/fetch.php',
          data: {
            islem: 3,
            ogradi1: ogradi1,
            sinifid1: sinifid1,
            yas1 : yas1,
            cinsiyeti1 : cinsiyeti1,
            adresi1 : adresi1,
            veliadi1 : veliadi1,
            velino1 : velino1
          },
          success: function(data) {

            var $response = $(data);

            var hata = $response.filter('#hatakodu').val();

            if (hata == 'eklendi') {
              succes("Veri başarıyla eklendi.");
            } else if (hata == 'eklenemedi') {
              error("Veri  eklenemedi.");
            }

            $('#tablo').empty().append(data);
            $('#example').DataTable({
              'language': {
                'url': '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Turkish.json'
              }
            });


          },

        });

      });

      $(document).on('click', '#deletecalisan', function() {           
        var deger = $(this).val();

        $.ajax({
          type: 'POST',
          url: 'php/calisanlar/fetch.php',
          data: {
            islem: 2,
            id: deger
          },
          success: function(data) {
            var $response = $(data);

            var hata = $response.filter('#hatakodu').val();

            if (hata == 'silindi') {
              succes("Veri başarıyla silindi.");
            } else if (hata == 'guncellenemedi') {
              error("Veri silinemedi.");
            }




            $('#tablo').empty().append(data);
            $('#example').DataTable({
              'language': {
                'url': '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Turkish.json'
              }
            });


          },

        });

      });

      $(document).on('click', '#calisanupdate', function() {         




        var $calisanadi = $(this).closest("tr").find(".ad").text();
        $('#calisanadi').val($calisanadi);

        var $calisansoyadi = $(this).closest("tr").find(".soyad").text();
        $('#calisansoyadi').val($calisansoyadi);

        var $calisanvasif = $(this).closest("tr").find(".vasif").text();
        $('#calisanvasif').val($calisanvasif);

        var $calisantel = $(this).closest("tr").find(".telefon").text();
        $('#calisantel').val($calisantel);
        
        
        $('#updateid').val($(this).val());


      });

      $(document).on('click', '.calisanupdate', function() {             
        
        
        var id2 = $('#updateid').val(); 
        var calisanadi2 = $('#calisanadi').val();
        var calisansoyadi2 = $('#calisansoyadi').val();
        var calisanvasif2 = $('#calisanvasif').val();
        var calisantel2 = $('#calisantel').val();


        $.ajax({
          type: 'POST',
          url: 'php/calisanlar/fetch.php',
          data: {
            islem: 4,
            id2 : id2,
            calisanadi2 : calisanadi2,
            calisansoyadi2 : calisansoyadi2,
            calisanvasif2 : calisanvasif2,
            calisantel2 : calisantel2
          },
          success: function(data) {
            var $response = $(data);

            var hata = $response.filter('#hatakodu').val();

            if (hata == 'guncellendi') {
              succes("Veri başarıyla güncellendi.");
            } else if (hata == 'guncellenemedi') {
              error("Veri  güncellenemedi.");
            }


            $('#tablo').empty().append(data);
            $('#example').DataTable({
              'language': {
                'url': '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Turkish.json'
              }
            });


          },

        });

      });

      $(document).on('click', '#calisaninsert', function() {




        var calisanadi1 = $('#calisanadi1').val();
        var calisansoyadi1 = $('#calisansoyadi1').val();
        var calisanvasif1 = $('#calisanvasif1').val();
        var calisantel1 = $('#calisantel1').val();

        $('#insertcalisan').modal('hide');

        $.ajax({
          type: 'POST',
          url: 'php/calisanlar/fetch.php',
          data: {
            islem: 3,
            calisanadi1 : calisanadi1,
            calisansoyadi1 : calisansoyadi1,
            calisanvasif1 : calisanvasif1,
            calisantel1 : calisantel1
          },
          success: function(data) {

            var $response = $(data);

            var hata = $response.filter('#hatakodu').val();

            if (hata == 'eklendi') {
              succes("Veri başarıyla eklendi.");
            } else if (hata == 'eklenemedi') {
              error("Veri  eklenemedi.");
            }

            $('#tablo').empty().append(data);
            $('#example').DataTable({
              'language': {
                'url': '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Turkish.json'
              }
            });


          },

        });

      });

      $(document).on('click', '#kategoriinsert', function() {




        var adi1 = $('#adi1').val();

        $('#insertogr').modal('hide');

        $.ajax({
          type: 'POST',
          url: 'php/kategori/fetch.php',
          data: {
            islem: 3,
            adi1: adi1
          },
          success: function(data) {

            var $response = $(data);

            var hata = $response.filter('#hatakodu').val();

            if (hata == 'eklendi') {
              succes("Veri başarıyla eklendi.");
            } else if (hata == 'eklenemedi') {
              error("Veri  eklenemedi.");
            }

            $('#tablo').empty().append(data);
            $('#example').DataTable({
              'language': {
                'url': '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Turkish.json'
              }
            });


          },

        });

      });

      $(document).on('click', '#kategoriupdate', function() {         




        var $isim = $(this).closest("tr").find(".adi").text();
        $('#adi').val($isim);
        
        
        $('#updateid').val($(this).val());


      });

      $(document).on('click', '.kategoriupdate', function() {             
        
        
        var id2 = $('#updateid').val(); 
        var adi2 = $('#adi').val();


        $.ajax({
          type: 'POST',
          url: 'php/kategori/fetch.php',
          data: {
            islem: 4,
            id2 : id2,
            adi2 : adi2
          },
          success: function(data) {
            var $response = $(data);

            var hata = $response.filter('#hatakodu').val();

            if (hata == 'guncellendi') {
              succes("Veri başarıyla güncellendi.");
            } else if (hata == 'guncellenemedi') {
              error("Veri  güncellenemedi.");
            }


            $('#tablo').empty().append(data);
            $('#example').DataTable({
              'language': {
                'url': '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Turkish.json'
              }
            });


          },

        });

      });

      $(document).on('click', '#deletekategori', function() {           
        var deger = $(this).val();

        $.ajax({
          type: 'POST',
          url: 'php/kategori/fetch.php',
          data: {
            islem: 2,
            id: deger
          },
          success: function(data) {
            var $response = $(data);

            var hata = $response.filter('#hatakodu').val();

            if (hata == 'silindi') {
              succes("Veri başarıyla silindi.");
            } else if (hata == 'guncellenemedi') {
              error("Veri silinemedi.");
            }




            $('#tablo').empty().append(data);
            $('#example').DataTable({
              'language': {
                'url': '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Turkish.json'
              }
            });


          },

        });

      });

      $(document).on('click', '#deletesinif', function() {           
        var deger = $(this).val();

        $.ajax({
          type: 'POST',
          url: 'php/sinif/fetch.php',
          data: {
            islem: 2,
            id: deger
          },
          success: function(data) {
            var $response = $(data);

            var hata = $response.filter('#hatakodu').val();

            if (hata == 'silindi') {
              succes("Veri başarıyla silindi.");
            } else if (hata == 'guncellenemedi') {
              error("Veri silinemedi.");
            }




            $('#tablo').empty().append(data);
            $('#example').DataTable({
              'language': {
                'url': '//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Turkish.json'
              }
            });


          },

        });

      });





     




    </script>


  </div>





</body>

</html>