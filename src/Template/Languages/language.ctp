<div class="container process index large-10 medium-8 columns content">
    <?= $this->Form->create($language); ?>
    <fieldset>
        <legend><?= __('Change Language') ?></legend>
        <?php
       echo $this->Form->radio(
                    'language',
                    [
                        ['value' => 'en_US', 'text' => 'English',"style"=>"margin:30px 20px;"],
                        ['value' => 'km_KH', 'text' => 'ខ្មែរ',"style"=>"margin:30px 20px;"],
                        ['value' => 'zh_HK', 'text' => '中文',"style"=>"margin:30px 20px;"]
                    ]
                );
                ?>  
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
