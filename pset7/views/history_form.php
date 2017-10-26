<!-- This form displays a table with all your history transactions -->
<div>
    <table class="table_portfolio">
		<?php
			print("<tr>");
				print("<th>Сделка</th>");
				//print("<th>Дата/Время</th>");
				print("<th>Символ</th>");
				print("<th>Акций</th>");
				print("<th>Цена</th>");
			print("</tr>");

			foreach ($history as $history)
			{
				print("<tr>");
				print("<td>" . $history["status"] . "</td>");
				//print("<td>" . $history["date"] . "</td>");
				print("<td>" . $history["symbol"] . "</td>");
				print("<td>" . $history["shares"] . "</td>");
				print("<td>" . sprintf("%.2f",$history["price"]) . "</td>");
				print("</tr>");
			}
		?>
	</table>
</div>
