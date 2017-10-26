<?php

    //configuration
    require("../includes/config.php");

    // если метод отправки POST тогда:
    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        //Если поле символ пустое тогда выдаем ошибку
        if(empty($_POST["symbol"]))
        {
            apologize("Invalid Stock Symbol");
        }
        //Если введенный символ отсутствует выдаем ошибку
        else if(lookup($_POST["symbol"])==false)
        {
            apologize("Symbol not found");
        }
        //если все впорядке запрашиваем на яху цену акции функцией lookup и рендерим "quote_print.php" с данными которые она возвращает
        else
        {
            $stock = lookup($_POST["symbol"]);
            render("quote_print.php",["title" => "Stocks", "symbol" => $stock["symbol"], "name" => $stock["name"], "price" => $stock["price"]]);
        }
    }
    else
    {
        // else render form
        render("quote_form.php", ["title" => "Stocks"]);
    }



?>