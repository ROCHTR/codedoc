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
                  <h3 class='box-title'>DAFTAR USER 
                  </h3>

                </div><!-- /.box-header -->
                <div class='box-body'>

        <table class="table table-bordered table-striped" id="mytable">

            <thead>
                <tr>
                    <th width="80px">No</th>
            
            <th>Username</th>
            <th>Password</th>
            
            <th>Action</th>
                </tr>
            </thead>
        <tbody>
            <?php
            $start = 0;
            foreach ($user_data as $user)
            {
                ?>
                <tr>
            <td><?php echo ++$start ?></td>
            <td><?php echo $user->username ?></td>
            <td><?php echo $user->password ?></td>
                    
            <td style="text-align:center" width="200px">
            <?php 
           
            echo anchor(site_url('user/User/delete/'.$user->id_user),'<i class="fa fa-trash-o"></i>','title="delete" class="btn btn-danger btn-sm" onclick="javasciprt: return confirm(\'Are You Sure to Delete ?\')"'); 
            
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
                                      $j = 10;
                                  
                                        echo '<option selected="selected">'.$j.'</option>';
                                   
                                      ?>
                                      </select>
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