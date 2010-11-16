<h1>Ips</h1>
<? $paginator->options(array('url' => $this->passedArgs)); ?>
<table>
    <th><?php echo $paginator->sort('ID', 'id'); ?></th>
    <th><?php echo $paginator->sort('Ip', 'ip'); ?></th>
    <th><?php echo $paginator->sort('Active', 'active'); ?></th>
    <th>Action</th>

    <?php foreach ($ips as $ip): ?>
        <tr>
            <td><?php echo $ip['Ip']['id']; ?></td>
            <td>
            <?php echo $html->link(long2ip($ip['Ip']['ip']), array('action' => 'view', 'id' => $ip['Ip']['id'])); ?>
        </td>
        <td><?php echo $ip['Ip']['active']; ?></td>
        <td><?php echo $html->link('Change status', array('action' => 'change_status', 'id' => $ip['Ip']['id']), null, 'Are you sure?') ?>
        </td>
    </tr>
    <?php endforeach; ?>

        </table>

        <table>

            <tr>
                <td>
            <? echo $paginator->prev('« Previous ', null, null, array('class' => 'disabled')); ?>
        </td>
        <td>
            <? echo $paginator->next(' Next »', null, null, array('class' => 'disabled')); ?>
        </td>
        <td>
            <?php
            echo $paginator->counter(array(
                'format' => 'Page %page% of %pages%, showing %current% records out of
			 %count% total, starting on record %start%, ending on %end%'
            ));
            ?>
        </td></tr>

</table>