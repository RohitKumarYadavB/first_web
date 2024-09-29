<html>
<title>Hotelbooking</title>
<head>
<style>
h1{
padding:10px;
margin: 5px;
color:blue;
text-align: center;
font-size: 200%;
}
#logo{
height: 50px;
width: 50px;
border: 2px solid black;
border-radius: 25px;
}
header{
display: flex;
justify-content: space-around;
align-items: center;
background-color: orange;
border: 2px solid black;
margin: 10px;
}
table{
width: 100%;
margin: 5px;
font-weight: bold;
color:margin: 5px;;
background: blue;
text-align: center;
border: 2px solid black;
}
h2{
padding:2px,0 ;
margin:1px;
color:blue;
text-align: center;
}
select{
margin: 5px;
padding: 2px;
background-color: green;
}
div{
width: 50%;
height: 450px;
margin: auto;
background-image:url("itc.jpg");
border: 2px solid black;
padding-top: 50px;
}
button{
background-color:pink;
padding: 5px;
border-radius: 5px;
border: none;
}
button:hover{
background-color: brown;
}
body{
    background-image:url("kolkata-india.jpg");
background-repeat: no-repeat;
background-size: cover;
}

</style>


</head>
<body>
<header>

<img src="kolkata-india-asia-round-icon-vector-art-flat-shadow-design-skyline-city-silhouette-template-logo-skyline-emblematic-111680432.jpg" alt="logo image" id="logo" >

<h1>Welcome To Hotel ITC Royal Bengal </h1>
<button><a href="Homepage.php">Homepage</a></button>
</header>
</head>
<body>
<?php
$msg = "";
$conn=mysqli_connect("localhost","root","","hotel booking");
if($conn==false){
die("Connection failed.". mysqli_connect_error());
}
if(isset($_POST["submit"]))
{
$Firstname = $_POST["Firstname"];
$Lastname = $_POST["Lastname"];
$ContactNo=$_POST["ContactNo"];
$Gender=$_POST["Gender"];
$Emailid=$_POST["Emailid"];
$Yourcountry=$_POST["Yourcountry"];
$Yourstate=$_POST["Yourstate"];
$Yourcity=$_POST["Yourcity"];
$sql = "insert into booking
values('$Firstname','$Lastname',$ContactNo,'$Gender','$Emailid','$Yourcountry','$Yourstate','$Yourcity')";
$result=mysqli_query($conn,$sql);
$msg = "<center><font color='black'>reservation submitted succesfully</font></center>";
}
?>
</body>
<form action="index.php" method="post">
<div class="container">
<center>
<h2>Hotel Reservation From</h2><h3>Basic Details</h3>
<label>Firstname</label>
<input type="text" name="Firstname" class="input" ><br><br>
<label>Lastname</label>
<input type="text" name="Lastname" class="input"><br><br>
<label>ContactNo</label>
<input type="number" name="ContactNo" class="input"><br><br>
<label>Gender</label>

<select name="Gender" class="selectbox">
<option value="Male">Male</option>
<option value="Female">Female</option>
<option value="Other">Other</option>
</select><br><br>

<label>Emailid</label>

<input type="text" name="Emailid" class="input"><br><br>

<label>Yourcountry</label>

<input type="text" name="Yourcountry" class="input"><br><br>

<label>Yourstate</label>

<input type="text" name="Yourstate" class="input"><br><br>

<label>Yourcity</label>

<input type="text" name="Yourcity" class="input"><br><br>

<input type="submit" class="btn" name="submit"><br><br>
</center>
<?php echo $msg; ?>
</div>
</form>
</html>