
<div class="container process index large-10 medium-8 columns content">
    <?= $this->Form->create($proces) ?>
  <?php  dump($proces);
    exit();?>
    <fieldset>
        <legend><?= __('Change Language') ?></legend>
        <?php
       echo $this->Form->radio(
                    'process_language_id',
                    [
                        ['value' => 'en_US', 'text' => __('English')],
                        ['value' => 'km_KH', 'text' => __('Khmer')],
                        ['value' => 'zh_HK', 'text' => __('Chinese')]
                    ]
                );
                ?>  
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
