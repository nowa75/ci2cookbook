<?php defined( 'BASEPATH' ) OR exit( 'No direct script access allowed' );
/**
 * Created by Michał Nowacki
 * Date: 01.11.14
 * Time: 17:40
 * Filename: dashboard_view.php
 */
?>
<div class="modal fade pg-show-modal has-success" id="modal1" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Modal title</h4>
            </div>
            <div class="modal-body">
                <p>One fine body&hellip;</p>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="row" id="dashboard_error">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group has-error" style="display: none" id="error_dash"><!--dynamic--></div>
            <div class="form-group has-success" style="display: none" id="success_dash"><!--dynamic--></div>
        </div>
    </div>
    <div class="col-xs-4 col-sm-4 col-md-4" id="dashboard-side">
        <div class="clearfix">&nbsp;</div>
        <h3 class="text-center">ToDo's:</h3>

        <form action="<?= site_url( 'api/create_todo' ); ?>" id="create_todo">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <input type="text" name="content" placeholder="content" />
                        <input type="submit" class="btn btn-primary btn-sm" value="New todo"/>
                    </div>
                </div>
            </div>
        </form>
        <hr>
        <h3 class="text-center">List:</h3>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div id="list_todo" class="rowa"><!--dynamic--></div>
            </div>
        </div>
    </div>
    <!--NOTES-->
    <div class="col-xs-8 col-sm-8 col-md-8" id="dashboard-main">
        <div class="clearfix">&nbsp;</div>
        <h3 class="text-center">Note's:</h3>

        <form action="<?= site_url( 'api/create_note' ); ?>" id="create_note">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <input type="text" name="title" placeholder="title"/>
                        <input type="text" name="content" placeholder="content"/>
                        <input type="submit" class="btn btn-primary btn-sm" value="New note"/>
                    </div>
                </div>
            </div>
        </form>
        <hr>
        <h3 class="text-center">List:</h3>

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div id="list_notes" class="rowa"><!--dynamic--></div>
            </div>
        </div>
    </div>
</div>
