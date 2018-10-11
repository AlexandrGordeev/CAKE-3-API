<?php
use Migrations\AbstractMigration;

class CreateArticleTags extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $tags = $this->table('tags');
        $tags->addColumn('name', 'string')
            ->save();

        $refTable = $this->table('articles_tags');
        $refTable->addColumn('tag_id', 'integer')
                ->addColumn('article_id', 'integer')
            ->save();
    }
}
