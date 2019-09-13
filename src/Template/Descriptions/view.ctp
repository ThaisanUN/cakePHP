<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Proces $description
 */
?>
<nav class="large-2 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Proces'), ['action' => 'edit', $description->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Proces'), ['action' => 'delete', $description->id], ['confirm' => __('Are you sure you want to delete # {0}?', $description->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Process'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Proces'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('Export file Excel'), ['action' => 'exportdata']) ?> </li>
        <li><?= $this->Html->link(__('List Parent Process'), ['controller' => 'Process', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Parent Proces'), ['controller' => 'Process', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Child Process'), ['controller' => 'Process', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Child Proces'), ['controller' => 'Process', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="process view large-10 medium-8 columns content">
    <h3><?= h($description->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('English') ?></th>
            <td><?= h($description->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Chinase') ?></th>
            <td><?= h($description->name_zh_hk) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Khmer') ?></th>
            <td><?= h($description->name_km_kh) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($description->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Tools') ?></th>
            <td><?= h($description->tools) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Subjects') ?></th>
            <td><?= h($description->subjects) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Date Create&Update') ?></th>
            <td><?= h($description->create_date) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($description->id) ?></td>
        </tr>
    </table>
    
</div>
