<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Article $article
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Article'), ['action' => 'edit', $article->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Article'), ['action' => 'delete', $article->id], ['confirm' => __('Are you sure you want to delete # {0}?', $article->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Articles'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Article'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Articles Tags Relations'), ['controller' => 'ArticlesTagsRelations', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Articles Tags Relation'), ['controller' => 'ArticlesTagsRelations', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="articles view large-9 medium-8 columns content">
    <h3><?= h($article->title) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Title') ?></th>
            <td><?= h($article->title) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Author') ?></th>
            <td><?= h($article->author) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($article->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Publish') ?></th>
            <td><?= h($article->publish) ?></td>
        </tr>
    </table>
    <div class="row">
        <h4><?= __('Description') ?></h4>
        <?= $this->Text->autoParagraph(h($article->description)); ?>
    </div>
    <div class="related">
        <h4><?= __('Related Articles Tags Relations') ?></h4>
        <?php if (!empty($article->articles_tags_relations)): ?>
        <table cellpadding="0" cellspacing="0">
            <tr>
                <th scope="col"><?= __('Id') ?></th>
                <th scope="col"><?= __('Tag Id') ?></th>
                <th scope="col"><?= __('Article Id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
            <?php foreach ($article->articles_tags_relations as $articlesTagsRelations): ?>
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
