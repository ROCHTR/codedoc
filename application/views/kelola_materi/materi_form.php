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
                
                  <h3 class='box-title'>DATA MATERI</h3>
                      <div class='box-body'>
        <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data"><table class='table table-bordered'>

           <tr><td>Kode Materi </td>
            <td><input type="text" class="form-control" name="kodemateri" id="kodemateri" placeholder="Kode Materi" required="required" value="<?php echo $kodemateri; ?>" / >
        </td>
      <!-- <tr><td>Nomor</td>
            <td><input type="text" class="form-control" name="nama'.$j.'" id="nama" placeholder="nama" value="<?php echo $nama; ?>" />
        </td> -->
      <tr><td>Judul</td>
            <td><input type="text" class="form-control" id="judul" name="judul" placeholder="Judul" required="required" value="<?php echo $judul; ?>"/>
        </td>
     
       <tr><td>File</td>
            <td><input type="file" name="filefoto" class="form-control" value="<?php echo $gambar; ?>"/>
        </td>

        <tr><td>Isi Materi</td>
            <td><input type="text" class="form-control" name="isi" id="isi" placeholder="Isi Materi" value="<?php echo $isi; ?>" />
        </td>
        
        <tr><td>Jenis</td>
            <!-- <td><input type="text" class="form-control" name="KetPemilik" id="KetPemilik" placeholder="KetPemilik" value="<?php echo $KetPemilik; ?>" />
        </td> -->
            <td><select class="form-control" name="jenis" id="jenis" value="Pilih">
                      <option value="File">File</option>
                      <option value="Link">Link</option>
                      <option value="Video/Gambar/Text">Video/Gambar/Text</option>                   
                    </select></td>
       
<!--      <input type="hidden" name="Id_buku" value="<?php echo $Id_buku; ?>" /> -->
      <tr><td colspan='2'><button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
      <a href="<?php echo site_url('materi/Materi/index') ?>" class="btn btn-default">Cancel</a></td></tr>
  
    </table></form>
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