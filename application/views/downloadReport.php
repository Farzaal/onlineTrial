<?php
  if(!empty($pat)){
    $patId = $pat['PATIENT_ID'];
    $patName = $pat['PATIENT_NAME'];
    $orderDate = $pat['ORDER_DATE']; 
  }
?>
        <div class="container">
		  <div class="panel panel-default">
		  	<div class="panel-header" style="text-align: center;">
		  		<div>Download Reports</div>
		  	</div>
    		<div class="panel-body">
    			<div class="content row">
    				<div class="col-xs-4" style="padding-right: 5px; text-align: left;">
    					<div class="form-group">
    						<label>Patient Id:</label>
    						<input class="form-control" id="patInfo" type="text" value="<?php echo $patId;?>"  />
    					</div>
    				</div>                            
    				<div class="col-xs-4"  style="padding-right: 5px; text-align: left;">
    					<label>Patient Name:</label>
    					<input id="patInfo" class="form-control" type="text" value="<?php echo $patName;?>" />
    				</div>
    				<div class="col-xs-4" style="text-align: left;">
    					<label>Order Date:</label>
    					<input id="patInfo" class="form-control" type="text" value="<?php echo $orderDate;?>" />
    				</div>
    			</div>
                 <div class="col-xs-12 col-md-4">
                    <div class="form-group" style="padding-right: 27px; text-align: left;">
                        <label>Email :</label>
                        <input type="email" name="patEmail" class="form-control" id="patInfo">
                    </div>
                </div>
    		</div>
            <div class="spacer" style="height: 40px;"></div>
            <?php if(!empty($msg)){ ?>
            <div class="alert alert-danger" style="text-align: left;">
                <strong>Report!</strong> <?php echo $msg; ?>
            </div>
            <?php } ?>
    		<section class="cptTable">
                 <div class="panel panel-default">
            <div class="panel-header" style="text-align: center;">
                <div>Test Orders</div>
            </div>
    		<div class="table-responsive">          
    			<table class="table table-condensed table-bordered table-striped">
    				<thead>
    					<tr>
    						<th>Sr.No</th>
    						<th>CPT Description</th>
    						<th>Status</th>
    						<th>Download</th>
    						<th>Availablity</th>
    					</tr>
    				</thead>
    				<tbody>
                      <?php if(!empty($cpts)){ $count = 1; ?>

                        <?php foreach ($cpts as $cpt) { ?>
    					<tr>
    						<td><?php echo $count++; ?></td>
    						<td><?php echo $cpt->CPT_DESCRIPTION; ?></td>
    						<td><?php echo $cpt->DESCRIPTION; ?></td>
    						<td><a href="<?php echo site_url('welcome/singleDownload'); ?>?order=<?php echo $cpt->ORDER_DETAIL_ID;?>" class="btn btn-success">Download Reports</a></td>
                            <?php if($cpt->DESCRIPTION == 'REPORTED'){ ?>
                            <td><input type="checkbox" class="text-center" name="CPTs" checked></td>
                            <?php }else{ ?>
                            <td><input type="checkbox" class="text-center" name="CPTs"></td>
                            <?php } ?>
    					</tr>
                         <?php } } ?>
    					<tr>
    						<td colspan="5" style="padding: 20px; font-size: 17px; text-align: left;"><b>Download All Reports In Zip Format:</b><a href="<?php echo site_url('welcome/downloadReport'); ?>" class="btn btn-primary">Download Zip</a></td>
    					</tr>
    				</tbody>
    			</table>
    		</div></div>
    		</section>
    		<div class="spacer" style="height: 50px;"></div>
  		</div>
  	</div>
    <div class="container">
         <div class="panel panel-default">
                <div class="panel-header" style="text-align: center;">
                    <div>General Terms and Conditions</div>
                </div>
                <div class="panel panel-body">
                    <p class="panelContent">By accessing the Website, you agree to be bound by the terms and conditions appearing in this document and you accept our Privacy Policy. Any personal data you transmit to us by electronic mail or otherwise will be used by us in accordance with our Privacy Policy and you accept our Privacy Policy which is available for viewing here.</p>
                </div>
         </div>
    </div>
