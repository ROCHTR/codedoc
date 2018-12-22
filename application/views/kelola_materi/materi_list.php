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
            <div class='col-md-12'>
             <!--  <div class='box'> -->
                <div class='box-header'>
                  <h3 class='box-title'>DAFTAR MATERI 
                  </h3><a href="<?php echo site_url('materi/Materi/create'); ?>" class="btn btn-default">Tambah</a>

                </div><!-- /.box-header -->
                <div class='box-body'>

        <table class="table table-bordered table-striped" id="mytable">

            <thead>
                <tr>
                    <th width="80px">No</th>
            
            <th>Kode Materi</th>
            <th>Judul</th>
            
            <th>Action</th>
                </tr>
            </thead>
        <tbody>
            <?php
            $start = 0;
            foreach ($materi_data as $materi)
            {
                ?>
                <tr>
            <td><?php echo ++$start ?></td>
            <td><?php echo $materi->kodemateri ?></td>
            <td><?php echo $materi->judul ?></td>
                    
            <td style="text-align:center" width="200px">
            <?php 
            echo anchor(site_url('materi/Materi/read/'.$materi->kodemateri),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-danger btn-sm')); 
            echo '  '; 
            echo anchor(site_url('materi/Materi/update/'.$materi->kodemateri),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-danger btn-sm')); 
            echo '  '; 
            echo anchor(site_url('materi/Materi/delete/'.$materi->kodemateri),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure to Delete ?\')"'); 
            
            ?>

            </td>
            </tr>
                <?php
            }
            ?>
            
            </tbody>

        </table>
   
        <div style="margin-top:20px"></div>
        <script src="<?php echo base_url('assets/js/jquery-1.11.2.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/jquery.dataTables.js') ?>"></script>
        <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap.js') ?>"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $("#mytable").dataTable();
            });
        </script>
                    </div><!-- /.box-body -->
              <!-- </div> --><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
        </section><!-- /.content -->
      </div></div>
        
        <!-- 10.14.211.121 -->