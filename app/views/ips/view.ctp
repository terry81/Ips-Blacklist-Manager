<h1>IP Info Page</h1>
<b>Id:</b> <?php echo $ip['Ip']['id'] ?><br>
<b>Ip:</b> <?php echo long2ip($ip['Ip']['ip']) ?><br>
<b>Currently active:</b> <?php echo $ip['Ip']['active'] ?><br>
<b>Comments </b>
<table>
    <th>Created</th>
    <th>Abuse type</th>
    <th>Note</th>
    <th>Reported from IP</th>
    <th>Reported by</th>

<?php foreach ($ip['Comment'] as $comment): ?>
        <tr>
            <td><?php echo $time->niceShort($comment['created']); ?></td>
            <td><?php echo $comment['type']; ?></td>
            <td><?php echo $comment['note']; ?></td>
            <td><?php echo long2ip($comment['reporterip']); ?></td>
            <td><?php echo $comment['user_id']; ?></td>
    </tr>
    <?php endforeach; ?>
</table>

<?php echo $html->link('Change status', array('action' => 'change_status', 'id' => $ip['Ip']['id']), null, 'Are you sure?') ?>
