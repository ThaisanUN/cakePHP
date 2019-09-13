        <nav class="large-2 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Process'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('Language'),['action' => 'chagelanguage'])?></li>
          </ul>
</nav>  <span id="success_message"></span>
<div class="">
    <?= $this->Form->create($proces,["enctype"=>"multipart/form-data","id"=>"programmer_form"]) ?>
    <fieldset>
        <legend><?= __('Add Proces') ?></legend>
        <?php
            echo $this->Form->input('process_name',["required"=>"required"]);
                echo '<div class="sub name">';
                echo $this->Form->input('sub_name',["required"=>"required"]);
                echo '</div>';
                echo '<div class="sub subname">';
                echo $this->Form->input('subsub_name',["required"=>"required",'class'=>'ssname']);
                echo '</div>';
                echo $this->Form->control('title',['id'=>"title"]);
                echo '<div id="repeater">';
                echo '<div class="repeater-heading" align="right" style="margin:30px;">';
                echo '<button type="button" class="btn btn-secondary">Add More Discription</button>';
                echo '</div>';
                echo '<div class="clearfix"></div>';
                echo '<div class="items" data-group="programming_languages">';
                echo '<div class="item-content">';
                echo  '<div class="form-group">';
                echo '<div class="row">';
                echo '<div class="col-md-9">';
                echo $this->Form->control('description',["type"=>'textarea']);
                echo '<div class="infor">';
                echo $this->Form->control('subject');
                echo '</div>';
                echo '<div class="infor">';
                echo $this->Form->control('staffs');
                echo '</div>';
                echo '<div class="infor">';
                echo $this->Form->control('tools',["type"=>"text"]);
                echo '</div>';
                echo '</div>';
                echo '<div style="height:10px;margin:30px;top:30px;position:relative">';
                echo '<button id="remove-btn" onclick="$(this).parents(\'.items\').remove()" class="btn btn-danger">';
                echo 'Remove</button>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '</div>';
                echo '<div class="clearfix"></div>';
                echo $this->Form->control('file',['label'=>'','type'=>'file','multiple'=>'multiple','style'=>'visibility: hidden']);
                ?>  <?= $this->Form->button(__('Submit',['class'=>'btn btn-primary'])); ?>
    <?= $this->Form->end() ?>
    </fieldset>
  
</div>
