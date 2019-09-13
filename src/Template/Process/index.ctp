<div class="container process index large-10 medium-8 columns content">
    <center><h3><?= __('Information of Process') ?></h3></center>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('No') ?></th>
                <th scope="col"><?= $this->Paginator->sort('process_name',['text'=>__('Main Process')]) ?></th>
                <th scope="col"><?= $this->Paginator->sort('sub_name',['text'=>__('Sub Process')]) ?></th>
                <th scope="col"><?= $this->Paginator->sort('subsub_name',['text'=>__('SubSub Process')]) ?></th>
                 <th scope="col"><?= $this->Paginator->sort('process_language_id',['text'=>__('Languages')]) ?></th>
                <th scope="col"><?= $this->Paginator->sort('create_date',['text'=>__("Date Create&Update")]) ?></th>
                <th scope="col"><?= $this->Paginator->sort('other') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $i = 1;
            foreach ($process as $proces): ?>
            <tr>
                <td><?= $i++ ?></td>
                <td><?= h($proces->process_name) ?></td>
                <td><?= h($proces->sub_name) ?></td>
                <td><?= h($proces->subsub_name) ?></td>
                <?php
                if (h($proces->process_language_id) == "3" ) {
                    $proces->process_language_id = "Khmer";
                }elseif(h($proces->process_language_id) == "2" ) {
                    $proces->process_language_id = "Chanise";
                }else{
                    $proces->process_language_id = "English";
                }
                
                ?>
                <td>
                <?=h($proces->process_language_id) ?></td>
                <td><?= h($proces->create_date) ?></td>
                <td><?= h($proces->other) ?></td>
                <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view',$proces->id]) ?><br>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $proces->id]) ?><br>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $proces->id], ['confirm' => __('Are you sure you want to delete # {0}?', $proces->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page'). __('{{page}}'). __('of ').__('{{pages}},'). __('showing'). __('{{current}}'). __('record(s) out of'). __('{{count}}') .__('total')]) ?></p>
    </div>
</div>
