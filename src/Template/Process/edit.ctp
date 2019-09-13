
<div class="container process index large-10 medium-8 columns content">
    <?= $this->Form->create($proces,["enctype"=>"multipart/form-data","id"=>"programmer_form"]) ?>
    <fieldset>
        <legend><?= __('Edit Proces') ?></legend>
        <?php
            echo $this->Form->input('process_name',["required"=>"required",'label'=>__('Process')]);
                echo '<div class="sub name">';
                echo $this->Form->input('sub_name',["required"=>"required",'label'=>__('Sub Process')]);
                echo '</div>';
                echo '<div class="sub subname">';
                echo $this->Form->input('subsub_name',["required"=>"required",'class'=>'ssname','label'=>__('SubSub Process')]);
                echo '</div>';
                echo $this->Form->input('process_language_id',array('type'=>'radio', 'options'=> $option, 'label'=>'Languages','style'=>'margin:10px;position:relative;left:10px')); 
                echo $this->Form->control('other');
                ?>  
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
