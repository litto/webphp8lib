<?php include("header.php"); ?>
<?php
use Lablnet\Encryption;
$user = new User();
$users=$user->where('status=1')->fetchAll();

?>
<div class="container">

	<div class="row">  
<div class="col-md-10"> &nbsp;</div>
	<div class="col-md-2">	<a class="btn btn-primary" href="add.php"> Add Record </a></div>
		 </div>
   <?php $message  =   new Message('','');
       $message->showMessage();
       $message->clearmessage();
        ?>
<table class="table">
  <thead class="thead-dark">
  <tr> <th> Username </th> <th>Email </th> <th>Password </th><th>Full Name </th> <th>Date </th> <th>Status </th> <th>Action </th></tr>
</thead>
<tbody>
<?php
for($i=0;$i<count($users);$i++)
{ 

$encryption = new Encryption('openssl',$users[$i]->pass_key);
$password = $encryption->decrypt($users[$i]->password);

?>

  <tr> <td><?php echo $users[$i]->username; ?> </td> <td><?php echo $users[$i]->email; ?> </td> <td><?php echo $password; ?>  </td><td><?php echo $users[$i]->name; ?> </td> <td><?php echo $users[$i]->date_create; ?> </td> <td> <?php if($users[$i]->status=="1") { echo '<span style="color:green;"> Active </span>'; } else { echo '<span style="color:red;"> Inactive </span>';  }  ?> </td> <td><a class="btn btn-success" href="edit.php?id=<?php echo base64_encode($users[$i]->id); ?>"> Edit </a> | <a class="btn btn-danger" href="delete.php?id=<?php echo base64_encode($users[$i]->id); ?>"> Delete </a> </td></tr>

<?php
}
?>
</tbody>
</table>
</div>
<?php include("footer.php"); ?>