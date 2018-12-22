<!-- Main content -->
<main class="main">
    <!-- Breadcrumb -->
    <ol class="breadcrumb m-b-0">
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                            <strong>Multiple Choice</strong>
                            <small>Form</small>
                        </div>
                        <div class="card-block">
                            <?php echo form_open('soal/Quiz/penilaian/'.$soal_kode); ?>
                                <?php
                                 $lbl = 1;
                                $start = 0;
                                foreach ($quiz_data as $quiz)
                                { ?>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <?php if(isset($quiz_data->gambar)){ ?>
                                                <img style="max-width: 200px;max-height: 200px; float: left; display: block;" src="<?php echo base_url()."gambar/".$quiz->gambar?>">
                                            <?php } ?>
                                            <label for="ccnumber"><?php echo $quiz->soal; ?></label>
                                            <div class="radio">
                                                <label for="radio<?php $lbl ?>">
                                                    <input type="radio" id="radio1" name="q_<?php echo $quiz->id_soal; ?>" value="A"> <?php echo $quiz->jwbA; ?>
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label for="radio<?php $lbl ?>">
                                                    <input type="radio" id="radio2" name="q_<?php echo $quiz->id_soal; ?>" value="B"> <?php echo $quiz->jwbB; ?>
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label for="radio<?php $lbl ?>">
                                                    <input type="radio" id="radio3" name="q_<?php echo $quiz->id_soal; ?>" value="C"> <?php echo $quiz->jwbC; ?>
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label for="radio<?php $lbl ?>">
                                                    <input type="radio" id="radio4" name="q_<?php echo $quiz->id_soal; ?>" value="D"> <?php echo $quiz->jwbD; ?>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <?php $lbl++; } ?>
                                <!--/row-->
                                <!-- <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="ccnumber">Dibawah ini yang termasuk compiler pascal</label>
                                            <div class="radio">
                                                <label for="radio2">
                                                    <input type="radio" id="radio5" name="radios1" value="option1"> Turbo Pascal
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label for="radio2">
                                                    <input type="radio" id="radio6" name="radios1" value="option1"> Matlab
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label for="radio2">
                                                    <input type="radio" id="radio7" name="radios1" value="option1"> Netbeans
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label for="radio2">
                                                    <input type="radio" id="radio8" name="radios1" value="option1"> Spyder
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div> -->
                                <!--/row-->
                                <div class="row">
                                    <div class="pull-right clearfix">
                                        <div class="col-md-3">
                                            <?php echo form_submit(array('id' => 'submit', 'value' => 'Submit','class'=>"btn btn-primary")); ?>
                                        </div>       
                                    </div>
                                </div>
                            <?php echo form_close() ?>
                        </div>
                    </div>
                </div>
                <!--/end cred col-->
            </div>
            <!--/.row-->
        </div>
    </div>
    <!-- /.conainer-fluid -->
</main>