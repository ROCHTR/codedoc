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
                    foreach ($level_data as $level)
                    { ?>
                        <div class="col-xxs-12 col-xs-12 col-lg-6">
                            <div class="card">
                                <div class="card-block p-a-0 clearfix">
                                    <?php if ($nilai_data->num_rows() < 1){ ?>
                                        <i class="bg-warning p-a-2 p-x-3 font-2xl m-r-1 pull-left">
                                        <h6><small>Score</small></h6>
                                        <h3><div class="font-weight-bold">0</div></h3>
                                    <?php } ?>
                                    <?php
                                    $start = 0;
                                    foreach ($nilai_data->result() as $nilai)
                                    { ?>
                                    <?php if (isset($nilai->kodesoal) and $nilai->kodesoal == $level->kodesoal) { ?>
                                        <i class="bg-warning p-a-2 p-x-3 font-2xl m-r-1 pull-left">
                                        <h6><small>Score</small></h6>
                                        <h3><div class="font-weight-bold"><?php echo $nilai->nilai ?></div></h3>
                                    <?php break;}else {?>
                                        <i class="bg-warning p-a-2 p-x-3 font-2xl m-r-1 pull-left">
                                        <h6><small>Score</small></h6>
                                        <h3><div class="font-weight-bold">0</div></h3>
                                    <?php break;}} ?>
                                    </i>
                                    <a href="<?php echo site_url('soal/Quiz/soal_quiz/'.$level->kodesoal); ?>">
                                        <div class="h3 m-b-0 p-t-1"><?php echo $level->judul; ?></div>
                                    </a>
                                    <div class="text-muted text-uppercase font-weight-bold font-xs">Level <?php echo $level->level; ?></div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                        <!--/.col-->
                    </div>
                    <!--/.row hooop-->
                </div>
            </div>
            <!-- /.conainer-fluid -->
        </main>