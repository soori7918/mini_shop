<tr data-v-2bfaf710="" data-symbol="btc" id="row_1">
    <input data-v-2bfaf710="" name="id" type="hidden" value="1">
    <input data-v-2bfaf710="" name="sort_id" type="hidden" value="1">
    <td data-v-2bfaf710="" class="vertical-middle">1</td>
    <td data-v-2bfaf710="" class="custom-flex vertical-middle">
        <div data-v-2bfaf710="">
            <img data-v-2bfaf710="" src="<?php echo e($item->logo); ?>" class="logo">
        </div>
        <span data-v-2bfaf710="" class="custom-mr-50 ml-xs-20"><?php echo e($item->name_en); ?></span>
    </td>
    <td data-v-2bfaf710="" class="mr-xs-10 vertical-middle"><?php echo e($item->symbol); ?></td>
    <td data-v-2bfaf710="" id="price_1" class="vertical-middle">
        <span data-v-2bfaf710="" class="arrow"></span>
        <?php echo e($item->price); ?>

    </td>
    <td data-v-2bfaf710="" id="price_1" class="vertical-middle">
        <span data-v-2bfaf710="" class="arrow"></span>
        <?php echo e(number_format($item->rial)); ?>

    </td>
    <td data-v-2bfaf710="" id="price_1" class="vertical-middle">
        <span data-v-2bfaf710="" class="arrow"></span>
        <?php echo e(number_format($item->lir)); ?>

    </td>
    <td data-v-2bfaf710="" id="buy_price_1 vertical-middle" class="vertical-middle">
        <span data-v-2bfaf710="" class="arrow"></span>
        <?php echo e(number_format($item->price_buy)); ?>

    </td>
    <td data-v-2bfaf710="" class="vertical-middle">
        <?php echo e(number_format($item->price_sell)); ?>

    </td>
    <td data-v-2bfaf710="" class="vertical-middle"><?php echo e($item->market_cap); ?></td>
    <td data-v-2bfaf710="" dir="ltr" class="vertical-middle">
        <?php echo e($item->daily_change_percent); ?> %
        <i data-v-2bfaf710="" class="change_status <?php echo e($item->daily_change_percent>=0?'pump':'dump'); ?> vertical-middle"></i>
    </td>
</tr>