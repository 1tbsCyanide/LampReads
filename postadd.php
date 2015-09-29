<!DOCTYPE html>

</body>
</html>

<html>
<head>
	<title>Post your adds</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/offcanvas.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="js/ie-emulation-modes-warning.js"></script>

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
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

	<script type="text/javascript">

		function checker()
		{
				

				if(document.getElementById("bname").value.length==0)
				{
					alert("Book name null value");
					return false;
				}
					if(document.getElementById("author").value.length==0)
				{
					alert("Author name null value");
					return false;
				}
								if(document.getElementById("sname").value.length==0)
				{
					alert("User name null value");
					return false;
				}
									if(document.getElementById("scontact").value.length<10)
				{
					alert("Contact null value");
					return false;
				}
				if(isNaN(document.getElementById("scontact").value))
				{
					alert("Char values for Number Not accepted");
					return false;
				}

									if(document.getElementById("price").value.length==0)
				{
					alert("Price null value");
					return false;
				}
				if(isNaN(document.getElementById("price").value))
				{
					alert("Char values for Number Not accepted");
					return false;
				}
				var x = document.getElementById("semail").value;
				
				var atpos = x.indexOf("@");
			
    var dotpos = x.lastIndexOf(".");
 
    if (atpos< 1 || dotpos<atpos+2 || dotpos+2>=x.length) {
        alert("Not a valid e-mail address");
        return false;
    }



		}


	</script>
	<div class="container">
	<form action="postadd.php" onsubmit="return checker();" method="post" role="form" class="form-horizontal" enctype="multipart/form-data">
			<label for="bname">Book name</label><input type="text" placeholder="Book name" id="bname" name="bname" ><br>
			<label for="author">Book Author</label><input type="text" id="author" placeholder="Author name" name="author"><br>
			<label for="dept">Department</label><select name="dept">
					<option value="aib">AIB</option>
					<option value="aset">ASET</option>
					<option value="abs">ABS</option>
					<option value="als">ALS</option>
					<option value="asco">ASCO</option>
					<option value="asap">ASAP</option>

			</select><br>
			<label for="keywords">Keywords</label><textarea name="keywords"></textarea>	<br>
			<label for="sname">Your name</label><input id="sname" placeholder="Your name" type="text" name="sname"><br>
			<label for="semail">Your email</label><input id="semail" placeholder="Email Address" type="text" name="semail"><br>
			<label for="scontact">Your contact</label><input type="text" id="scontact" placeholder="Phone no" name="scontact"><br>
			<label for="price">Price</label><input type="text" id="price" placeholder="price" name="price"><br>
			<label for="file">Upload</label><input type="file"  name="file"><br>

			<input type="submit" name= "submit"  class="btn btn-primary" value="Post your Ad">
	</form>
</div>
</body>
<?php
if(isset($_POST['submit']))
{
	mysql_connect("localhost","oyasissp_lamprds","lrkashyap@1490") or die(mysql_error());
mysql_select_db("oyasissp_lampreads") or die(mysql_error());
 $bname = htmlspecialchars($_POST['bname']);
 $author = htmlspecialchars($_POST['author']);
 $keywords = htmlspecialchars($_POST['keywords']);
 $sname = htmlspecialchars($_POST['sname']);
 $semail = htmlspecialchars($_POST['semail']);


 $fn = $_FILES['file']['name'];
 if($fn!=="")
 {

 
$to = "uploads/".md5($bname.$author.$sname).$fn;


move_uploaded_file($_FILES['file']['tmp_name'], $to) or die(mysql_error());
}

else
{

	$to="uploads/default.png";
}
$bid = md5($bname."".time()) or die(mysql_error());

mysql_query("INSERT INTO offer(bid,bname,author,keywords,course,sname,semail,scontact,price,adr) VALUES ('$bid','$bname','$author','$keywords','$_POST[dept]','$sname','$semail','$_POST[scontact]','$_POST[price]','$to')") or die(mysql_error());
echo "Success";
}



?>
</html>