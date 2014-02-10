<input type='hidden' value='' id='selectedUserId'/>
<table id="usersTable" class="CSSTableGenerator" style="width:441px;">
	<tbody>
		<tr class="ui-widget-header ">
			<td>Id</td>
			<td>Username</td>
			<td>Fullname</td>
			<td></td>
			</tr>
				<?php 

				if(sizeOf($usersList) > 0 ){

				

				foreach($usersList as $row): 

				?>
			<tr> 	
				<td><?php echo $row->id; ?></td>
				<td><?php echo $row->username; ?></td>
				<td><?php echo $row->FullName; ?></td>
				<td><a class='deleteButton' href='#'>Delete</a> /
					<a class='updateButton' href='#'>Update</a>
				</td>
			</tr>
			<?php endforeach; } else { ?> <tr><td colspan='4' style='text-align:center;'>Please add new user</td></tr> <?php }?>
	</tbody>
</table>