<?php
/**
 * User: Huangdd <352926@qq.com>
 * Date: 13-2-22
 * Time: 上午10:44
 */
?>
<div data-role="collapsible-set" data-theme="e" data-mini="true">
    <?php
    $i = 1;
    foreach ($weekList as $v):
        ?>
        <div data-role="collapsible">
            <h3>
                <div><?php echo date("m-d", $v['start']) . " - " . date("m-d", $v['end']);?></div>
            </h3>
            1111
        </div>
        <?php
        $i++;
    endforeach;
    ?>
</div>