</div>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/tether.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/bootstrap.js">
</script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/jquery.backstretch.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/scripts.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>assets/js/downloadService.js"></script>
</body>
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Enter Email</h4>
      </div>
      <div class="modal-body">
      	<div class="row">
      		<div class="col-sm-12">
            <div class="form-group">
              <p class="emailMsg"><strong>Note:</strong><br/>Report is not available for some reason kindly enter your email and report will be mailed to you by the system. If you have already entered an email kindly close this window.</p>
            </div>
      			<div class="form-group">
      				<label for="email">Email :</label>
      				<input type="email" class="form-control" id="repEmail"/>
              <!-- <span class="emailValid"><p>updated Successfully</p></span> -->
              <span class="emailValid"></span>
      			</div>
      			<div class="col-md-offset-4">
      				<input type="submit" class="col-md-6 btn btn-primary" id="emailSubmit" />
      			</div>
      		</div>
      	</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
</html>