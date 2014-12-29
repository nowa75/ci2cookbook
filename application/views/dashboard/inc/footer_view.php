<!-- close centered-form -->
</div>
<!-- close container-->
</div>
<!--footer-->
<div class="container navbar-fixed-bottom" >
    <p class="text-muted">Copyright ..::qurczaq::.. <?= date('Y');?></p>
</div>

<script src="<?= base_url() ?>assets/js/jquery-1.9.min.js"></script>
<script src="<?= base_url() ?>assets/js/parseyjs.js"></script>
<script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/js/dash/dashboard/result.js"></script>
<script src="<?= base_url() ?>assets/js/dash/dashboard/event.js"></script>
<script src="<?= base_url() ?>assets/js/dash/dashboard/template.js"></script>
<script src="<?= base_url() ?>assets/js/dash/dashboard.js"></script>
<script>
    $(function() {
        // Init the Dashboard application
        var dashboard = new Dashboard();
    });
</script>
<?php
if(isset( $js ))
{
    echo '<script src="' . base_url() . 'assets/js/' . $js . '.js"></script>';
}
?>
</body>
</html>