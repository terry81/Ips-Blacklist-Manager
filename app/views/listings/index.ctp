<h1>Reqests</h1>
<? $paginator->options(array('url' => $this->passedArgs)); ?>
<table>
    <th><?php echo $paginator->sort('ID', 'id'); ?></th>
    <th>Reason</th>
    <th>Action</th>


    <?php foreach ($listings as $request): ?>
        <tr>
            <td><?php echo $request['Listing']['id']; ?></td>
            <td><?php echo $request['Listing']['note']; ?></td>
        <td><?php echo $html->link('Attend', array('action' => 'attend', 'id' => $request['Listing']['id'], 'ip_id' => $request['Listing']['ip_id'])); ?>
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