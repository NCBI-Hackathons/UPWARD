<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<META NAME="Description" CONTENT="Rays Jiang is a scientist of systems biology. She performs data-driving research of infectious diseases and public health. ">
<META NAME="Keywords" CONTENT="Rays Jiang,USF,science, bioinformatics,computational biology">
<title>Rays Jiang Lab</title>
<style type="text/css">
<!--
body {
	font: 100%/1.4 Verdana, Arial, Helvetica, sans-serif;
	background: #FFF;
	margin: 0;
	padding: 0;
	color: #000;
}

/* ~~ Element/tag selectors ~~ */
ul, ol, dl { 
	padding: 0;
	margin: 0;
}
h1, h2, h3, h4, h5, h6, p {
	margin-top: 0;	 
	padding-right: 15px;
	padding-left: 15px; 
}
a img { /* this selector removes the default blue border displayed in some browsers around an image when it is surrounded by a link */
	border: none;
}
/* ~~ Styling for your site's links must remain in this order - including the group of selectors that create the hover effect. ~~ */
a:link {
	color: #FFF;
	text-decoration: underline; /* unless you style your links to look extremely unique, it's best to provide underlines for quick visual identification */
}
a:visited {
	color: #FFF;
	text-decoration: underline;
}
a:hover, a:active, a:focus { /* this group of selectors will give a keyboard navigator the same hover experience as the person using a mouse. */
	text-decoration: none;
}

/* ~~ this fixed width container surrounds the other divs ~~ */
.container {
	width: 960px;
	background: #FFF;
	margin: 0 auto; 
}


.header {
	background: #FFF;
	color: #030;
}



.content {

	padding: 100px 0;
}

/* ~~ The footer ~~ */
.footer {
	padding: 20px 0;
	background: #CCC49F;
}

/* ~~ miscellaneous float/clear classes ~~ */
.fltrt {  
	float: right;
	margin-left: 8px;
}
.fltlft {
	float: left;
	margin-right: 8px;
}
.clearfloat { 
	clear:both;
	height:0;
	font-size: 1px;
	line-height: 0px;
}
.container .header p {
	font-family: Arial, Helvetica, sans-serif;
}

</style>

<style type="text/css"> 
   #LinkHolder{
    position: relative;
    width: 450px;
    height: 35px;
	top:-100px;
	left:50px;
	font-size:23px;
	color:#FFF;
	background-color:#083469;
	text-decoration: underline;
}   
 
    #PageTitle{
    position: relative;
    width: 400px;
    height: 35px;
	top:-135px;
	left:500px;
	font-size:23px;
	color: #FFF;
	background-color: #083469;
	text-decoration:none;
}    


	#PictureHolder_1{
	position: relative;
    width: 1100px;
    height: 500px;
	top:-200px;
	left:50px;
	}

    #TextHolder1{
    position: relative;
    width: 800px;
    height: 1000px;
	top:-300px;
	left:50px;
	font-size:16px;
	color:#000;
	}
	#PictureHolder_2{
	position: relative;
    width: 1000px;
    height: 500px;
	top:-1715px;
	left:50px;
	}

    #TextHolder2{
    position: relative;
    width: 800px;
    height: 500px;
	top:-1100px;
	left:50px;
	font-size:16px;
	color:#000;
	}
	}
	
</style> 


</head>

<body>

<div class="container">
    <div class="header"><!-- end .header -->
  </div>
  
  <div class="content"><!-- end .content -->
  <div id='LinkHolder'> <a href="./index.html" ><p> Go back to lab homepage</p></a>  </div>
  <div id='PageTitle'><p> Research Projects </p> </div>
  
  <div class="content"><!-- end .content -->

  <div id='PictureHolder_1'>    <img src="images/P_F_pop.png" width="800" height="300" > </div>
	  
<div id='TextHolder1'>

	<b><h1>You can help.</h1><p> The patients and families can be helped by us. WE can provide insights into genetic mechanisms of rare diseases. You can help by filling the following form. </p>

<br><br> </p>
</div>	  
  	  
  <div id='TextHolder2'>
	  <?php
	  $DisplayForm = True;
	  if(isset($_POST['submit'])){
		  $fname = $_POST['fname'];
		  $lname = $_POST['lname']; 	
/**
-Do you exercise regularly? How often and what intensity?
*/
		  
		  
		  $file = fopen("DDDD.txt","w+")or die ("file not open");//create and open text files
		  
		  $s = $fname.",".$lname."\n";
		  fputs($file,$s ) or die ("Data not write"); //write single line
		  
		  fclose($file);
		  
		  
	  $DisplayForm = False;
	  echo "<h4>Thank you for your help!</h4>";
		  
	  }
	  
	  if ($DisplayForm){
 ?>
	  <form action = "DDDD_forms.php" method="post">
		  Please fill in your legal first name:<font color=red>*</font> <input type="text" name="fname"><br/>
		  Please fill in your legal last name: <font color=red>*</font> <input type="text" name ="lname"><br/>
		  What is your gender?: <font color=red>*</font> <input type="text" name ="gender"><br/>
		  What is date of your birth? day/month/year: <font color=red>*</font> <input type="text" name ="birth"><br/>
		  <br/><br/>
		  What is your self-identified ethnicity? <input type="text" name ="race"><br/>
		  What is your birth country?<input type="text" name ="country"><br/>
		  <br/><br/>
		  Have you been diagnosed with porphyria? e.g. (Acute Intermittent Porphyria, ALA-D Porphyria, Congenital Erythropoietic Porphyria, Herditary Coproporphyria, Porphyria Cutanea Tarda, Protoporphyria, Variegate Porphyria)<input type="text" name ="porphyria"><br/>
		  <br/><br/>
		  Do you drink alcohol? How often?<input type="text" name ="alcohol"><br/>
		  Do you smoke tobacco? How often?<input type="text" name ="tobacco"><br/>
		  Do you use drugs? What type and how often?<input type="text" name ="drug"><br/>
		  Are you exposed to toxic substances (i.e., treated lumber, lead paint, paint chips or dust, broken mercury thermometers or fluorescent bulbs, etc.) at home or work? <input type="text" name ="toxin"><br/>
		  Do you live in an apartment or home built before 1978, or in a mobile home, boat, or RV? <input type="text" name ="home"><br/>
		  <br/><br/>
		  Other relavent information: <textarea name="about"></textarea><br/>
		  <br/><br/>
		  <input type ="reset" name="reset">
		  <input type = "submit" name = "submit" value="Go">
		  </form>
	  <?php
}
?>	  
	
</div>
	  
	  

  <!-- end .container --></div>
</body>
</html>









