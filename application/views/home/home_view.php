<?php  defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );
/**
 * Created by Michał Nowacki
 * Date: 01.11.14
 * Time: 15:49
 * Filename: home_view.php
 */
?>
<div class="row">
    <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title text-center">Please Login:</h3>
            </div>
            <div class="panel-body">
                <div class="row hidden" id="login_error">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group has-error">
                            <div class="alert alert-danger">Login error</div>
                        </div>
                    </div>
                </div>

                <form action="<?= site_url( 'api/login' ); ?>" method="post" id="login_form" data-parsley-validate>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <input type="text" name="user_name" id="user_name" class="form-control input-small"
                                       placeholder="User Name" required/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
                                <input type="password" name="password" id="password" class="form-control "
                                       placeholder="Password" required/>
                            </div>
                        </div>
                    </div>
                    <br>
                    <input type="submit" value="Login" class="btn btn-info btn-block"/>
                    <input name="target" type="hidden" value="<?= site_url('dashboard');?>"/>
                </form>
            </div>

        </div>

    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
            <?= anchor( 'home/register', 'Register' ); ?>
        </div>
</div>

