<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Proces[]|\Cake\Collection\CollectionInterface $process
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li><?= $this->Html->link(__('New Proces'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('New Languages'), ['controller'=>'Language','action' => 'index']) ?></li>
    </ul>
</nav>
<div class="process index large-9 medium-8 columns content">
    <h3><?= __('Process') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('process_name') ?></th>
                <th scope="col"><?= $this->Paginator->sort('parent_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('language') ?></th>
                <th scope="col"><?= $this->Paginator->sort('subject') ?></th>
                <th scope="col"><?= $this->Paginator->sort('title') ?></th>
                <th scope="col"><?= $this->Paginator->sort('tools') ?></th>
                <th scope="col"><?= $this->Paginator->sort('description') ?></th>
                <th scope="col"><?= $this->Paginator->sort('comment') ?></th>
                <th scope="col"><?= $this->Paginator->sort('file') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($process as $proces): ?>
            <tr>
                <td><?= $this->Number->format($proces->id) ?></td>
                <td><?= h($proces->process_name) ?></td>
                <td><?= $proces->has('parent_proces') ? $this->Html->link($proces->parent_proces->id, ['controller' => 'Process', 'action' => 'view', $proces->parent_proces->id]) : '' ?></td>
                <td><?= h($proces->language) ?></td>
                <td><?= h($proces->subject) ?></td>
                <td><?= h($proces->title) ?></td>
                <td><?= h($proces->tools) ?></td>
                <td><?= h($proces->description) ?></td>
                <td><?= h($proces->comment) ?></td>
                <td><?= $this->Number->format($proces->file) ?></td>
             
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $proces->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $proces->id]) ?>
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
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
