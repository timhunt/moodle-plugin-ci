<?php

/*
 * This file is part of the Moodle Plugin CI package.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Copyright (c) 2017 Blackboard Inc. (http://www.blackboard.com)
 * License http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

namespace Moodlerooms\MoodlePluginCI\Tests\Installer\Database;

use Moodlerooms\MoodlePluginCI\Installer\Database\MariaDBDatabase;

class MariaDBDatabaseTest extends \PHPUnit_Framework_TestCase
{
    public function testGetCreateDatabaseCommand()
    {
        $database       = new MariaDBDatabase();
        $database->name = 'TestName';
        $database->user = 'TestUser';
        $database->pass = 'TestPass';
        $database->host = 'TestHost';

        $expected = 'mysql -u \'TestUser\' --password=\'TestPass\' -h \'TestHost\' -e \'CREATE DATABASE `TestName` DEFAULT CHARACTER SET UTF8 COLLATE utf8_general_ci;\'';
        $this->assertSame($expected, $database->getCreateDatabaseCommand());
    }
}
