<?php

// configuration
require("../includes/config.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){

		$id = $_SESSION["id"];

		$shares = $_POST["shares"];


	if($shares > 10000){
		apologize("Это слишком много дружище)))");
	}
	else if($shares <= 0){
	    apologize("сумма пополнения меньше 0");
	}
	else{

	 	// Delete the stock from the users portfolio and update the balance
	 	CS50::query("UPDATE users SET cash = cash + $shares WHERE id = $id");
	 	CS50::query("INSERT INTO history (id, status, shares) VALUES($id, 'REFILL', $shares)");
	 	render("../views/account_transactions_print.php", ["title" => "Account Transactions", "shares" => $shares]);
	 }
	}
else
{
  // else render form
  render("account_transactions_form.php", ["title" => "Account Transactions"]);
}


?>