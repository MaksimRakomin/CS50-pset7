<?php

// configuration
require("../includes/config.php");

// if form was submitted
if($_SERVER["REQUEST_METHOD"] == "POST")
{
	 if(empty($_POST["stock"]) || empty($_POST["shares"]) || !preg_match("/^\d+$/", $_POST["shares"]) ||
	  								($_POST["shares"] < 0 ))
	 {
	 	if(empty($_POST["stock"]))
	 	{
	 		apologize("Вы должны указать акции для покупки");
	 	}
	 	else if(empty($_POST["shares"]) || !preg_match("/^\d+$/", $_POST["shares"]) ||
	 								($_POST["shares"] < 0 ))
	 	{
	 		apologize("Вам нужно указать целые количества акций.");
	 	}
	 }else
	 {
	 	$symbol = strtoupper($_POST["stock"]);

	 	// If the cost is more then the balanc of the user, an error message is displayed
 		if($stock = lookup($symbol) === false)
 		{
 			apologize("Этот запас не существует.");
 		}else
 		{
 			$stock = lookup($symbol);
 			$id = $_SESSION["id"];
	 		$shares = $_POST["shares"];
	 		$price = $stock["price"];
	 		$cash = CS50::query("SELECT cash FROM users WHERE id = $id");
	 		$cost = $price*$_POST["shares"];
 			if($cost > $cash[0]["cash"])
		 	{
		 		apologize("У вас недостаточно денег, чтобы купить ". $shares . " акций от " . $stock["name"] . ".");
		 	}else
		 	{
		 		CS50::query("INSERT INTO trade (user_id, symbol, shares) VALUES($id, '$symbol', $shares) ON DUPLICATE KEY UPDATE shares = shares + $shares");
		 		CS50::query("UPDATE users SET cash = cash - $cost WHERE id = $id");
		 		CS50::query("INSERT INTO history (id, symbol, status, shares, price) VALUES($id, '$symbol', 'BUY', $shares, $price)");
		 		render("../views/buy_print.php", ["title" => "Buy", "stock" => $stock, "cost" => $cost, "shares" => $shares]);
		 	}
	 	}
	 }
}
else
{
  // else render form
  render("buy_form.php", ["title" => "Buy"]);
}


?>
