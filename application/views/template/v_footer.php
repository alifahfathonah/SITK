<!-- BEGIN QUICK SIDEBAR -->
	<!--Cooming Soon...-->
	<!-- END QUICK SIDEBAR -->
</div>
<!-- END CONTAINER -->

<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="../../assets/global/plugins/respond.min.js"></script>
<script src="../../assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->

<script src="<?php echo base_url('assets/global/plugins/jquery-migrate.min.js')?>" type="text/javascript"></script>
<!-- IMPORTANT! Load jquery-ui.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
<script type="text/javascript" src="<?php echo base_url('assets//global/plugins/select2/select2.min.js')?>"></script>
<script src="<?php echo base_url('assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js')?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/global/plugins/jquery.blockui.min.js')?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/global/plugins/jquery.cokie.min.js')?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/global/plugins/uniform/jquery.uniform.min.js')?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')?>" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo base_url('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')?>"></script>
<!-- END CORE PLUGINS -->
<script src="<?php echo base_url('assets/global/scripts/metronic.js')?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/admin/layout2/scripts/layout.js')?>" type="text/javascript"></script>
<script src="<?php echo base_url('assets/admin/layout2/scripts/demo.js')?>" type="text/javascript"></script>
<script>
    jQuery(document).ready(function() {    
        Metronic.init(); // init metronic core components
		Layout.init(); // init current layout
		Demo.init(); // init demo features
		});
</script>
<!-- END JAVASCRIPTS -->
<script type="text/javascript">
$("#datepicker1").datepicker({
    format: "yyyy",
    viewMode: "years", 
    minViewMode: "years"
});
$("#datepicker2").datepicker({
    format: "yyyy",
    viewMode: "years", 
    minViewMode: "years"
});
</script>
</body>
<!-- END BODY -->
</html>