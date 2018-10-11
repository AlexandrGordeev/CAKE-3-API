<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Tag $tag
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Tag'), ['action' => 'edit', $tag->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Tag'), ['action' => 'delete', $tag->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tag->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Tags'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Tag'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Articles Tags Relations'), ['controller' => 'ArticlesTagsRelations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Articles Tags Relation'), ['controller' => 'ArticlesTagsRelations', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="tags view large-9 medium-8 columns content">
    <h3><?= h($tag->name) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Name') ?></th>
            <td><?= h($tag->name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($tag->id) ?></td>
        </tr>
    </table>
    <div class="related">
        <h4><?= __('Related Articles Tags Relations') ?></h4>
        <?php if (!empty($tag->articles_tags_relations)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Tag Id') ?></th>
                <th scope="col"><?= __('Article Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($tag->articles_tags_relations as $articlesTagsRelations): ?>
            <tr>
                <td><?= h($articlesTagsRelations->id) ?></td>
                <td><?= h($articlesTagsRelations->tag_id) ?></td>
                <td><?= h($articlesTagsRelations->article_id) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['controller' => 'ArticlesTagsRelations', 'action' => 'view', $articlesTagsRelations->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['controller' => 'ArticlesTagsRelations', 'action' => 'edit', $articlesTagsRelations->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['controller' => 'ArticlesTagsRelations', 'action' => 'delete', $articlesTagsRelations->id], ['confirm' => __('Are you sure you want to delete # {0}?', $articlesTagsRelations->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
    </div>
</div>
