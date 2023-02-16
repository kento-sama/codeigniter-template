
        </div>
    </div>
</body>

<script>
    var base_url = "<?php echo base_url();?>";
</script>


<script src="<?php echo base_url();?>assets/js/jquery-3.6.3.js"></script>
<script src="<?php echo base_url();?>assets/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url();?>assets/js/mycustom.js"></script>
<script src="<?php echo base_url();?>assets/js/helper.js"></script>

<!--   JS plugins -->
<?php if(isset($js_plugins)): ?>
    <?php foreach ($js_plugins as $plugin) : ?>
        <script src="<?php echo base_url('assets/js/plugins').'/'.$plugin.'.js';?>"></script>
    <?php endforeach; ?>
<?php endif;?>

<!--   JS Modules -->
<?php if(isset($modules)): ?>
    <?php foreach ($modules as $module) : ?>
        <script src="<?php echo base_url('assets/js/modules').'/'.$module.'-module.js';?>"></script>
    <?php endforeach; ?>
<?php endif;?>

<!--   Custom JS-->
<?php if(isset($custom_js)): ?>
    <?php foreach($custom_js as $js) : ?>
        <script src="<?php echo base_url('assets/js').'/'.$js.'.js';?>"></script>
    <?php endforeach; ?>
<?php endif;?>

<script type="text/javascript">
    $(document).ready(function () {
        <?php if(isset($js_listeners)):?>
	    	<?php foreach ($js_listeners as $listeners): ?>
	    		<?php echo $listeners; ?>;
	    	<?php endforeach;?>
        <?php endif;?>
    });
</script>