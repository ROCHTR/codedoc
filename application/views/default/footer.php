        <?php 
            if($this->session->userdata('name') == NULL){
                $this->load->view('modal/modal_login');
            }
            ?>
        <footer class="footer ng-scope">
            <span class="pull-right text-muted">
                <a href="http://bootstrapmaster.com">LeafUI</a> © 2016 creativeLabs. Powered by <a href="http://GenesisUI.com">GenesisUI</a>
            </span>
        </footer>
        <!-- Bootstrap and necessary plugins -->
        <script src="<?php echo base_url('assets/frontuser/js/libs/jquery.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/frontuser/js/libs/tether.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/frontuser/js/libs/bootstrap.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/frontuser/js/libs/pace.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/frontuser/js/libs/pace.min.js'); ?>"></script>
        <!-- Plugins and scripts required by all views -->
        <script src="<?php echo base_url('assets/frontuser/js/libs/Chart.min.js'); ?>"></script>
        <script src="<?php echo base_url('assets/frontuser/js/libs/views/shared.js'); ?>"></script>
        <!-- GenesisUI main scripts -->
        <script src="<?php echo base_url('assets/frontuser/js/app.js'); ?>"></script>
        <!-- Plugins and scripts required by this views -->
        <script src="<?php echo base_url('assets/frontuser/js/libs/gauge.min.js'); ?>"></script>
        <!-- Custom scripts required by this view -->
        <script src="<?php echo base_url('assets/frontuser/js/views/widgets.js'); ?>"></script>
        
        
    </body>
</html>