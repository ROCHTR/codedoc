<!-- Main content -->
<main class="main">
    <!-- Breadcrumb -->
    <ol class="breadcrumb m-b-0">
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row row-equal">
                <div class="col-sm-12 col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <h3 class="col-lg-11"><?php echo $forum_data->judul ?></h3>
                                <div class="col-lg-1">
                                    <a class="btn" href="<?php echo base_url()."forum/Forum/like_question/".$forum_data->id_forum?>" style="text-decoration: none;color: black;"><h5>
                                    <i class="fa fa-thumbs-o-up"><span>&nbsp; <?php echo $forum_data->likes ?></small></span>
                                    </i>
                                    </h5></a>
                                </div>
                            </div>
                        </div>
                        <div class="card-block">
                            <?php echo nl2br($forum_data->content); ?>
                        </div>
                    </div>
                </div>
                <!--/col-->
            </div>
            <!--/row-->
            <div class="row row-equal">
                <div class="col-sm-12 col-md-12">
                    <div class="card card-default">
                        <div class="card-header">
                            <h5><?php echo $forum_data->answer ?> Answer</h5>
                            <div class="card-actions">
                            <?php if ($this->session->userdata('name') != NULL ) { ?>
                                <a class="btn" data-toggle="modal" data-target="#Answering"><i class="fa fa-reply"></i></a>
                            <?php } else { ?>
                                <a class="btn" data-toggle="modal" data-target="#modal_login"><i class="fa fa-reply"></i></a>
                            <?php } ?>
                                <a class="btn-minimize collapsed" data-toggle="collapse" href="#collapseExample" aria-expanded="false" aria-controls="collapseExample"><i class="icon-arrow-down"></i></a>
                            </div>
                        </div>
                        <div id="collapseExample">
                            <?php
                                $start = 0;
                                foreach ($answer_data as $answer)
                                { ?>
                            <div class="card-block">
                                <?php echo nl2br($answer->content); ?>
                            </div>
                            <hr>
                            <?php } ?>
                        </div>
                                                        
                    </div>
                </div>
                <!--/col-->
            </div>
            <!--/row-->
        </div>
    </div>
    <!-- /.conainer-fluid -->
</main>
<?php echo form_open('forum/Forum/insert_answer/'.$id_forum); ?>
<div class="modal fade" id="Answering"  role="dialog" data-backdrop="true" data-focus="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Reply</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="form-group">
                <div class="col-md-2">
                    <label class="form-label-2">Answer</label>
                </div>
                <div class="col-md-10">
                    <textarea style="height: 100px;" type="text" class="form-control border-input" placeholder="" name="reply_answer" required=""></textarea> 
                </div>
            </div> 
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <?php echo form_submit(array('id' => 'submit', 'value' => 'Reply','class'=>"btn btn-info btn-fill pull-right btn-create-project")); ?>
      </div>
    </div>
  </div>
</div>
<?php echo form_close() ?>