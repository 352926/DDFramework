<?php
/**
 * User: Huangdd <352926@qq.com>
 * Date: 13-2-22
 * Time: 上午10:44
 */
?>
<div data-role="content" style="padding:5px;">
    <div data-role="collapsible-set" data-theme="e" style="margin:0;">
        <div data-role="fieldcontain" style="margin: 0;padding-bottom: 5px;">
            <fieldset data-role="controlgroup">
                <input name="" id="search" placeholder="" value="" type="search">
            </fieldset>
        </div>
        <ul data-role="listview" data-inset="true" data-filter="true" data-theme="d" data-divider-theme="d"
            data-icon="false" data-filter-placeholder="Search widgets..." data-global-nav="docs" class="jqm-list">
            <li data-section="Widgets" data-filtertext="accordions collapsible sets content formatting grouped inset mini">
                <a href="widgets/accordions/">Accordion</a></li>

            <li data-section="Widgets" data-filtertext="ajax navigation navigate event method"><a href="widgets/navigation/"
                                                                                                  data-ajax="false">AJAX
                Navigation</a></li>

            <li data-section="Widgets"
                data-filtertext="autocomplete filter reveal listviews remote listviewbeforefilter placeholder"><a
                    href="widgets/autocomplete/" data-ajax="false">Autocomplete</a></li>

            <li data-section="Widgets" data-filtertext="buttons inputs forms inline theme grouped icons mini disabled"><a
                    href="widgets/buttons/" data-ajax="false">Buttons</a></li>

            <li data-section="Widgets" data-filtertext="checkboxes checkboxradio inputs forms mini disabled"><a
                    href="widgets/checkbox/">Checkboxes</a></li>
        </ul>
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
                <div data-section="Widgets" data-filtertext="accordions collapsible sets content formatting grouped inset mini">
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