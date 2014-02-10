<input type='hidden' value='' id='selectedDepartmentId'/>
<table id="departmentTable" class="CSSTableGenerator" style="width:441px;">
	<tbody>
		<tr class="ui-widget-header ">
			<td>Id</td>
			<td>Department</td>
			<td>Description</td>
			<td></td>
			</tr>
				<?php 

				if(sizeOf($departmentList) > 0 ){

				

				foreach($departmentList as $row): 

				?>
			<tr> 	
				<td><?php echo $row->id; ?></td>
				<td><?php echo $row->name; ?></td>
				<td><?php echo $row->description; ?></td>
				<td><a class='deleteButton' href='#'>Delete</a> /
					<a class='updateButton' href='#'>Update</a>
				</td>
			</tr>
			<?php endforeach; } else { ?> <tr><td colspan='4' style='text-align:center;'>Please create new department</td></tr> <?php }?>
	</tbody>
</table>