<?php include("header.php"); ?>
<?php
use Lablnet\Encryption;
$user = new Administrator();
$users=$user->where('isactive=1')->fetchAll();

?>
<div class="container">

    <div class="row">
<?php include("sidebar.php");  ?>
 
 <div class="col-md-9"> 


	<div class="row">  
<div class="col-md-10"> &nbsp;</div>
	<div class="col-md-2">	<a class="btn btn-primary" href="addadministrator.php"> Add Record </a></div>
		 </div>
   <?php $message  =   new Message('','');
       $message->showMessage();
       $message->clearmessage();
        ?>
<table class="table">
  <thead class="thead-dark">
  <tr> <th>Email </th> <th>Date </th> <th>Status </th> <th>Action </th></tr>
</thead>
<tbody>
<?php
for($i=0;$i<count($users);$i++)
{ 



?>

  <tr>  <td><?php echo $users[$i]->email; ?> </td> <td><?php echo $users[$i]->dt; ?> </td> <td> <?php if($users[$i]->isactive=="1") { echo '<span style="color:green;"> Active </span>'; } else { echo '<span style="color:red;"> Inactive </span>';  }  ?> </td> 

    <td>

      <a class="btn btn-warning" href="edit_adminemail.php?id=<?php echo base64_encode($users[$i]->id); ?>"> Change Email </a> |
      <a class="btn btn-success" href="edit_adminpass.php?id=<?php echo base64_encode($users[$i]->id); ?>"> Change Password </a> |
       <a class="btn btn-danger" href="delete_admin.php?id=<?php echo base64_encode($users[$i]->id); ?>"> Delete </a>



     </td></tr>

<?php
}
?>
</tbody>
</table>
</div>
</div>
<?php include("footer.php"); ?>