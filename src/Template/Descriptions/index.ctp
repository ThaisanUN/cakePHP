<div class="container process index large-15 medium-10 columns content">
    <center><h3><?= __('SOPTA') ?></h3></center>
    <?php if ($language_id == "1") : ?>
            <style>
            .des_kh,.des_ch,.po_kh,.po_ch{
                display:none;
            }
            </style>   
            <?php elseif ($language_id == "2"):?>  
           
            <style>
            .des_kh,.des_ch,.po_kh,.po_ch{
                display:none;
            }
            </style>   
            <?php elseif ($language_id == "2"):?>  
            <style>
            .des_kh,.des_en,.po_kh,.po_en{
                display: none;
            }
            
            </style>   
            <?php else :?>
            <style>
            .des_ch,.des_en,.po_en,.po_ch{
                display: none;
            }
            </style>
        <?php endif; ?>
    <table >
        <tbody>
            <?php 
            $i = 1;
            foreach ($data as $datas): ?></table>  <table>
            <tr>
                    <th style= "width:10%;color: #980100;"><i><?= $i++ ?></i></th>
                   <th style= "width:25%;color:#140095;"><span><?= h($datas->process_name) ?></span></th>
                    <th style= "width:25%;color:#4532A2;"><span><?= h($datas->sub_name) ?></span></th>
                    <th style= "width:25%;color:#00023d;"><span><?= h($datas->subsub_name) ?></span></th>
                     <td> <?= $this->Html->link(__('View'), ['controller'=>"Descriptions",'action' => 'add', $datas->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller'=>"Process",'action' => 'edit', $datas->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller'=>"Process",'action' => 'delete', $datas->id], ['confirm' => __('Are you sure you want to delete # {0}?',  h($datas->id) )]) ?></center></td>
               </tr> </table>
               <?php
             $k = 1?>
              <!-- <table> -->
            <!-- <tr><td style="width:70px;"></td> -->
                <!-- <td scope="col" class = "des_en" style ="color:#e4ab2b;width:28%;"> <center><__("Descriptions" ); ?></center></td> -->
                 <!-- <td scope="col" style ="color:#e4ab2b;width:14%;"><center><__("Subject"); ?></center></td> -->
                <!-- <td scope="col" style ="color:#e4ab2b;width:14%;"><center><__("Staffs"); ?></center></td> -->
                <!-- <td scope="col" style ="color:#e4ab2b;width:14%;"><center><__("Tools"); ?></center></td> -->
                <!-- <td scope="col" style ="color:#e4ab2b;width:15%;"><center><__("Date Create&Update"); ?></center></td> -->
                <!-- <td scope="col" class="actions" style=";"><__('Actions') ?></td> -->
            <!-- </tr> -->
             <?php foreach ($description as $descriptions): ?>
                <?php if ($descriptions->process_id  == $datas->id): ?>
   <!-- </table> -->
   <table>
   <td style="width:30px;"></td>
   <td style= "width:40px;"><center><?= ($i-1).".".$k++?></center></td>
    <td scope ="row" style ="width:29.5%;">
    <div class = "des_en" >
     <center><?= h($descriptions->name) ?></center><hr>
     </div>
     <?php if ( $descriptions->name_zh_hk == "") : ?>
    
     <div class = "des_ch">
     
       <center><?= h($descriptions->name);?></center>
      </div>
        <?php else :?>
     <div class = "des_ch">
       <center><?= h($descriptions->name_zh_hk);?></center>
      </div>
        <?php endif; ?>
      <?php if ($descriptions->name_km_kh ==  "") :?>
      <div class= "des_kh" >
        <center><?= h($descriptions->name); ?></center>
        </div>
        <?php else : ?>
      <div class= "des_kh" >
        <center><?= h($descriptions->name_km_kh) ?></center>
        </div>
        <?php endif;?>
        </td>
        
            <td style= "width:15%;"><center><?= h($descriptions->subjects) ?></center></td>
            <?php foreach ($position as $positions):?> 
         <?php if ($descriptions->staffs_id == $positions->id): ?>
             <td ​​ style= "width:15%;" class="po_en"><center><?= h($positions->name) ?></center></td>
             <td style= "width:15%;" class="po_kh"><center><?= h($positions->name_km_kh) ?></center></td>
             <td style= "width:15%;" class="po_ch"><center><?= h($positions->name_zh_hk) ?></center></td>
        <?php endif;?>
        <?php endforeach; ?>
            <!-- <td style= "width:15%;"><= h(["value"=>$descriptions->staffs_id,"text"=>$staff_id]) ?></td> -->
            <td style= "width:14.5%;"><center><?= h($descriptions->tools) ?></center></td>
            <td style= "width:15%;"><center><?= h($descriptions->create_date) ?></center></td>
            <td class="actions" style ="width:10%;">
            
                    <center><?= $this->Html->link(__('View'), ['action' => 'view', $descriptions->id]) ?></center><br>
                    <center><?= $this->Html->link(__('Edit'), ['action' => 'edit', $descriptions->id]) ?></center><br>
                    <center><?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $descriptions->id], ['confirm' => __('Are you sure you want to delete # {0}?',  h($descriptions->id) )]) ?></center>
                </td>
        
      
        </table>
        <table>
             <!-- <td></td>
             <td style= "width:6px;">< ($i-1).".".$k++ ?></td>
                    <td class ="des_en">< h($descriptions->name) ?></td>
                    <td class="des_ch">< h($descriptions->name_zh_hk) ?></td>
                    <td class="des_kh">< h($descriptions->name_km_kh) ?></td>
                    <td>< h($descriptions->subjects) ?></td> 
                    <td>< h($descriptions->staffs_id) ?></td>
                    <td>< h($descriptions->tools) ?></td> 
                    <td>< h($datas->create_date) ?></td>
                <td class="actions">
                    < $this->Html->link(__('View'), ['action' => 'view', $descriptions->id]) ?><br>
                    < $this->Html->link(__('Edit'), ['action' => 'edit', $descriptions->id]) ?><br>
                    < $this->Form->postLink(__('Delete'), ['action' => 'delete', $descriptions->id], ['confirm' => __('Are you sure you want to delete # {0}?',  h($descriptions->id) )]) ?>
                </td> -->
               </tr>
            </tr> 
            <?php endif; ?>
            <?php endforeach; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
 
</div>
