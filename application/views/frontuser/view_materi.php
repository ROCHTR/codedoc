<!-- Main content -->
<main class="main">
    <!-- Breadcrumb -->
    <ol class="breadcrumb m-b-0">
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
                <div class="col-sm-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3><?php echo $materi_data->judul ?></h3>
                        </div>
                        <div class="card-block">
                            <div class="row">
                            <?php if(isset($materi_data->gambar)){ ?>
                                <div class="col-sm-6 col-md-6">
                                    <img style="max-width: 300px;max-height: 300px; float: right; display: block;" src="<?php echo base_url()."gambar/".$materi_data->gambar?>">
                                </div>
                                <div class="col-sm-6 col-md-6">
                                    <video src="<?php echo base_url()."gambar/".$materi_data->gambar?>" controls width="320" height="240" type="video/mp4">
                                    </video>
                                </div>
                            <?php }; ?>
                            </div>
                            
                            <div class="isi" style=" margin: 0px 50px 0px 50px;">
                                <p><?php echo nl2br($materi_data->isi); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/col-->
            <!--/row-->
        </div>
    </div>
    <!-- /.conainer-fluid -->
</main>