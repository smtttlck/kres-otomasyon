<?php

require_once("../../db.php");


$islem = $_POST['islem'];


if ($islem == 1) {

    yazdir($conn);
} else if ($islem == 2) {
    $id = $_POST['id'];


    try {
        require_once("../../db.php");
        $conn->exec('DELETE FROM `ogrenci` WHERE `ogrenci`.`id`= ' . $id);
        mesaj('silindi');
    } catch (PDOException $e) {
      mesaj('silinemedi');
    }


    yazdir($conn);
} else if ($islem == 3) {
    $ogradi1 = $_POST['ogradi1'];
    $sinifid1 = $_POST['sinifid1'];
    $yas1 = $_POST['yas1'];
    $cinsiyeti1 = $_POST['cinsiyeti1'];
    $adresi1 = $_POST['adresi1'];
    $veliadi1 = $_POST['veliadi1'];
    $velino1 = $_POST['velino1'];
    try {
        require_once("../../db.php");
        $conn->exec('INSERT INTO ogrenci (ogradi,sinifid,yas,cinsiyeti,adresi,veliadi,velitel)
        VALUES( "' . $ogradi1.'","' . $yas1.'","' . $sinifid1.'","' . $cinsiyeti1.'","' . $adresi1.'","' . $veliadi1.'","' . $velino1.'")' );
          mesaj('eklendi');
    } catch (PDOException $e) {
        mesaj('eklenemedi');
    }
     yazdir($conn);
 
}else if ($islem == 4){
    
  $id2 = $_POST['id2'];
  $ogradi2 = $_POST['ogradi2'];
  $sinifid2 = $_POST['sinifid2'];
  $yas2 = $_POST['yas2'];
  $adresi2 = $_POST['adresi2'];
  $veliadi2 = $_POST['veliadi2'];
  $velino2 = $_POST['velino2'];
  try {
    require_once("../../db.php");
    $sql = "UPDATE ogrenci SET ogradi='$ogradi2',sinifid='$sinifid2',yas='$yas2',adresi='$adresi2',veliadi='$veliadi2',velitel='$velino2' WHERE id=$id2";

    $stmt = $conn->prepare($sql);

    
    $stmt->execute();

    mesaj('guncellendi');
    }
catch(PDOException $e)
    {
      mesaj('guncellenemedi');
    }
    yazdir($conn);



}




function mesaj($mesaj){
  echo('<input type="hidden" id="hatakodu" name="custId" value="'. $mesaj.'">');
  }
  


function yazdir($conn)                   ///////////
{

    $statement = $conn->query("select * from ogrenci");

    echo ('<div> <h2>Öğrencileri Düzenle</h2>
   <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#insertogr">Öğrenci Ekle</button></div> ');

    echo (' 
    
    <div class="container tablolar">

<table id="example" class="table table-hover" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Öğrenci adı</th>
            <th>Sınıfı</th>
            <th>Yaş</th>
            <th>Cinsiyeti</th>
            <th>Adresi</th>
            <th>Veli Adı</th>
            <th>Veli Tel</th>
        </tr>
    </thead>
    <tbody>
  


');




    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {

        echo ('    <tr>   
    
    
    <td class="ogradi" >' . $row['ogradi'] . '</td><td class="sinifid" >' . $row['sinifid'] . '</td><td class="yas" >' . $row['yas'] . '</td>
    <td class="cinsiyeti" >' . $row['cinsiyeti'] . '<td class="adresi" >' . $row['adresi'] . '
    <td class="veliadi" >' . $row['veliadi'] . '<td class="velino" >' . $row['velitel'] . '
    <td><button  type="button" id="ogrupdate"  data-toggle="modal" data-target="#updateogr" value="' . $row['id'] . '" class="btn btn-warning update">Güncelle</button>
     <button type="button" id="deleteogr" value="' . $row['id'] . '" class="btn btn-danger delete">Sil</buttonbutton> </td>
    </tr>
    ');
    }


    echo ('</tbody>
</table>
</div>');


modal();

}



function modal()
{
    echo ('<div class="modal " id="insertogr" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Öğrenci Ekle</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <form>
      <div class="form-group">
      <label for="insertogr">Öğrenci Adı</label>
      <input type="text" class="form-control" id="ogradi1" aria-describedby="emailHelp" placeholder="Öğrenci Adı Giriniz">

      <label for="insertogr">Sınıf</label>
      <input type="text" class="form-control" id="sinifid1" aria-describedby="emailHelp" placeholder="Sınıf Giriniz">
      <label for="insertogr">Yaş</label>
      <input type="text" class="form-control" id="yas1" aria-describedby="emailHelp" placeholder="Yaş Giriniz">
      <label for="insertogr">Cinsiyeti</label>
      <input type="text" class="form-control" id="cinsiyeti1" aria-describedby="emailHelp" placeholder="Cinsiyeti Giriniz(tek harf)">
      <label for="insertogr">Adresi</label>
      <input type="text" class="form-control" id="adresi1" aria-describedby="emailHelp" placeholder="Adresi Giriniz">
      <label for="insertogr">Veli Adı</label>
      <input type="text" class="form-control" id="veliadi1" aria-describedby="emailHelp" placeholder="Veli Adı Giriniz">
      <label for="insertogr">Veli No</label>
      <input type="text" class="form-control" id="velino1" aria-describedby="emailHelp" placeholder="Veli No">
      
      
      
      
    </div> 

        
      
    
        <button type="submit" id="ogrinsert" data-dismiss="modal" class="btn btn-primary insert">Ekle</button>
      </form>
    </div>

  </div>
</div>
</div>');


 echo('  <div class="modal" id="updateogr" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
 <div class="modal-dialog" role="document">
   <div class="modal-content">
     <div class="modal-header">
       <h5 class="modal-title" id="exampleModalLabel">Öğrenci Güncelle</h5>
       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
     </div>
     <div class="modal-body">
       <form>
         <div class="form-group">
           <label for="updateogr">Öğrenci Adı</label>
           <input type="text" class="form-control" id="ogradi" aria-describedby="emailHelp" placeholder="Öğrenci Adı Giriniz">

           <label for="updateogr">Sınıf</label>
           <input type="text" class="form-control" id="sinifid" aria-describedby="emailHelp" placeholder="Sınıf Giriniz">
           <label for="updateogr">Yaş</label>
           <input type="text" class="form-control" id="yas" aria-describedby="emailHelp" placeholder="Yaş Giriniz">
           <label for="updateogr">Cinsiyeti</label>
           <input type="text" class="form-control" id="cinsiyeti" aria-describedby="emailHelp" placeholder="Cinsiyeti Giriniz(tek harf)">
           <label for="updateogr">Adresi</label>
           <input type="text" class="form-control" id="adresi" aria-describedby="emailHelp" placeholder="Adresi Giriniz">
           <label for="updateogr">Veli Adı</label>
           <input type="text" class="form-control" id="veliadi" aria-describedby="emailHelp" placeholder="Veli Adı Giriniz">
           <label for="updateogr">Veli No</label>
           <input type="text" class="form-control" id="velino" aria-describedby="emailHelp" placeholder="Veli No Giriniz">
           
           
           
           
           <input type="hidden" class="form-control" id="updateid" aria-describedby="emailHelp" placeholder="Kategori İsmi Giriniz">
         </div>
       
     
         <button type="submit " data-backdrop="false" data-dismiss="modal" class="btn btn-primary ogrupdate">Güncelle</button>
       </form>
     </div>
 
   </div>
 </div>
</div>');

}
