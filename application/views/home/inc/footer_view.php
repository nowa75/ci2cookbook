<nav class="navbar navbar-default navbar-fixed-bottom" role="navigation">
    <div class="container-fluid">
        <!-- Grupowanie "marki" i przycisku rozwijania mobilnego menu -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-2">
                <span class="sr-only">Rozwiń nawigację</span>
                <span class="icon-bar">a</span>
                <span class="icon-bar">s</span>
                <span class="icon-bar">x</span>
            </button>
            <a class="navbar-brand" href="#">copyright ..::QurczaQ::.. <?= date( 'Y' ); ?></a>
        </div>
    </div>
</nav>
<!-- close centered-form -->
</div>
<!-- close container-->
</div>
<script src="<?= base_url() ?>assets/js/jquery-1.9.min.js"></script>
<script>window.ParsleyConfig = {
        errorsWrapper: '<div ></div>',
        errorTemplate: '<div class="alert alert-danger"></div>'
    };</script>
<!--<script src="--><?//= base_url() ?><!--assets/js/parseyjs.js"></script>-->
<script src="<?= base_url() ?>assets/js/bootstrap.min.js"></script>
<?php
if(isset( $js ))
{
    echo '<script src="' . base_url() . 'assets/js/' . $js . '.js"></script>';
}
?>
</body>
</html>