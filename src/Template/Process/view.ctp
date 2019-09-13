<script src="https://kit.fontawesome.com/yourcode.js"></script>
<div class="container process index large-10 medium-8 columns content">
<center><h2>SOPTA</h2></center>
    <table>
        <tr>
            <td><h5><?= h($proces->process_name)?></h5></td><td><i class="fas fa-arrow-right"></i></td> 
            <td><h5><?= h($proces->sub_name)?></h5></td><td><i class="fa fa-spinner fa-pulse"></i></i></td>
           <td> <h5><?= h($proces->subsub_name) ?></h5></td>
        </tr>
        <tr>
        <th scope="row"><?= $this->Paginator->sort('No') ?></th>
    <th scope="row"  class = "en"><?= $this->Paginator->sort('name',['text'=>__('English')]) ?></th>
    <th scope="row"  class = "ch"><?= $this->Paginator->sort('name_zh_hk',['text'=>__('Chinese')]) ?></th>
     <th scope="row"  class = "kh"><?= $this->Paginator->sort('name_km_kh',['text'=>__('Khmer')]) ?></th> 
     <th scope="row"><?= $this->Paginator->sort('staffs_id',['text'=>__('Staffs')]) ?></th>
     <th scope="row"><?= $this->Paginator->sort('subjects',['text'=>__('Subjects')]) ?></th>
     <th scope="row"><?= $this->Paginator->sort('tools',['text'=>__('Tools')]) ?></th>
     <th scope="row"><?= $this->Paginator->sort('create_date',['text'=>__('Date Create&Update')]) ?></th> 
     <th scope="row" style="width:10px;height:10px"><?= __('Actions') ?></th> 
    </tr>
    <tr>
    <?php $i = 1; ?>
    <?php foreach ($data as $datas) :?>
    <?php if ($proces->id  == $datas->process_id): ?>
            <td style="border:1px solid red;"><?= $i++; ?></td>
            <?php if($proces->process_language_id == "1"): ?> 
            <style>
            .kh{
                display:none;
            }
            .ch{
                display:none;
            }
            </style>
                 <?php elseif($proces->process_language_id == "2"): ?>
                 <style>
                  
            .kh{
             display:none;
            }
                 </style>  
                 <?php elseif($proces->process_language_id == "3"): ?>
                 <style>
                  
            .ch{
             display:none;
            }
                 </style>
                 
            <?php endif; ?>
            <!-- <php dump($datas->staffs_id);
                 exit();?> -->
            <td class = "en" style="border:1px solid red;"><?= h($datas->name) ?></td>
            <td class = "kh" style="border:1px solid red;"><?= h($datas->name_km_kh) ?></td>
            <td class = "ch" style="border:1px solid red;"><?= h($datas->name_zh_hk) ?></td>
            <td style="border:1px solid red;"><?= h($datas->staffs_id) ?></td>
            <td style="border:1px solid red;"><?= h($datas->subjects) ?></td>
            <td style="border:1px solid red;"><?= h($datas->tools) ?></td>
            <td style="border:1px solid red;"><?= h($datas->create_date) ?></td>
            <td class="actions"  style="border:1px solid red;">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $datas->id]) ?><br>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $datas->id]) ?><br>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $datas->id], ['confirm' => __('Are you sure you want to delete # {0}?',  h($datas->id) )]) ?>
                </td>
        </tr>
        
        <?php endif; ?>
<?php endforeach; ?>
    </table>
   
</div>
