 <!-- Top content -->
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                           <!--   <img src="assets/images/DOW.jpg"/>   -->
                          </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h3>DUHS Online Reports Login</h3>
                            		<p>Enter your Invoice No and Access Code to log on:</p>
                        		</div>
                            </div>
                            <div class="form-bottom">
                                <?php if(!empty($msg)){ ?>
                                <div class="msg">
                                    <span style="color: red; font-size: 20px;"><?php echo $msg; ?></span>
                                </div>
                                <?php } ?>
			                    <form role="form" action="<?php echo site_url('welcome/checkLogin');?>" method="post" class="login-form">
			                    	<div class="form-group">
			                    		<label class="sr-only" for="form-username">Invoice Number</label>
			                        	<input type="text" name="InvoiceNum" placeholder="Enter Invoice Number..." class="form-username form-control" id="form-username">
                                        <span style="color:red;"><?php echo form_error('InvoiceNum'); ?></span>
			                        </div>
			                        <div class="form-group">
			                        	<label class="sr-only" for="form-password">Access Code</label>
			                        	<input type="password" name="accessCode" placeholder="Enter Access Code..." class="form-password form-control" id="form-password">
                                        <span style="color:red;"><?php echo form_error('accessCode'); ?></span>
			                        </div>
			                        <button type="submit" class="btn">Login</button>
			                    </form>
		                    </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
