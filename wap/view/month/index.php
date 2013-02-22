<?php
/**
 * User: Huangdd <352926@qq.com>
 * Date: 13-2-22
 * Time: 上午10:44
 */
?>
<div data-role="content" style="padding:0;">
    <div data-role="collapsible-set" data-theme="e" style="margin:0;">
        <div data-role="fieldcontain">
            <fieldset data-role="controlgroup">
                <label for="searchinput1">
                </label>
                <input name="" id="searchinput1" placeholder="" value="" type="search">
            </fieldset>
        </div>
        <?php
        $i = 1;
        foreach ($weekList as $v):
            ?>
            <div data-role="collapsible">
                <h3>
                    <div>
                        第<?php echo count($weekList) + 1 - $i;?>周
                        <div style="font-size: 9px;font-weight: normal;line-height: 9px;"><?php echo date("m.d", $v['start']) . "-" . date("m.d", $v['end']);?></div>
                    </div>
                </h3>
                <div>
                    <div style="">2号周五</div>
                    <div>其它支出</div>
                    <div>5元</div>
                    <div class="">></div>
                </div>
            </div>
            <?php
            $i++;
        endforeach;
        ?>
    </div>
</div>