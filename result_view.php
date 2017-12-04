<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        table, th, td {
            border: 1px solid lightcoral;
        }
        th, td {
            padding: 15px;
        }
    </style>
</head>
<body>
<?php

function debug ($data) {
    echo '<pre>';
    print_r($data);
    echo '</pre>';
}


$result = file_get_contents('result.json');
$result = json_decode($result);

?>
<table style="width:100%">
    <tr>
        <th>#</th>
        <th>Lvivski url</th>
        <th>Lvivski title</th>
        <th>Plagiat url</th>
        <th>Plagiat title</th>
    </tr>
    <?php $counter = 1; ?>
        <?php foreach ($result as $item) { ?>

            <?php if (array_key_exists('Lvivski', $item)) { ?>
                <tr>
                <td><?php echo $counter; ?></td>
                    <td><?php echo $item->Lvivski->title;?></td>
                    <td><?php echo $item->Lvivski->url;
                        $counter++;?></td>

                    <?php } else if (array_key_exists('Plagiat', $item)) { ?>
                    <td><?php echo $item->Plagiat->title;?></td>
                    <td><?php echo $item->Plagiat->url;?></td>
                </tr>
                <?php }

        } ?>
</table>

</body>
</html>