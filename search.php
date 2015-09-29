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
if(isset($_POST['key']))
{
	$key=$_POST['key'];

	mysql_connect("localhost","oyasissp_lamprds","lrkashyap@1490") or die(mysql_error());
mysql_select_db("oyasissp_lampreads") or die(mysql_error());

	$select=mysql_query("SELECT * FROM offer WHERE bname LIKE '$key%' OR author LIKE '$key%' OR keywords LIKE '%$key%' ") or die(mysql_error());
	if(mysql_num_rows($select)>=1)
	{

	while(($res=mysql_fetch_assoc($select))!== false)
	{
		echo "Book name :<b>".$res['bname']."</b><br>";
	echo "Author :<b>".$res['author']."</b><br>";


	echo "<img oncontextmenu='return false' height=50px width=50px src=".$res['adr']."><br>";
	echo "<a href=fullview.php?bid=".$res['bid'].">View details</a><br>";

	}
}
else
{
	echo "no results found";
}
}
else
{
echo "Forbidden entry";
}
?>