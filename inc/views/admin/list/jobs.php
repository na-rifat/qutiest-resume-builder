<?php $jobs = getData()?>
<?php foreach ( $jobs as $job ): ?>
    <tr>
        <td><?php echo $job->title ?></td>
        <td><button class="button" data-id="<?php echo $job->id ?>"><span class="dashicons dashicons-trash"></span></button></td>
    </tr>
<?php endforeach;?>