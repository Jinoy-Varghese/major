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






	
	<form method="post" action="pgRedirect">
		
				
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