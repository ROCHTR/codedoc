<!-- Main content -->
<main class="main">
    <!-- Breadcrumb -->
    <ol class="breadcrumb m-b-0">
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <!--/row nah-->
            <div class="row row-equal">
                <?php
                $start = 0;
                foreach ($materi_data as $materi)
                { ?>
                <tr>
                <div class="col-xxs-12 col-xs-12 col-lg-6">
                    <div class="card">
                        <div class="card-block p-a-1 clearfix">
                            <i class="fa fa-file bg-primary p-a-1 font-2xl m-r-1 pull-left"></i>
                            <?php if($materi->jenis == 'File'){ ?>
                                <a href="<?php echo base_url()."gambar/".$materi->gambar?>"><div class="h5 text-primary m-b-0 m-t-h"><?php echo $materi->judul ?></div></a>
                                <div class="text-muted text-uppercase font-weight-bold font-xs">File</div>
                            <?php } elseif ($materi->jenis == 'Link') {?>
                                <a href="<?php $materi->isi ?>"><div class="h5 text-primary m-b-0 m-t-h"><?php echo $materi->judul ?></div></a>
                                <div class="text-muted text-uppercase font-weight-bold font-xs">Link</div>
                            <?php } else { ?>
                                <a href="<?php echo site_url('materi/Materi/materi_view/'.$materi->kodemateri); ?>"><div class="h5 text-primary m-b-0 m-t-h"><?php echo $materi->judul ?></div></a>
                                <div class="text-muted text-uppercase font-weight-bold font-xs">Text/Video/Gambar</div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <!--/.col-->
                <!-- <div class="col-xxs-12 col-xs-6 col-lg-6">
                    <div class="card">
                        <div class="card-block p-a-1 clearfix">
                            <i class="fa fa-file bg-primary p-a-1 font-2xl m-r-1 pull-left"></i>
                            <div class="h5 text-primary m-b-0 m-t-h">Materi 1</div>
                            <div class="text-muted text-uppercase font-weight-bold font-xs">Text</div>
                        </div>
                    </div>
                </div> -->
                <!--/.col-->
                <!-- <div class="col-xxs-12 col-xs-6 col-lg-6">
                    <div class="card">
                        <div class="card-block p-a-1 clearfix">
                            <i class="fa fa-play bg-danger p-a-1 font-2xl m-r-1 pull-left"></i>
                            <div class="h5 text-primary m-b-0 m-t-h">Materi 1</div>
                            <div class="text-muted text-uppercase font-weight-bold font-xs">Video</div>
                        </div>
                    </div>
                </div> -->
                <!--/.col-->
                <!-- <div class="col-xxs-12 col-xs-6 col-lg-6">
                    <div class="card">
                        <div class="card-block p-a-1 clearfix">
                            <i class="fa fa-file bg-primary p-a-1 font-2xl m-r-1 pull-left"></i>
                            <div class="h5 text-primary m-b-0 m-t-h">Materi 1</div>
                            <div class="text-muted text-uppercase font-weight-bold font-xs">Text</div>
                        </div>
                    </div>
                </div> -->
                <!--/.col-->
            </div>
            <!--/.row hooop-->
        </div>
    </div>
    <!-- /.conainer-fluid -->
</main>