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
                  <h3 class='box-title'>DAFTAR SOAL 
                  </h3><button href="#tambahsoal" data-toggle="modal" class="btn btn-default">Tambah</button>

                </div><!-- /.box-header -->
                <div class='box-body'>

        <table class="table table-bordered table-striped" id="mytable">

            <thead>
                <tr>
                    <th width="80px">No</th>
            
            <th>Kode Soal</th>
            <th>Soal</th>
            
            <th>Action</th>
                </tr>
            </thead>
        <tbody>
            <?php
            $start = 0;
            foreach ($soal_data as $soal)
            {
                ?>
                <tr>
            <td><?php echo ++$start ?></td>
            <td><?php echo $soal->kodesoal ?></td>
            <td><?php echo $soal->soal ?></td>
                    
            <td style="text-align:center" width="200px">
            <?php 
            // echo anchor(site_url('soal/Soal/read/'.$soal->kodesoal),'<i class="fa fa-eye"></i>',array('title'=>'detail','class'=>'btn btn-danger btn-sm')); 
            // echo '  '; 
            echo anchor(site_url('soal/Soal/update/'.$soal->kodesoal),'<i class="fa fa-pencil-square-o"></i>',array('title'=>'edit','class'=>'btn btn-danger btn-sm')); 
            echo '  '; 
            echo anchor(site_url('soal/Soal/delete/'.$soal->kodesoal),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure to Delete ?\')"'); 
            
            ?>

            </td>
            </tr>
                <?php
            }
            ?>
            
            </tbody>

        </table>
        <div class="modal fade" id="tambahsoal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Tambah Soal</h4>
                                        </div>
                                  <div class="modal-body">
                                    <form method="post">
                                    
                                    <div class="form-group">
                                      <label class="pull-left">Judul</label>
                                      <input name="judul" id="judul" class="form-control" required="required"></input>
                                    </div>
                                    <div class="form-group">
                                     <label class="pull-left">Jumlah Soal</label>
                                      <select name="jmlsoal" id="jmlsoal" class="form-control">
                                      <?php 
                                      $j = 1;
                                        while ( $j<= 10) {
                                          # code...
                                          echo '<option selected="selected">'.$j.'</option>';
                                          $j++;
                                        }
                                        
                                   
                                      ?>
                                      </select>
                                    </div>
                                    <div class="form-group">
                                      <label class="pull-left">Level</label>
                                      <input name="level" id="level" class="form-control" required="required"></input>
                                    </div>
                                    
                                  </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Kembali</button>
                                            <button type="submit" class="btn btn-success pull-right" formaction="<?php echo base_url('soal/Soal/tambahsoal')?>">Buat Ujian</button>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                          </div>
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