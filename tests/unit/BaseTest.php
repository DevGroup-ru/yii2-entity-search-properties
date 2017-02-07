<?php

use Codeception\Module\Filesystem;
use Codeception\Specify;
use DevGroup\FlexIntegration\FlexIntegrationModule;

class BaseTest extends \Codeception\Test\Unit
{
    use Specify;
    /**
     * @var \UnitTester
     */
    protected $tester;

    protected function _before()
    {
        /** @var Filesystem $fs */
        $fs = $this->getModule('Filesystem');

    }

    protected function _after()
    {

    }


    /**
     * @return string
     */
    protected function getDataDir()
    {
        return Yii::getAlias('@app/data');
    }
}