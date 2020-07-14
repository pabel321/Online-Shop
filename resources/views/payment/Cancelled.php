<html>
	<body>
		<h2>Cancelled Order Details</h2>
		<form action="http://127.0.0.1:80/CityBankPHP_1.0.1/">
			<table border=0 cellspacing=2 cellpadding=2>
				<?php
							 
					include 'Functions.php';
					if (@$_REQUEST['xmlmsg']!=""){

						$xmlResponse = simplexml_load_string($_REQUEST['xmlmsg']);
						//print_r($xmlResponse);
						$json = json_encode($xmlResponse);
						$array = json_decode($json,TRUE);
																								
						//Update existing Order XML by Cancelled Status
						$xmlData=new DOMDocument('1.0', 'utf-8');
						$xmlData->formatOutput = true;
						$xmlData->preserveWhiteSpace = false;
						$xmlData->load('Order.xml');
									
						//Get item element
						$element=$xmlData->getElementsByTagName('Order')->item(0);

						//Load child element
						$OrderID_Data=$element->getElementsByTagName('OrderID')->item(0);
						
						if(@$array[OrderID]==$OrderID_Data->nodeValue){
							$SessionID_Data=$element->getElementsByTagName('SessionID')->item(0);
							$Status_Data=$element->getElementsByTagName('Status')->item(0);
							$ApprovalCode_Data=$element->getElementsByTagName('ApprovalCode')->item(0);
							$PAN_Data=$element->getElementsByTagName('PAN')->item(0);
							
							//Replace old element with new
							$element->replaceChild($Status_Data, $Status_Data);
							$element->replaceChild($ApprovalCode_Data, $ApprovalCode_Data);
							$element->replaceChild($PAN_Data, $PAN_Data);

							//Assign element with new value
							$Status_Data->nodeValue = @$array[OrderStatus];
							$ApprovalCode_Data->nodeValue = "";
							$PAN_Data->nodeValue = "";
							$xmlData->save('Order.xml');							
						}
				?>
				<tr>
					<?php
					echo "<td align=left>Order ID</td>";
					echo "<td align=left>=</td>";
					echo "<td align=right>" . @$array[OrderID] . "</td>";
					?>
				</tr>
				<tr>
					<?php
					echo "<td align=left>Transaction Type</td>";
					echo "<td align=left>=</td>";
					echo "<td align=right>" . @$array[TransactionType] . "</td>";
					?>
				</tr>
				<tr>
					<?php
					echo "<td align=left>Currency</td>";
					echo "<td align=left>=</td>";
					echo "<td align=right>" . @$array[Currency] . "</td>";
					?>
				</tr>
				<tr>
					<?php
					echo "<td align=left>Purchase Amount</td>";
					echo "<td align=left>=</td>";
					echo "<td align=right>" . @$array[PurchaseAmount] / 100 . "</td>";
					?>
				</tr>	
				<tr>
					<?php
					echo "<td align=left>Order Status</td>";
					echo "<td align=left>=</td>";     
					echo "<td align=right>" . @$array[OrderStatus] . "</td>";
					}
					?>
				</tr>			
			</table>			
			<br/>
			<input type="submit" value="Back to Create Order"/>
		</form>
		<hr/>
	</body>
</html>