<table>
	<thead>
		<td>Name</td>
		<td>Quantity</td>
		<td>Price(each)</td>
		<?php if($add_remove_button): ?> <td>Remove</td> <?php endif; ?>
	</thead>
	<tbody>
<?php
$total = 0;
foreach($cart_items as $category => $items):
	foreach ($items as $id=>$item):

?>

<tr>
	<td><?php echo $item['name']; ?></td>
	<td><?php echo $item['quantity']; ?></td>
	<td><?php echo $item['price']; ?></td>
	<?php if($add_remove_button): ?>
	<td>
		<?php
			echo $this->Form->create(false, array('controller'=>'Cart','action'=>'remove_item'));
			echo $this->Form->input('id', array('type'=>'hidden', 'value'=>$id));
			echo $this->Form->input('prodtype', array('type'=>'hidden', 'value'=>$category));
			echo $this->Form->end('X');
		?>
	</td>
<?php endif; ?>
</tr>

<?php 
$total += $item['price']*$item['quantity'];
endforeach;
endforeach; ?>
<tr>
	<td colspan='2' style="text-align:right">total</td>
	<td> <?php echo $total; ?> </td>
</tr>
</tbody>
</table>

