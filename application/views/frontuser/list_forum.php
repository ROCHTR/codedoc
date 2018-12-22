<!-- Main content -->
<main class="main">
    <!-- Breadcrumb -->
    <ol class="breadcrumb m-b-0">
        <!-- <li><a href="#">Home</a></li>
        <li><a href="#">Library</a></li>
        <li class="active">Data</li> -->
    </ol>
    <div class="container-fluid">
        <div class="row">
            <div class="pull-right clearfix">
                <div class="col-md-3">
                <?php if ($this->session->userdata('name') != NULL ) { ?>
                    <button type="button" data-toggle="modal" data-target="#createForum" class="btn btn-primary-outline">Ask Question</button>
                <?php } else { ?>
                    <button type="button" data-toggle="modal" data-target="#modal_login" class="btn btn-primary-outline">Ask Question</button>
                <?php } ?>
                </div>       
            </div>
        </div>
        <div class="clearfix">&nbsp;</div>
        <div class="animated fadeIn">
            <!--/row-->
            <div class="row row-equal">
                <?php
                $start = 0;
                foreach ($forum_data as $forum)
                { ?>
                <div class="col-xxs-12 col-xs-12 col-lg-12">
                    <div class="card">
                        <div class="card-block p-a-1 clearfix">
                            <i class="bg-success p-a-1 font-2xl m-r-1 pull-left text-xs-center">
                                <h6><div class="font-weight-bold"><?php echo $forum->likes?></div></h6>
                                <h6><small>Likes</small></h6>                                     
                            </i>
                            <i class="bg-primary p-a-1 font-2xl m-r-1 pull-left text-xs-center">
                                <h6><div class="font-weight-bold"><?php echo $forum->answer?></div></h6>
                                <h6><small>Answer</small></h6>                                    
                            </i>
                            <a href="<?php echo base_url()."forum/Forum/list_answer/".$forum->id_forum?>">
                                <div class="h5 m-b-0 m-t-h"><?php echo $forum->judul?></div>
                            </a>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <!--/.col-->
                <!-- <div class="col-xxs-12 col-xs-12 col-lg-12">
                    <div class="card">
                        <div class="card-block p-a-1 clearfix">
                            <i class="bg-success p-a-1 font-2xl m-r-1 pull-left text-xs-center">
                                <h6><div class="font-weight-bold">7</div></h6>
                                <h6><small>Likes</small></h6>                                     
                            </i>
                            <i class="bg-primary p-a-1 font-2xl m-r-1 pull-left text-xs-center">
                                <h6><div class="font-weight-bold">5</div></h6>
                                <h6><small>Answer</small></h6>                                    
                            </i>
                            <div class="h5 m-b-0 m-t-h">Cara mengerjakan microarray menggunakan naural network dengan optimasi Genetic Algoritm</div>
                        </div>
                    </div>
                </div> -->
                <!--/.col-->
            </div>
        </div>
    </div>
    <!-- /.conainer-fluid -->
</main>
<?php echo form_open('forum/Forum/insert/'); ?>
<div class="modal fade" id="createForum"  role="dialog" data-backdrop="true" data-focus="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ask Question</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
            <div class="form-group">
                <div class="col-md-2">
                    <label class="form-label-2">Title</label>
                </div>
                <div class="col-md-10">
                    <input type="text" class="form-control border-input" placeholder="Title" name="title_forum" required="">
                </div>
            </div> 
        </div>
        <div class="row">
            <div class="form-group">
                <div class="col-md-2">
                    <label class="form-label-2">Question</label>
                </div>
                <div class="col-md-10">
                    <textarea style="height: 100px;" type="text" class="form-control border-input" placeholder="" name="question_forum" required=""></textarea> 
                </div>
            </div> 
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <?php echo form_submit(array('id' => 'submit', 'value' => 'ASK','class'=>"btn btn-info btn-fill pull-right btn-create-project")); ?>
      </div>
    </div>
  </div>
</div>
<?php echo form_close() ?>