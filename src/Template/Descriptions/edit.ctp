
<div class="container process index large-10 medium-8 columns content">
    <?= $this->Form->create($description) ?>
    <fieldset>
        <legend><?= __('Edit Information') ?></legend>
        <?php if ($language_id == "1") : ?>
            <style>
            .des_kh,.des_ch{
                display:none;
            }
            </style>   
            <?php elseif ($language_id == "2"):?>  
            <style>
            .des_kh{
                display: none;
            }
            </style>   
            <?php else :?>
            <style>
            .des_ch{
                display: none;
            }
            </style>
        <?php endif; ?>
        <?php
        echo $this->Form->control('process_id',["required"=>"required",'options'=>$process_id]);
        
                echo '<div id="repeater">';
                    echo '<div class="repeater-heading" align="right" style="margin:30px 0px 0px 0px" >';
                        echo '<button type="button" class="btn btn-primary repeater-add-btn">' .__('Add More Field').' </button>';
                            echo '</div>';
                                echo '<div class="clearfix"></div>';
                                    echo '<div class="items" data-group="programming_languages">';
                                echo '<div class="item-content">';
                            echo  '<div class="form-group">';
                        echo '<div class="row">';
                echo '<div class="col-md-9">';
                //other information
                echo '<div class="infor">';
              
                echo $this->Form->control('subjects',['label'=>__("Subjects"),'placeholder'=>__('Input Subject')]);
               
                echo '</div>';
                echo '<div class="infor">';
                // echo $this->Form->input('staffs_id', array('type'=>'select','label'=>__("Staffs"), 'options'=>$position_id, 'default'=>__('Choose Staff'),));
                echo $this->Form->control('staffs_id',['type' => 'select', 'default' => 'your value','label'=>__("Staffs"),'options'=>$position_id]);
                echo '</div>';
                echo '<div class="infor">';
                echo $this->Form->control('tools',['label'=>__("Tools"),'placeholder'=>__('Input Tool')]);
                echo '</div>';
                //discriptions
                //En 
                echo '<div class="des_en">';
                echo $this->Form->control('name',["type"=>'textarea','data-name'=>'name[]','placeholder'=>__('Input Text English'),'label'=>__("English")]);
                echo '</div>';
                //Kh
                echo '<div class="des_kh">';
                echo $this->Form->control('name_km_kh',["type"=>'textarea','data-name'=>'name_km_kh[]','placeholder'=>__('Input Text Khmer'),'label'=>__("Khmer")]);
                echo '</div>';
                //Ch
                echo '<div class="des_ch">';
                echo $this->Form->control('name_zh_hk',["type"=>'textarea','data-name'=>'name_zh_hk[]','placeholder'=>__('Input Text Chanise'),'label'=>__("Chinase")]);
                echo '</div>';
                //end of discriptions
                echo "<hr style='height:4px;color#0000;'>";
                //end of other information
                echo '</div>';
                //button remove
                echo '<div style="height:10px;margin:30px;left:40px;top:30px;position:relative">';
                echo '<button id="remove-btn" onclick="$(this).parents(\'.items\').remove()" class="btn btn-danger">'.__('Remove').' </button>';
                echo '</div>';
                //end of button remove
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '<div class="clearfix"></div>';
                ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
