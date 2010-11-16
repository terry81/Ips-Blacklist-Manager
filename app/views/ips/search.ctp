<h1>Search</h1>

<?php
if (isset($ips)) {
if ($ips) {
?>
<table>
    <th>Id</th>
    <th>Ip</th>
    <th>Active</th>
    <th>Action</th>
    <tr>
        <td><?php echo $ips['Ip']['id']; ?></td>
        <td>
<?php echo $html->link(long2ip($ips['Ip']['ip']), array('action' => 'view', 'id' => $ips['Ip']['id'])); ?>
        </td>
        <td><?php echo $ips['Ip']['active']; ?></td>
        <td><?php echo $html->link('Change status', array('action' => 'change_status', 'id' => $ips['Ip']['id']), null, 'Are you sure?') ?>
        </td>
    </tr>
</table>
<?
            } else {
                 echo "Sorry, no results.";
            } }  else {
            echo $form->create('Ip', array('action' => 'search'));
            echo $form->input('ipn');
            echo $form->end('Search IP');
            }
?>