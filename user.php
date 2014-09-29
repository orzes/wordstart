<?php

session_start();

include_once("../classes/User.php");
include_once("../classes/Db.php");
$DB=new Db();

// create tests for Entity: 
// getEntity($id), getEntities(), displayEntity($id), displayEntities(),
// addEntity($array), updateEntity($array), deleteEntity($id)


$newuser = new User();

if (0) {
  print "<p>1 generic get and show </p>";
  $userid=9;
  
  $userarray=$newuser->getUser($userid);
  $newuser->showUser($userarray);  
  echo '<br /><br />';
}

if (0) {
  print "<p>2 show all users</p>";
  $result=$newuser->getAllUsers();
  $newuser->showAllUsers($result);
  echo '<br /><br />';
}

if(1) {
  print "<p>3 insertUser(array)</p>";
  // define post vars
  // $p['user_id']= 99;  taken care of by autoincrement
  $p['role_id']=  9; 
  $p['user_name']= 'user name559'; 	
  $p['password']= 'password559' ; 	
  $p['first_name']='first559'; 	
  $p['last_name']='last559';	
  $p['email']='email559';	
  $p['address1']='addr 1 559';	
  $p['address2']='addr 2 559'; 	
  $p['city']='city559'; 	
  $p['state']='ny'; 	
  $p['zip']='zip559';
  $p['phone']='phone559'; 	
  $p['hear_about']='hear about559';
  
  $last=$newuser->insertUser($p);
  $userarray=$newuser->getUser($last);
  $newuser->showUser($userarray); 
  
  echo '<br /><br />';
}


if(0) {
  print "<p>4 update($ id, $ array)</p>";
  
  // define post vars
  $id= 105;  // must define for update query WHERE
  $p['role_id']=8; 
  $p['user_name']= 'user name601'; 	
  $p['password']= 'password 601' ; 	
  $p['first_name']='first601'; 	
  $p['last_name']='last601';	
  $p['email']='email601';	
  $p['address1']='addr 601';	
  $p['address2']='addr 601'; 	
  $p['city']='city601'; 	
  $p['state']='state601'; 	
  $p['zip']='zip601';
  $p['phone']='phone601'; 	
  $p['hear_about']='hear about601';
   
  $newuser->updateUser($id, $p);  
  $user=$newuser->getUser($id); 
  $newuser->showUser($user);  
  echo '<br /><br />';
}


if(0) {
  print "<p>5 delete($ userid)</p>";
  $userid=5;
  
  $newuser->deleteUser($userid);
  echo '<br /><br />';
}

if(0) {
  print "<p>6 login(u, p)</p>";
  
  // user name550
  // Password: password550
  $u='username708';
  $p='password708';
  $newuser->login($u, $p);

  print "<p>Session vars: <p>"; print_r($_SESSION);
  echo '<br /><br />';
}



?>