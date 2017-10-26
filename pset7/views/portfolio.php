<div>
    <table class="table_portfolio">
        <caption>Действующие ордера</caption>
        <thead>
            <tr>
                <td>Символ</td>
                <td>Имя</td>
                <td>Пай</td>
                <td>Цена</td>
                <td>Итого</td>
            </tr>
        </thead>

        <tbody>
        <?php foreach ($positions as $position): ?>

        <?= "<tr>" ?>
            <?= "<td>".$position["symbol"]."</td>" ?>
            <?= "<td>".$position["name"]."</td>" ?>
            <?= "<td>".$position["shares"]."</td>" ?>
            <?= "<td>"."$".$position["price"]."</td>" ?>
            <?= "<td>"."$".number_format($position["shares"] * $position["price"],2)."</td>" ?>
        <?= "</tr>" ?>

        <?php endforeach ?>
        <tfoot>
            <td colspan="4" >Остаток денег</td>
            <td><?= "$".number_format($_SESSION["balance"],2) ?> </td>

        </tfoot>
    </tbody>
    </table>
</div>
