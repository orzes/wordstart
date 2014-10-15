<?php
/*file: index.php
  
  This application illustrates a Model-View-Controller MVC framework
  
  The Model: manages all database driven data in the application.
  The View: builds the html interface the user interacts with in the application.
  The Controller: manages user interaction (link, button events).
  
  This file, index.php is the "controller" script in the MVC framework
  Based on user input, a local $controller variable calls "model" functions, and builds appropriate "views".   */


require('model/database.php');
require('model/Student.php');  

$db=new Db();

if (isset($_POST['controller'])) {
    $controller = $_POST['controller']; 
} else if (isset($_GET['controller'])) {
    $controller = $_GET['controller'];
} else {
    $controller = 'booksList';// default
}

if (!isset($_SESSION['id=2']))
    //run logout/pageback and error not logged in,
    //or only show login error view
/*
--------------------------------------
Controller
--------------------------------------



--------------------------------------
Model
--------------------------------------
classrooms
lessons
students
database


--------------------------------------
Views
--------------------------------------
debugView.php
*/




/********** Debug View ****************************************************************************/

// include('view/debugView.php');
  
/**************************************************************************************************/


/**********  controller: list all books in database  **********************************************/
if ($controller == 'studentslist') {  
  $book=new Book();

  $bookResult=$book->getBooks();
    
  include('view/booksList.php');  
}  /***********************************************************************************************/


/**********  controller:  show the form to add a book  ********************************************/
else if ($controller == 'bookAddForm') {
  include('view/bookAddForm.php');  
}  /***********************************************************************************************/


/**********  controller: process the html form vars and INSERT a book record  *********************/
else if ($controller=='bookAddProcess') {
  // include('view/debugView.php');
  $book=new Book();

  $title=$_POST['title'];
  $publisher=$_POST['publisher'];
  $price=$_POST['price'];
  $first_name=$_POST['authorFirstName'];
  $last_name=$_POST['authorLastName'];
  $description=$_POST['description'];
   
  $bookResult=$book->addBook($title, $publisher, $price, $first_name, $last_name, $description);

  if($bookResult==1) {
    header("Location: index.php");
  }
  else {
    print '<p>The book was NOT successfully added.</p>';
  }
}  /***********************************************************************************************/


/**********  controller: show html form to add a new book  ***************************************/
else if ($controller=='bookUpdateForm') {
  // include('view/debugView.php');
  
  $book=new Book();
  $id=$_GET['id'];
  
  $bookResult=$book->getBook($id);
  $row=mysqli_fetch_assoc($bookResult);
  
  include('view/bookUpdateForm.php');
}  /***********************************************************************************************/


/**********  controller: process html form vars, build and execute INSERT query  ******************/
else if ($controller=='bookUpdateFormProcess') {
  // include('view/debugView.php');
  
  $book=new Book();

  $id=$_POST['id'];
  $title=$_POST['title'];
  $publisher=$_POST['publisher'];
  $price=$_POST['price'];
  $first_name=$_POST['authorFirstName'];
  $last_name=$_POST['authorLastName'];
  $description=$_POST['description'];
  
  $bookResult=$book->updateBook($id, $title, $publisher, $price, $first_name, $last_name, $description);

  if($bookResult==1) {
    header("Location: index.php?controller=booksManage");
  }
  else {
    print '<p>The book was NOT successfully updated.</p>';
  }
}  /***********************************************************************************************/


/**********  controller: show list of books with links to update and delete a book record  **********/
else if ($controller=='booksManage') {
  // include('view/debugView.php');

  $book=new Book();
  $bookResult=$book->getBooks();
  
  include('view/booksManage.php');  
}  /***********************************************************************************************/


/* *********  controller: process html form vars, build and execute INSERT query  ******************/
else if ($controller=='bookUpdateProcess') {
  // include('view/debugView.php');
  
  $book=new Book();

  $id=$_POST['id'];
  $title=$_POST['title'];
  $publisher=$_POST['publisher'];
  $price=$_POST['price'];
  $first_name=$_POST['authorFirstName'];
  $last_name=$_POST['authorLastName'];
  $description=$_POST['description'];
  
  $bookResult=$book->updateBook($id, $title, $publisher, $price, $first_name, $last_name, $description);

  if($bookResult==1) {
    header("Location: index.php?controller=booksManage");
  }
  else {
    print '<p>The book was NOT successfully updated.</p>';
  }
}  /***********************************************************************************************/


/**********  controller: execute delete query  *******************************************************/
else if ($controller=='bookDeleteProcess') {
  // include('view/debugView.php');
  
  $id=$_GET['id'];  
  $book=new Book();
  $bookResult=$book->deleteBook($id);

  if($bookResult==1) {
    header("Location: index.php?controller=booksManage");
  }
  else {
    print '<p>The book was NOT successfully added.</p>';
  }
}  /***********************************************************************************************/


/**********  controller: show html form to manage user input of title search term  ***************/
if ($controller == 'bookSearchTitleForm') {
 // include('view/debugView.php');
    
  include('view/bookSearchTitleForm.php');
}  /***********************************************************************************************/


/**********  controller: search book database using search term  **************************************/
if ($controller == 'bookSearchTitleProcess') {
  // include('view/debugView.php');
    
  $searchTerm=$_POST['searchTerm'];
  
  $book=new Book();
  $bookResult=$book->searchBooksByTitle($searchTerm);
    
  // the view bookList.php used with results of search  
  include('view/booksList.php');
}  /***********************************************************************************************/

    

?>