<?php  defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by Michał Nowacki
 * Date: 31.10.14
 * Time: 14:50
 * Filename: new_user.php
 */

echo form_open( 'users/delete_user' );
if(validation_errors()):?>
    <h3>Whoops! There was an error:</h3>
    <p><?= validation_errors();?></p>
<?php endif;?>
<?php foreach($query->result() as $row){
  echo 'First Name: '.$row->first_name.' Last Name: '.$row->last_name;
}
?>
<br/>
<?= form_hidden('id',$row->id);?>
<?= form_submit('submit','Delete');?> or <?= anchor('users/index','cancel');?>
<?= form_close();?>