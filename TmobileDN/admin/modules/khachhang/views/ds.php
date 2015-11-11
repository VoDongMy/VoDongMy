<?$page = '/'.$this->uri->segment(4);?>
<?php echo form_open('khachhang/dels',  array('id' => 'admindata'));?>
<input type="hidden" name="page" value="<?=$this->uri->segment(3)?>" style="width: 100%;">
<table class="admindata">
    <thead>
        <tr class="pagination">
            <th class="head" colspan="3">
                Hiện có <?php echo $num?> Khách hàng <span class="pages"><?php echo $pagination?></span>
            </th>
            <th colspan="3">
          

           
            </th>
        </tr>
        <tr>
            <th class="checked"><input type="checkbox" name="sa" id="sa" onclick="check_chose('sa', 'ar_id[]', 'admindata')"></th>
            <th class="id">ID</th>
            <th>Tên khách hàng</th>
            <th class="fc">Chức năng</th>
        </tr>        
    </thead>
    <?
    $k=1;
    foreach($list as $rs):
    ?>
    <tr class="row<?=$k?>">
        <td align="center"><input  type="checkbox" name="ar_id[]" value="<?php echo $rs->local_id?>"></td>
        <td align="center"><?=$rs->id?></td>
        <td>
            <a href="<?=site_url('khachhang/edit/'.$rs->id.$page)?>"><?=$rs->name?></a>
        </td>
        <td align="center">
            <?php echo icon_edit('khachhang/edit/'.$rs->id.$page)?>
            <span id="publish<?php echo $rs->id?>"><?php echo icon_active("'khachhang'","'id'",$rs->id,$rs->published)?></span>
            <?php echo icon_del('khachhang/del/'.$rs->id.$page)?>
        </td>
    </tr>       
    <?php
    $k=1-$k;
    endforeach;
    ?>
    <tfoot>
        <td colspan="8">
            Hiện có <?php echo $num?> Khách hàng <span class="pages"><?php echo $pagination?></span>
        </td>
    </tfoot>    
</table>
<?php echo form_close()?>
