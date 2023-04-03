<?php $experiences = getData()?>
<?php foreach ( $experiences as $experience ): ?>
    <tr>
        <td><?php echo $experience->job ?></td>
        <td><?php echo $experience->summery ?></td>
        <td><button class="button" data-id="<?php echo $experience->id ?>"><span class="dashicons dashicons-trash"></span></button></td>
    </tr>
<?php endforeach;?>