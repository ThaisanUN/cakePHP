
<div class="container process index large-10 medium-8 columns content">
    <?= $this->Form->create($proces,["enctype"=>"multipart/form-data","id"=>"programmer_form"]) ?>
    <fieldset>
        <legend><?= __('Add Proces') ?></legend>
        <?php
            echo $this->Form->input('process_name',["required"=>"required",'label'=>__('Process')]);
                echo '<div class="sub name">';
                echo $this->Form->input('sub_name',["required"=>"required",'label'=>__('Sub Process')]);
                echo '</div>';
                echo '<div class="sub subname">';
                echo $this->Form->input('subsub_name',["required"=>"required",'class'=>'ssname','label'=>__('SubSub Process')]);
                echo '</div>';
                echo $this->Form->input('process_language_id',array('type'=>'radio', 'options'=> $option, 'label'=>__('Language'),'style'=>'margin:10px;position:relative;left:10px')); 
                echo $this->Form->control(__('other'));
                ?>  <?= $this->Form->button(__('Submit')); ?>
    <?= $this->Form->end() ?>
    </fieldset>
    </div>
<script>
$(document).ready(function() {
	var
		gradeTable = $('#grade-table'),
		gradeBody = gradeTable.find('tbody'),
		numberRows = gradeTable.find('tbody > tr').length,
		gradeTemplate = _.template($('#grade-template').remove().text());
	gradeTable
		.on('click', 'a.add', function(e) {
			e.preventDefault();
			$(gradeTemplate({key: numberRows++}))
				.hide()
				.appendTo(gradeBody)
				.fadeIn('fast');
		})
		.on('click', 'a.remove', function(e) {
				e.preventDefault();
			$(this)
				.closest('tr')
				.fadeOut('fast', function() {
					$(this).remove();
				});
		});
		if (numberRows === 0) {
			gradeTable.find('a.add').click();
		}
});
</script>