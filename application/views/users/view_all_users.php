<?php
/**
 * Created by Michał Nowacki
 * Date: 31.10.14
 * Time: 14:15
 * Filename: view_all_users.php
 */

if($query->num_rows() >0) : ?>
<table border="0">
    <tr>
        <td>ID</td>
        <td>First Name</td>
        <td>Last Name</td>
        <td>Created Date</td>
        <td>Is Active</td>
        <td colspan="2">Actions</td>
    </tr>
    <?php foreach ($query->result() as $row):?>
    <tr>
        <td><?= $row->id;?></td>
        <td><?= $row->first_name;?></td>
        <td><?= $row->last_name;?></td>
        <td><?= date('d-m-Y',$row->created_date);?></td>
        <td><?= ($row->is_active? 'Yes':'No');?></td>
        <td><?= anchor('users/edit_user/'.$row->id, 'Edit');?></td>
        <td><?= anchor('users/delete_user/'.$row->id, 'Delete');?></td>
    </tr>
    <?php endforeach;?>
</table>
<?php endif;?>