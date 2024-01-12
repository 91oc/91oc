<?php 

/* Check the absolute path to the Social Auto Poster directory. */
if ( !defined( 'SAP_APP_PATH' ) ) {
    // If SAP_APP_PATH constant is not defined, perform some action, show an error, or exit the script
    // Or exit the script if required
    exit();
}

global $sap_common;

if( !$sap_common->sap_is_license_activated() ){
	$redirection_url = '/mingle-update/';
	header('Location: ' . SAP_SITE_URL . $redirection_url );
	die();
}
?>
<link rel="stylesheet" href="<?php echo SAP_SITE_URL . '/assets/css/jquery-ui.css' ?>" >
<?php
include SAP_APP_PATH . 'header.php';

include SAP_APP_PATH . 'sidebar.php';

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<section class="content-header">
		<h1><?php echo $sap_common->lang('add_coupon'); ?><small></small></h1>
	</section>

	<section class="content">
		<?php
		echo $this->flash->renderFlash(); ?>

		<form class="add-coupon-form" name="new-member" id="add-coupon" method="POST" enctype="multipart/form-data" action="<?php echo SAP_SITE_URL . '/coupons/save/'; ?>">

			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title"><?php echo $sap_common->lang('coupon_details'); ?></h3>
				</div>

				<div class="box-body">
					<div class="row sap-mt-1_5">
						<div class="col-md-6 form-group"><div class="row">
							<label class="col-sm-4 col-md-3"><?php echo $sap_common->lang('coupon_code'); ?><span class="astric">*</span></label>
							<div class="col-sm-8 col-md-9">								

								<input type="text" name="coupon_code" class="form-control">
							</div>
						</div></div>
						<div class="col-md-6 form-group">
							<div class="row">
								<label class="col-sm-4 col-md-3"><?php echo $sap_common->lang('coupon_type'); ?><span class="astric">*</span></label>
								<div class="col-sm-8 col-md-9">

									<select name="coupon_type" id="coupon_type" class="form-control" onchange="return checkPercentageAmountLength('coupon_amount', 'coupon_type', 'percentage_discount')">
										<option value=""><?php echo $sap_common->lang('select_coupon_type'); ?></option>
										<?php
											foreach($coupon_type as $key => $value) {
										?>
											<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
										<?php
											}
										?>
									</select>
								</div>
							</div>
						</div>
					</div>

					<div class="row sap-mt-1_5">
						<div class="col-md-6 form-group">
							<div class="row">
								<label class="col-sm-4 col-md-3"><?php echo $sap_common->lang('coupon_amount'); ?><span class="astric">*</span></label>
								<div class="col-sm-8 col-md-9">
									<input type="number" name="coupon_amount" id="coupon_amount" onkeyup="return checkPercentageAmountLength('coupon_amount', 'coupon_type', 'percentage_discount')" class="form-control" min="1" step=".01">
								</div>
							</div>
						</div>
						<div class="col-md-6 form-group">
							<div class="row">
								<label class="col-sm-4 col-md-3"><?php echo $sap_common->lang('coupon_expiry_date'); ?></label>
								<div class="col-sm-8 col-md-9">
									<input type="text" name="coupon_expiry_date" id="coupon_expiry_date" class="form-control datepicker" value="<?php echo date('Y-m-d') ?>">
								</div>
							</div>
						</div>
					</div>

					<div class="row sap-mt-1_5">
						<div class="col-md-6 form-group">
							<div class="row">
								<label class="col-sm-4 col-md-3"><?php echo $sap_common->lang('coupon_description'); ?></label>
								<div class="col-sm-8 col-md-9">
									<textarea rows="3" name="coupon_description" class="form-control"></textarea>
								</div>
							</div>
						</div>
						<div class="col-md-6 form-group">
							<div class="row">
								<label class="col-sm-4 col-md-3"><?php echo $sap_common->lang('coupon_status'); ?></label>
								<div class="col-sm-8 col-md-9">
									<select name="coupon_status" id="coupon_status" class="form-control">
										<?php
											foreach($coupon_status as $key => $value) {
										?>
											<option value="<?php echo $key; ?>"><?php echo $value; ?></option>
										<?php
											}
										?>
									</select>
								</div>
							</div>
						</div>
					</div>

					<div class="sap-mt-1 col-md-12 form-group">
						<input type="hidden" name="form-submitted" value="1">
						<button type="submit" name="sap_add_member_submit" class="btn btn-primary"><?php echo $sap_common->lang('add_coupon'); ?></button>
					</div>
				</div>
			</div>
		</form>
	</section>
</div>

<script src="<?php echo SAP_SITE_URL . '/assets/js/jquery.min.js' ?>" type="text/javascript"></script>

<?php
include'footer.php';
?>
<script src="<?php echo SAP_SITE_URL . '/assets/js/jquery-ui.js' ?>"></script>
<script src="<?php echo SAP_SITE_URL . '/assets/js/custom.js'; ?>"></script>

