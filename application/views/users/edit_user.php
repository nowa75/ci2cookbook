<?php  defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by Michał Nowacki
 * Date: 31.10.14
 * Time: 14:50
 * Filename: new_user.php
 */

echo form_open( 'users/edit_user' );
if(validation_errors()):?>
    <h3>Whoops! There was an error:</h3>
    <p><?= validation_errors();?></p>
<?php endif;?>
<table>
    <tr>
        <td>User First Name</td>
        <td><?= form_input($first_name);?></td>
    </tr>
    <tr>
        <td>User Last Name</td>
        <td><?= form_input($last_name);?></td>
    </tr>
    <tr>
        <td>User Email</td>
        <td><?= form_input($email);?></td>
    </tr>
    <tr>
        <td>User Is Active?</td>
        <td><?= form_checkbox($is_active);?></td>
    </tr>
    <?= form_hidden($id);?>
</table>
<?= form_submit('submit','Update');?> or <?= anchor('users/index','cancel');?>
<?= form_close();?>