<?php

// configuration
require("../includes/config.php");

// if form was submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
	// Check if the userinputted anything
	if(empty($_POST["stock"]))
	{
		apologize("Вам нужно указать, какие акции продавать.");
	}
	else
	{
		$id = $_SESSION["id"];
		$stock = $_POST["stock"];

	// If the user doesn't own any of the stock, error message is displayed
	if(!$shares = CS50::query("SELECT shares FROM trade WHERE user_id = $id AND symbol = '$stock'")){
		apologize("У вас нет акций этой компании");
	}
	else{
	 	$value = lookup("$stock");
	 	$shares = $shares[0]["shares"];
	 	$price = $value["price"];
	 	$profit = $shares*$price;

	 	// Delete the stock from the users portfolio and update the balance
	 	CS50::query("DELETE FROM trade WHERE user_id = $id AND symbol = '$stock'");
	 	CS50::query("UPDATE users SET cash = cash + $profit WHERE id = $id");
	 	CS50::query("INSERT INTO history (id, symbol, status, shares, price) VALUES($id, '$stock', 'SELL', $shares, $price)");
	 	render("../views/sell_print.php", ["title" => "Sell", "value" => $value , "profit" => $profit]);
	 }
	}
}
else
{
  // else render form
  render("sell_form.php", ["title" => "Sell"]);
}


?>