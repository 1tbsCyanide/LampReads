
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>Welcome to LampReads</title>

    <!-- Bootstrap core CSS -->
      <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom styles for this template -->
    <link href="css/offcanvas.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<style>
	li {
    float: right;
}


	</style>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

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
         
            <li ><a href="#">About</a></li>
            <li><a  href="postadd.php" ><button class="btn btn-primary">Post offer</button></a></li>
           <!--  <li> <form style="margin:10px;margin-right:30px;"  action="search.php" method="post">
            <input style="border-radius:10px;"onkeyup="dyn();" type="text" name="key" placeolder="Search ">
            
          </form></li>-->
          </ul>
          <form class="navbar-form navbar-left" action="search.php" method="post" role="search">
        <div class="form-group">
          <input type="text" class="form-control" name="key" placeholder="Search">
        </div>
       
      </form>
        </div><!-- /.nav-collapse -->
      </div><!-- /.container -->
    </div><!-- /.navbar -->

    <div class="container">

      <div class="row row-offcanvas row-offcanvas-right">

        <div class="col-xs-12 col-sm-9">
          <p class="pull-right visible-xs">
            <button type="button" class="btn btn-primary btn-xs" data-toggle="offcanvas">Menu</button>
          </p>
          <!--<div class="jumbotron">
            <h1>Hello, world!</h1>
            <p>This is an example to show the potential of an offcanvas layout pattern in Bootstrap. Try some responsive-range viewport sizes to see it in action.</p>
          </div> -->
          <div class="row">
          <?php

if($_GET['id']=="")
{
	echo "error";
}
$id=$_GET['id'];

mysql_connect("localhost","oyasissp_lamprds","lrkashyap@1490") or die(mysql_error());
mysql_select_db("oyasissp_lampreads") or die(mysql_error());

$q = mysql_query("SELECT * FROM offer WHERE course = '$id' ORDER BY bid DESC ");

if(mysql_num_rows($q)>0)
{

while(($res=mysql_fetch_assoc($q))!==false)
{
	echo '  <div style="background:white;color:black;padding-bottom:5px;border:1px solid rgba(0,0,0,0.7);" class="col-6 col-sm-6 col-lg-4">';
	echo "<h3>".$res['bname']."</h3>";
	echo "<h4>Author :<b>".$res['author']."</b></h4>";

	echo "<p><img oncontextmenu='return false' height=125px width=75px src=".$res['adr']."></p>";
	echo "<a class='btn btn-primary' href=fullview.php?bid=".$res['bid'].">View details</a><br>";
	echo "</div>";
}
}
else
{
	echo"Page not found";
}



?>


                        
          </div><!--/row-->
        </div><!--/span-->

        <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
          <div class="list-group">
          <a href="index.html" class="list-group-item active">Home</a>
            <a href="other.html" class="list-group-item ">Other Books</a>
            <a href="#" class="list-group-item">Happenings</a>
            <a href="#" class="list-group-item">ABout Us</a>
            <a href="#" class="list-group-item">Feedback</a>
           <!-- <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a>
            <a href="#" class="list-group-item">Link</a> -->
          </div>
        </div><!--/span-->
      </div><!--/row-->

      <hr>

      <footer>
        <p>&copy; Company 2014</p>
      </footer>

    </div><!--/.container-->



    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/offcanvas.js"></script>
  </body>
</html>



