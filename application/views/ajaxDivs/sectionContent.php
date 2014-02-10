<input type='hidden' value='' id='selectedUserId'/>
<table id="sectionTable" class="CSSTableGenerator" style="width:441px;">
	<tbody>
		<tr class="ui-widget-header ">
			<td>Id</td>
			<td>Section</td>
			<td>Description</td>
			<td></td>
			</tr>
				<?php 

				if(sizeOf($sectionList) > 0 ){

				

				foreach($sectionList as $row): 

				?>
			<tr> 	
				<td><?php echo $row->id; ?></td>
				<td><?php echo $row->name; ?></td>
				<td><?php echo $row->description; ?></td>
				<td><a class='deleteButton' href='#'>Delete</a> /
					<a class='updateButton' href='#'>Update</a>
				</td>
			</tr>
			<?php endforeach; } else { ?> <tr><td colspan='4' style='text-align:center;'>Please create new section</td></tr> <?php }?>
	</tbody>
</table>