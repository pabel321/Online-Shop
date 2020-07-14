<html>
	<body>
		<h1>Test Merchant of CBLPG</h1>
		<h2>Create Order Operation</h2>
		<form method="post" action="{{url('city_bank_order')}}">
			<table cellpadding="0" cellspacing="0">
				<tr>
					<td><p>Merchant :</p></td>
					<td><input type="text" size="25" name="Merchant" value="11122333"/></td>
				</tr>
				<tr>
					<td><p>Amount :</p></td>
					<td><input type="text" size="25" name="Amount" value="1"/></td>
				</tr>
				<tr>
					<td><p>Currency :</p></td>
					<td><input type="text" size="25" name="Currency" value="050"/></td>
				</tr>
				<tr>
					<td><p>Description :</p></td>
					<td><input type="text" size="25" name="Description" value="Test Product"/></td>
				</tr>
				<tr>
					<td><p>ApproveURL :</p></td>
					<td><input type="text" size="50" name="ApproveURL" value="http://127.0.0.1:80/CityBankPHP_1.0.1/Approved.php" readonly/></td>
				</tr>
				<tr>
					<td><p>CancelURL :</p></td>
					<td><input type="text" size="50" name="CancelURL" value="http://127.0.0.1:80/CityBankPHP_1.0.1/Cancelled.php" readonly/></td>
				</tr>
				<tr>
					<td><p>DeclineURL :</p></td>
					<td><input type="text" size="50" name="DeclineURL" value="http://127.0.0.1:80/CityBankPHP_1.0.1/Declined.php" readonly/></td>
				</tr>
				<input type="hidden" name="order_id" value="{{$order_id}}">
			</table>	
				
			<br/>
			<input type="submit" value="Create Order"/>
		</form>
		<hr/>
	</body>
</html>

