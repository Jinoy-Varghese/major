<?php
	header("Pragma: no-cache");
	header("Cache-Control: no-cache");
	header("Expires: 0");
    
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Merchant Check Out Page</title>
<meta name="GENERATOR" content="Evrsoft First Page">
</head>
<body>


<style>
::-webkit-scrollbar
{
    display: none;
}
.ipay 
{
	position:absolute;
	margin-top:-400px;
}

.ipay input[type=number]
{
	width:250px;
	height:27px;
	margin-left:40px;
	border:none;
	border-bottom:2px solid blue;
	margin-top:20px;
}
::placeholder 
{
	font-size:17px;
}
.ipay input[type=submit]
{
	border:none;
	padding-top:4px;
	margin-top:80px;
	margin-left:40px;
	text-align:center;
	width:130px;
	height:35px;
	font-size:17px;
	font-family:arial;
	color:white;
	background: rgb(0,18,36);
background: linear-gradient(90deg, rgba(0,18,36,1) 0%, rgba(47,91,245,1) 0%, rgba(49,67,249,1) 100%);
}
</style>
    




	
	<form method="post" action="pgRedirect.php">
		
				
					<div style=display:none;>
					
					
					<input id="ORDER_ID" tabindex="1" maxlength="20" size="20"
						name="ORDER_ID" autocomplete="off"
						value="<?php echo  "ORDS" . rand(10000,99999999)?>">
					
				
					
					
					<input id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="CUST001">
				
					
					
					<input id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail">
				
				
					
					
					<input id="CHANNEL_ID" tabindex="4" maxlength="12"
						size="12" name="CHANNEL_ID" autocomplete="off" value="WEB">
					
				
				
</div>
<div class=ipay>
					
					<input title="TXN_AMOUNT" tabindex="10"
						type="number" name="TXN_AMOUNT"
						value=" " placeholder=" Amount">
					
				
				<br>
				<br>
					
					<input value="CheckOut" type="submit"	onclick="">
				
</div>
		
	</form>
</body>
</html>