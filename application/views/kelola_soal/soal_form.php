 <script src="https://cdn.ckeditor.com/4.7.3/standard/ckeditor.js"></script>
 <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
             

              
            </div>

            <div class="clearfix"></div>

            <div class="">
              


           
              <div class="clearfix"></div>

        <!-- Main content -->
        <section class='content'>
          <div class='row'>
            <div class='col-xs-12'>
              <!-- <div class='box'> -->
                <div class='box-header'>
                
                  <h3 class='box-title'>DATA SOAL</h3>
                      <div class='box-body'>
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data"><table class='table table-bordered'>
                 <!-- <tr><td>Kode Soal </td> -->
          <!--   <td><input type="hidden" class="form-control" name="kodesoal" id="kodesoal" placeholder="Kode Soal" required="required" value="<?php echo $kodesoal; ?>" / >
        </td> -->
      <!-- <tr><td>Nomor</td>
            <td><input type="text" class="form-control" name="nama'.$j.'" id="nama" placeholder="nama" value="<?php echo $nama; ?>" />
        </td> -->
      <?php

      $i=1;
      while ($i<=$jmlsoal){
      ?>
      <tr><td>Nomor</td>
            <td><input type="text" class="form-control" name="nomor" id="nomor" placeholder="nomor" value="<?php echo $nomor; ?>" />
        </td>
      <tr><td>Soal </td>
            <td><textarea type="text" id="soal" name="soal" placeholder="Soal" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $soal; ?>"></textarea>
        </td>
     
       <tr><td>Gambar</td>
            <td><input type="file" name="filefoto" class="form-control" value="<?php echo $gambar; ?>"/>
        </td>

      <tr><td>Jawaban Benar </td>
            <td>  <input type="checkbox" name="jwb_benar" id="jwb_benar" value="<?php echo $jwb_benar; ?>"/>> A<br>
                  <input type="checkbox" name="jwb_benar" id="jwb_benar" value="<?php echo $jwb_benar; ?>"/>> B<br>
                  <input type="checkbox" name="jwb_benar" id="jwb_benar" value="<?php echo $jwb_benar; ?>"/>> C<br>
                  <input type="checkbox" name="jwb_benar" id="jwb_benar" value="<?php echo $jwb_benar; ?>"/>> D<br>
        </td>
        <tr><td>A </td>
            <td><input type="text" class="form-control" name="jwbA" id="jwbA" value="<?php echo $jwbA; ?>" />
        </td>
        <tr><td>B </td>
            <td><input type="text" class="form-control" name="jwbB" id="jwbB" value="<?php echo $jwbB; ?>" />
        </td>
        <tr><td>C </td>
            <td><input type="text" class="form-control" name="jwbC" id="jwbC" value="<?php echo $jwbC; ?>" />
        </td>
        <tr><td>D </td>
            <td><input type="text" class="form-control" name="jwbD" id="jwbD" value="<?php echo $jwbD; ?>" />
        </td>
        <?php 
   $i=$i+1;
     }

?>
<!--      <input type="hidden" name="Id_buku" value="<?php echo $Id_buku; ?>" /> -->
      <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
      <a href="<?php echo site_url('soal/Soal') ?>" class="btn btn-default">Cancel</a></td></tr>
  
    </table></form>
    <script type="text/javascript">
      var elements = document.getElementById("my-form").elements;

      for (var i = 0, element; element = elements[i++];) {
          if (element.type === "" && element.value === "")
              console.log("it's an empty textfield")
      }
    </script>
     <script>
      CKEDITOR.replace( 'editor1' );
    </script>
    <!-- <script>
            $(document).ready(function () {
                $(".select2").select2({
                    placeholder: "Please Select"
                });
            });
        </script> -->
    </div><!-- /.box-body -->
              <!-- </div>/.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div></div>
        
        <!-- 10.14.211.121 -->