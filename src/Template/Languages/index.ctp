<div class="container process index large-10 medium-8 columns content">
    <center><h3><?= __('Information of Process') ?></h3></center>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
            <th scope="col"><?= $this->Paginator->sort('id',['text'=>__('id')]) ?></th>
                <th scope="col"><?= $this->Paginator->sort('language_id',['text'=>__('Languages')]) ?></th>
                <th scope="col"><?= $this->Paginator->sort('proces_id',['text'=>__('Process')]) ?></th>
                <th scope="col"><?= $this->Paginator->sort('description_id',['text'=>__('Descriptions')]) ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <?php foreach($language as $languages):?>
                <td><?= h($languages->id) ?></td>
                <td><?= h($languages->language_id) ?></td>
                <td><?= h($languages->proces_id) ?></td>
                <td><?= h($languages->description_id) ?></td>
                <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view',$languages->id]) ?><br>
                    <?= $this->Html->link(__('Edit'), ['action' => 'language', $languages->id]) ?><br>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $languages->id], ['confirm' => __('Are you sure you want to delete # {0}?', $languages->id)]) ?>
                </td>
<?php endforeach; ?>
            </tr>
        </tbody>
    </table>
    
</div>
