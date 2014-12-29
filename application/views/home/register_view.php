<?php  defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );
/**
 * Created by Michał Nowacki
 * Date: 05.11.14
 * Time: 10:41
 * Filename: register_view.php
 */
?>
<div class="row">
    <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title text-center">Please Register:</h3>
            </div>
            <div class="panel-body">
                <!--                @foreach($errors->all() as $error)-->
                <!--                <div class="row">-->
                <!--                    <div class="col-xs-12 col-sm-12 col-md-12">-->
                <!--                        <div class="form-group has-error">-->
                <!--                            <div class="alert alert-danger">{{ $error }}</div>-->
                <!--                        </div>-->
                <!--                    </div>-->
                <!--                </div>-->
                <!--                @endforeach-->
                <!--                -->

                <div class="row" id="register_form_error">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group has-error">
                            <!--dynamic-->
                        </div>
                    </div>
                </div>
                <form action="<?= site_url( 'api/register' ); ?>" method="post" id="login_form" data-parsley-validate>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <input type="text" name="login" id="login" class="form-control input-small"
                                       placeholder="Login Name" data-parsley-length="[6, 16]" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <input type="email" name="email" id="email" class="form-control input-small"
                                       placeholder="User Email" required/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
                                    <input type="password" name="password" id="password"
                                           class="form-control input-small"
                                           placeholder="Password"
                                           data-parsley-length="[6, 30]" required/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
                                    <input type="password" name="confirm_password" id="confirm_password"
                                           class="form-control input-small"
                                           placeholder="Confirm Password"
                                           data-parsley-equalto="#password" required/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <input name="target" id="target" type="hidden" value="<?= site_url('dashboard');?>"/>
                    <input type="submit" value="Register" class="btn btn-info btn-block"/>

                </form>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12 col-sm-8 col-md-4 col-sm-offset-2 col-md-offset-4">
        <?= anchor( '/', 'Login' ); ?>
    </div>
</div>