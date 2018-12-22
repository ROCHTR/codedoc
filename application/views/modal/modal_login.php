<?php echo form_open('user/User/login/'); ?>
<div class="modal fade" id="modal_login"  role="dialog" data-backdrop="true" data-focus="true">
  <div style="width: 300px;" class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Login</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="input-group m-b-1">
            <span class="input-group-addon">@</span>
            <input type="text" class="form-control" placeholder="Email" name="email">
        </div>
        <div class="input-group m-b-1">
            <span class="input-group-addon"><i class="icon-lock"></i></span>
            <input type="password" class="form-control" placeholder="Password" name="password">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <?php echo form_submit(array('id' => 'submit', 'value' => 'Login','class'=>"btn btn-info btn-fill pull-right btn-create-project")); ?>
        <a style="text-decoration: none;" href="<?php echo site_url('user/User/registrasi'); ?>">
                                    <button type="button" class="btn btn-primary active m-t-1">Register Now!</button>
      </div>
    </div>
  </div>
</div>
<?php echo form_close() ?>