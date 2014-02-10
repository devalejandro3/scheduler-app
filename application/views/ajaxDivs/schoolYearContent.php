<input type='hidden' value='' id='selectedSchoolYearId'/>
<table id="schoolYearTable" class="CSSTableGenerator" style="width:441px;">
	<tbody>
		<tr class="ui-widget-header ">
			<td>Id</td>
			<td>School Year</td>
			<td>Remarks</td>
			<td></td>
			</tr>
				<?php 

				if(sizeOf($schoolYearList) > 0 ){

				

				foreach($schoolYearList as $row): 

				?>
			<tr> 	
				<td><?php echo $row->id; ?></td>
				<td><?php echo $row->schoolyear; ?></td>
				<td><?php echo $row->remarks; ?></td>
				<td><a class='deleteButton' href='#'>Delete</a> /
					<a class='updateButton' href='#'>Update</a>
				</td>
			</tr>
			<?php endforeach; } else { ?> <tr><td colspan='4' style='text-align:center;'>Please add new School Year</td></tr> <?php }?>
	</tbody>
</table>