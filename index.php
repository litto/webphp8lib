<?php include("header.php"); ?>
<?php
use Lablnet\Encryption;
$user = new User();
$users=$user->where('status=1')->fetchAll();

?>
<div class="container">
<table class="table">
  <thead class="thead-dark">
  <tr> <th> Username </th> <th>Email </th> <th>Password </th><th>Full Name </th> <th>Date </th> <th>Status </th> <th>Action </th></tr>
</thead>
<tbody>
<?php
for($i=0;$i<count($users);$i++)
{ 

$encryption = new Encryption('openssl',$users[0]->pass_key);
$password = $encryption->decrypt($users[0]->password);

?>

  <tr> <td><?php echo $users[$i]->username; ?> </td> <td><?php echo $users[0]->email; ?> </td> <td><?php echo $password; ?>  </td><td><?php echo $users[$i]->name; ?> </td> <td><?php echo $users[$i]->date_create; ?> </td> <td> <?php if($users[$i]->status=="1") { echo '<span style="color:green;"> Active </span>'; } else { echo '<span style="color:red;"> Inactive </span>';  }  ?> </td> <td><a href="edit.php?id=<?php echo base64_encode($users[$i]->auth_id); ?>"> Edit </a> | <a href="delete.php?id=<?php echo base64_encode($users[$i]->auth_id); ?>"> Delete </a> </td></tr>

<?php
}
?>
</tbody>
</table>
</div>
<?php include("footer.php"); ?>