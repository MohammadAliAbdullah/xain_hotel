    <div class="section" height="250px">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-10 col-lg-8 text-center">
                    
                        <?php if($this->session->userdata('message')) { ?>
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <?php echo $this->session->userdata('message'); 
						 $this->session->unset_userdata('message');
						?>
                    </div>
                    <?php } ?>
                    <?php if ($this->session->userdata('exception')) { ?>
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <?php echo $this->session->userdata('exception');
						 $this->session->unset_userdata('exception');
						 ?>
                    </div>
                    <?php } ?>
                    <?php if (validation_errors()) { ?>
                    <div class="alert alert-danger alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <?php echo validation_errors(); ?>
                    </div>
                    <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    
     