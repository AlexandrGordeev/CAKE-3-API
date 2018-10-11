<?php
use Migrations\AbstractMigration;

class CreateArticleTable extends AbstractMigration
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
        $articles = $this->table('articles');


        $articles->addColumn('title', 'string')
            ->addColumn('description', 'text')
            ->addColumn('publish', 'datetime')
            ->addColumn('author', 'string')
            ->save();
    }
}
