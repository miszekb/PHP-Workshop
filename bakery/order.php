<!DOCTYPE HTML>
<html lang="pl">
    <head>
        <meta charset="utf-8"/>
        <title>Summary</title>
    </head>
    <style>
        .tableStyle {
            border: 1px solid black;
            padding: 5px;
        }
    </style>
    <body>
        <?php
            $donuts = $_POST["donuts"];
            $rolls = $_POST["rolls"];
            $sum = $donuts + $rolls;
            $sumPrice = 0.99 * $donuts + 1.15 * $rolls;

echo<<<END
                <h2>Order summary</h2>
                <table border="1" cellpadding="10" cellspacing="0">
                    <tr>
                        <th>Item name</th>
                        <th>Price per 1 item</th>
                        <th>Quantity</th>
                    </tr>
                    <tr>
                        <th>DONUTS</th>
                        <td>0.99</td>
                        <td>$donuts</td>
                    </tr>
                    <tr>
                        <th>ROLLS</th>
                        <td>1.15</td>
                        <td>$rolls</td>
                    </tr>
               </table>
               <br/>
               <table border="1" cellpadding="10">
                    <tr>
                        <th>Sum quantity</th>
                        <td>$sum</td>
                    </tr>
                    <tr>
                        <th>Sum price</th>
                        <td>$sumPrice</td>
                    </tr>
                </table>
           </table>
END;
        ?>
    </body>
</html>