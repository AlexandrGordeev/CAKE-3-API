<?php

use App\Helpers\BaseSeed;


/**
 * Articles seed.
 */
class ArticlesSeed extends BaseSeed
{
    public $limit = 100;

    /**
     * @return string table name for seed
     */
    public function getTableName()
    {
        return "articles";
    }

    /**
     * @return array item for seed
     */
    public function getSeedItem()
    {
        return [
           'title'=> $this->getSeeder()->sentence,
           'description'=> $this->getSeeder()->paragraph(20),
           'publish'=> date('Y-m-d', strtotime( '+'.mt_rand(0, 100).' days')),
           'author'=>$this->getSeeder()->name
       ];
    }
}
