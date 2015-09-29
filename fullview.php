<!DOCTYPE html>
<html>
<head>
	<title>Title here</title>
</head>
<link href="css/bootstrap.min.css" rel="stylesheet">
<body>
<div class="navbar navbar-fixed-top navbar-inverse" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="index.html">LampReads</a>

          
        </div>

        <div class="collapse navbar-collapse">
          <ul class="nav navbar-nav pull-right">
         
            <li><a href="#">About</a></li>
            <li><a href="postadd.php"><button class="btn btn-primary">Post offer</button></a></li>
           <!--  <li> <form style="margin:10px;margin-right:30px;"  action="search.php" method="post">
            <input style="border-radius:10px;"onkeyup="dyn();" type="text" name="key" placeolder="Search ">
            
          </form></li>-->
          </ul>
          <form action="search.php" method="post" class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" name="key" class="form-control" placeholder="Search">
        </div>
       
      </form>
        </div><!-- /.nav-collapse -->
      </div><!-- /.container -->
    </div>


</body>
</html>
<?php
if($_GET['bid']=="")
{
	echo "error";
}
$id=$_GET['bid'];

mysql_connect("localhost","oyasissp_lamprds","lrkashyap@1490") or die(mysql_error());
mysql_select_db("oyasissp_lampreads") or die(mysql_error());
$q = mysql_query("SELECT * FROM offer WHERE bid = '$id' ORDER BY bid DESC ");

if(mysql_num_rows($q)>0)
{

while(($res=mysql_fetch_assoc($q))!==false)
{
	echo "<img oncontextmenu='return false' height=150px width=150px src=".$res['adr']."><br>";
	echo "Book name :<b>".$res['bname']."</b><br>";
	echo "Author :<b>".$res['author']."</b><br>";
	echo "Seller :<b>".$res['sname']."</b><br>";
	echo "Contact :<b>".$res['scontact']."</b><br>";
	echo "Email :<b>".$res['semail']."</b><br>";
	echo "Price :<b>".$res['price']."</b><br>";
	
	
}
}
else
{
	echo"Page not found";
}



?>