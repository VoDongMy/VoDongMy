
<?php echo form_open('mod/dels',  array('id' => 'admindata'));?> 
<input type="hidden" name="page" value="<?=$this->uri->segment(3)?>">
<table class="admindata">
    <thead>
        <tr class="pagination">
            <th colspan="8">
                Hiện có <?php echo $num?> Modules <span class="pages"><?php echo $pagination?></span>
            </th>
        </tr>
        <tr>
            <th class="checked"><input type="checkbox" name="sa" id="sa" onclick="check_chose('sa', 'ar_id[]', 'admindata')"></th>
            <th class="id"><?php echo vnit_order('mod/ds/?f=d-id&o=desc','ID')?></th>
            <th><?php echo vnit_order('mod/ds/?f=d-title&o=desc','Tên Modules')?></th>
            <th style="width: 150px;"><?php echo vnit_order('mod/ds/?f=m-module&o=desc','Modules')?></th>
            <th style="width: 150px;"><?php echo vnit_order('mod/ds/?f=m-position&o=desc','Vị trí')?></th>
            <th style="width: 100px;"><?php echo vnit_order('mod/ds/?f=m-params&o=desc','Style')?></th>
            <th style="width: 100px;"><?php echo vnit_order('mod/ds/?f=m-ordering&o=desc','Sắp xếp')?> <?php echo action_order()?></th>
            <th class="fc">Chức năng</th>
        </tr>        
    </thead>
    <?
    $k=1;
    foreach($list as $rs):
    ?>
    <tr class="row<?=$k?>">
        <td align="center"><input  type="checkbox" name="ar_id[]" value="<?php echo $rs->id?>"></td>
        <td><?=$rs->id?></td>
        <td><a href="<?=site_url('mod/edit/'.$rs->id)?>"><?=$rs->title?></a></td>
        <td><?=$rs->module?></td>
        <td><?=$rs->position?></td>
        <td><?=$rs->params?></td>
        <td align="center">
            <input type="text"  class="order" name="order_<?=$rs->id?>" value="<?=$rs->ordering?>">
            <input type="hidden" name="id[]" value="<?=$rs->id?>">
        </td>
        <td align="center">
            <?php echo icon_edit('mod/edit/'.$rs->id)?>
            <span id="publish<?php echo $rs->id?>"><?php echo icon_active("'modules'","'id'",$rs->id,$rs->published)?></span>
        </td>
    </tr>       
    <?php
    $k=1-$k;
    endforeach;
    ?>
    <tfoot>
        <td colspan="8">
            Hiện có <?php echo $num?> Modules <span class="pages"><?php echo $pagination?></span>
        </td>
    </tfoot>    
</table>
<?php echo form_close()?>
<script type="text/javascript">
function save_order(){
    var fields = $("#admindata :input").serializeArray();
    $.post(base_url+"mod/save_order",fields, function(data) {
        location.reload();
    });
}
</script>
