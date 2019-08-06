<!DOCTYPE html>
<html>
<head>
    <title>Currency Rate</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <?php $currencyRate = (array)$lastRate[0]; ?>

    <div class="sticky-top">
        <table class="table" style="margin-top: 10px;">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Dolar</th>
                <th scope="col">Euro</th>
                <th scope="col">Sterlin</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td scope="row"><?= $currencyRate['Dolar']; ?></td>
                <td><?= $currencyRate['Euro']; ?></td>
                <td><?= $currencyRate['Sterlin']; ?></td>
            </tr>
            </tbody>
        </table>
    </div>
</div>
</body>
</html>


