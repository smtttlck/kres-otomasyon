<?php

require_once("../../db.php");


$islem = $_POST['islem'];


if ($islem == 1) {

    yazdir($conn);
} else if ($islem == 2) {
    $id = $_POST['id'];


    try {
        require_once("../../db.php");
        $conn->exec('DELETE FROM `calisanlar` WHERE `calisanlar`.`id`= ' . $id);
        mesaj('silindi');
    } catch (PDOException $e) {
      mesaj('silinemedi');
    }


    yazdir($conn);
} else if ($islem == 3) {
    $calisanadi1 = $_POST['calisanadi1'];
    $calisansoyadi1 = $_POST['calisansoyadi1'];
    $calisanvasif1 = $_POST['calisanvasif1'];
    $calisantel1 = $_POST['calisantel1'];
    try {
        require_once("../../db.php");
        $conn->exec('INSERT INTO calisanlar (ad,soyad,vasif,telefon)
        VALUES( "' . $calisanadi1.'","' . $calisansoyadi1.'","' . $calisanvasif1.'","' . $calisantel1.'")' );
          mesaj('eklendi');
    } catch (PDOException $e) {
        mesaj('eklenemedi');
    }
     yazdir($conn);
 
}else if ($islem == 4){
    
  $id2 = $_POST['id2'];
  $calisanadi2 = $_POST['calisanadi2'];
  $calisansoyadi2 = $_POST['calisansoyadi2'];
  $calisanvasif2 = $_POST['calisanvasif2'];
  $calisantel2 = $_POST['calisantel2'];
  try {
    require_once("../../db.php");
    $sql = "UPDATE calisanlar SET ad='$calisanadi2',soyad='$calisansoyadi2',vasif='$calisanvasif2',telefon='$calisantel2' WHERE id=$id2";

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
  


function yazdir($conn)                
{

    $statement = $conn->query("select * from calisanlar");

    echo ('<div> <h2>Çalışanları Düzenle</h2>
   <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#insertcalisan">Çalışan Ekle</button></div> ');

    echo (' 
    
    <div class="container tablolar">

<table id="example" class="table table-hover" cellspacing="0" width="100%">
    <thead>
        <tr>
            <th>Ad</th>
            <th>Soyad</th>
            <th>Vasif</th>
            <th>Telefon</th>
        </tr>
    </thead>
    <tbody>
  


');




    while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {

        echo ('    <tr>   
    
    
    <td class="ad" >' . $row['ad'] . '</td><td class="soyad" >' . $row['soyad'] . '</td>
    <td class="vasif" >' . $row['vasif'] . '<td class="telefon" >' . $row['telefon'] . '
    <td><button  type="button" id="calisanupdate"  data-toggle="modal" data-target="#updatecalisan" value="' . $row['id'] . '" class="btn btn-warning update">Güncelle</button>
     <button type="button" id="deletecalisan" value="' . $row['id'] . '" class="btn btn-danger delete">Sil</buttonbutton> </td>
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
    echo ('<div class="modal " id="insertcalisan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Çalışan Ekle</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <div class="modal-body">
      <form>
      <div class="form-group">
      <label for="insertcalisan">Ad</label>
      <input type="text" class="form-control" id="calisanadi1" aria-describedby="emailHelp" placeholder="Ad Giriniz">

      <label for="insertcalisan">Soyad</label>
      <input type="text" class="form-control" id="calisansoyadi1" aria-describedby="emailHelp" placeholder="Soyad Giriniz">
      <label for="insertcalisan">vasıf</label>
      <input type="text" class="form-control" id="calisanvasif1" aria-describedby="emailHelp" placeholder="Vasıf Giriniz(tek harf)">
      <label for="insertcalisan">Telefon</label>
      <input type="text" class="form-control" id="calisantel1" aria-describedby="emailHelp" placeholder="Telefon Giriniz">
      
      
      
    </div> 

        
      
    
        <button type="submit" id="calisaninsert" data-dismiss="modal" class="btn btn-primary insert">Ekle</button>
      </form>
    </div>

  </div>
</div>
</div>');


 echo('  <div class="modal" id="updatecalisan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
 <div class="modal-dialog" role="document">
   <div class="modal-content">
     <div class="modal-header">
       <h5 class="modal-title" id="exampleModalLabel">Çalışan Güncelle</h5>
       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
         <span aria-hidden="true">&times;</span>
       </button>
     </div>
     <div class="modal-body">
       <form>
         <div class="form-group">
           <label for="updatecalisan">Ad</label>
           <input type="text" class="form-control" id="calisanadi" aria-describedby="emailHelp" placeholder="Ad Giriniz">

           <label for="updatecalisan">Soyad</label>
           <input type="text" class="form-control" id="calisansoyadi" aria-describedby="emailHelp" placeholder="Soyad Giriniz">
           <label for="updatecalisan">Vasıf</label>
           <input type="text" class="form-control" id="calisanvasif" aria-describedby="emailHelp" placeholder="Vasıf Giriniz(tek harf)">
           <label for="updatecalisan">Telefon</label>
           <input type="text" class="form-control" id="calisantel" aria-describedby="emailHelp" placeholder="Telefon Giriniz">
           
           
           
           
           <input type="hidden" class="form-control" id="updateid" aria-describedby="emailHelp" placeholder="Kategori İsmi Giriniz">
         </div>
       
     
         <button type="submit " data-backdrop="false" data-dismiss="modal" class="btn btn-primary calisanupdate">Güncelle</button>
       </form>
     </div>
 
   </div>
 </div>
</div>');

}
