<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Proces $proces
 */
?>
<nav class="large-2 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Proces'), ['action' => 'edit', $proces->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Proces'), ['action' => 'delete', $proces->id], ['confirm' => __('Are you sure you want to delete # {0}?', $proces->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Process'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Proces'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Parent Process'), ['controller' => 'Process', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Parent Proces'), ['controller' => 'Process', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Child Process'), ['controller' => 'Process', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Child Proces'), ['controller' => 'Process', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="process view large-10 medium-8 columns content">
    <h3><?= h($proces->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Process Name') ?></th>
            <td><?= h($proces->process_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Parent Proces') ?></th>
            <td><?= $proces->has('parent_proces') ? $this->Html->link($proces->parent_proces->id, ['controller' => 'Process', 'action' => 'view', $proces->parent_proces->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Language') ?></th>
            <td><?= h($proces->language) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Subject') ?></th>
            <td><?= h($proces->subject) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($proces->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tools') ?></th>
            <td><?= h($proces->tools) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Description') ?></th>
            <td><?= h($proces->description) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('File') ?></th>
            <td><?= h($proces->file) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($proces->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Process') ?></h4>
        <?php if (!empty($proces->child_process)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Process Name') ?></th>
                <th scope="col"><?= __('Parent Id') ?></th>
                <th scope="col"><?= __('Language') ?></th>
                <th scope="col"><?= __('Subject') ?></th>
                <th scope="col"><?= __('Title') ?></th>
                <th scope="col"><?= __('Tools') ?></th>
                <th scope="col"><?= __('Description') ?></th>
                <th scope="col"><?= __('File') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php
            dump($process);
            $i = 1;
            foreach ($process as $key => $value) {
                                dump($process);
            }
            ?>
            <tr>
            <td><?=$i++?></td>
            <td><?=$value->name ?></td>
            <td><?=$value->id?></td>
            <td><?= $value->statue?></td>
            <td><?=$i++?></td>
            <td><?=$i++?></td>

            </tr>
            <tr></tr>
        </table>
        <?php endif; ?>
    </div>
</div>
