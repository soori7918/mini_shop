!DOCTYPE html>
<html>
<head>
    <title>استانبول سرویس</title>
</head>
<body>
<?php
    $final = json_decode($order->reserve);
?>
<table>
    <tbody>
    <tr>
        <td><?php echo e($final->first_name . ' ' .$final->last_name); ?></td>
        <td><?php echo e($final->email); ?></td>
        <td><?php echo e($final->phone); ?></td>
        <td><?php echo e($final->checkIn); ?></td>
        <td><?php echo e($final->checkOut); ?></td>
        <td><?php echo e($final->person); ?></td>
        <td>
            <?php
                $villa = App\Villa::where('id' , $final->villa_id)->first();

            ?>
            <?php if(isset($villa)): ?>
                <?php echo e($villa->name); ?>

            <?php endif; ?>
        </td>
    </tr>
    </tbody>
</table>
</body>
</html>
