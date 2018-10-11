<?php

namespace App\Helpers;

use Faker\Factory;
use Migrations\AbstractSeed;

/**
 * Created by Hashstudio.
 * User: Alexandr Gordeev
 * Date: 11.10.18
 * Time: 14:12
 * @author hashstudio
 * @email mail@hashstudio.ru
 * @website hashstudio.ru
 */
abstract class BaseSeed extends AbstractSeed
{
    public $limit = 100;
    /**
     * @var \Faker\Generator
     */
    private $_seeder;

    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     *
     * @return void
     */
    public function run()
    {
        $this->truncate();

        $data = [];

        foreach (range(0, $this->limit) as $iterator) {
            $data[] = $this->getSeedItem();
        }

        $this->table($this->getTableName())->insert($data)->save();
    }

    public function truncate()
    {
        $table = $this->table($this->getTableName());
        $this->query("SET foreign_key_checks = 0")->execute();
        $table->truncate();
        $this->query("SET foreign_key_checks = 1")->execute();
    }

    /**
     * @return string table name for seed
     */
    abstract public function getTableName();

    /**
     * @return array item for seed
     */
    abstract public function getSeedItem();

    /**
     * @return \Faker\Generator
     */
    public function getSeeder()
    {

        if (!$this->_seeder) {
            $this->_seeder = Factory::create();
        }

        return $this->_seeder;
    }
}
