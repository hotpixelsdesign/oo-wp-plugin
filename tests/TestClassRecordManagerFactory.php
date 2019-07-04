<?php

/**
 *
 *    Copyright (C) 2018 onOffice GmbH
 *
 *    This program is free software: you can redistribute it and/or modify
 *    it under the terms of the GNU Affero General Public License as published by
 *    the Free Software Foundation, either version 3 of the License, or
 *    (at your option) any later version.
 *
 *    This program is distributed in the hope that it will be useful,
 *    but WITHOUT ANY WARRANTY; without even the implied warranty of
 *    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *    GNU Affero General Public License for more details.
 *
 *    You should have received a copy of the GNU Affero General Public License
 *    along with this program.  If not, see <http://www.gnu.org/licenses/>.
 *
 */

declare (strict_types=1);

namespace onOffice\tests;

use onOffice\WPlugin\Record\RecordManager;
use onOffice\WPlugin\Record\RecordManagerFactory;
use WP_UnitTestCase;

/**
 *
 * @url http://www.onoffice.de
 * @copyright 2003-2018, onOffice(R) GmbH
 *
 */

class TestClassRecordManagerFactory
	extends WP_UnitTestCase
{
	/** @var array */
	private static $_combinations = array(
		RecordManagerFactory::TYPE_ADDRESS => array(
			RecordManagerFactory::ACTION_READ => '\onOffice\WPlugin\Record\RecordManagerReadListViewAddress',
			RecordManagerFactory::ACTION_INSERT => '\onOffice\WPlugin\Record\RecordManagerInsertGeneric',
			RecordManagerFactory::ACTION_UPDATE => '\onOffice\WPlugin\Record\RecordManagerUpdateListViewAddress',
			RecordManagerFactory::ACTION_DELETE => '\onOffice\WPlugin\Record\RecordManagerDeleteListViewAddress',
		),
		RecordManagerFactory::TYPE_ESTATE => array(
			RecordManagerFactory::ACTION_READ => '\onOffice\WPlugin\Record\RecordManagerReadListViewEstate',
			RecordManagerFactory::ACTION_INSERT => '\onOffice\WPlugin\Record\RecordManagerInsertGeneric',
			RecordManagerFactory::ACTION_UPDATE => '\onOffice\WPlugin\Record\RecordManagerUpdateListViewEstate',
			RecordManagerFactory::ACTION_DELETE => '\onOffice\WPlugin\Record\RecordManagerDeleteListViewEstate',
		),
		RecordManagerFactory::TYPE_FORM => array(
			RecordManagerFactory::ACTION_READ => '\onOffice\WPlugin\Record\RecordManagerReadForm',
			RecordManagerFactory::ACTION_INSERT => '\onOffice\WPlugin\Record\RecordManagerInsertGeneric',
			RecordManagerFactory::ACTION_UPDATE => '\onOffice\WPlugin\Record\RecordManagerUpdateForm',
			RecordManagerFactory::ACTION_DELETE => '\onOffice\WPlugin\Record\RecordManagerDeleteForm',
		),
	);


	/**
	 *
	 * @covers onOffice\WPlugin\Record\RecordManagerFactory::createByTypeAndAction
	 *
	 */

	public function testCreateByTypeAndAction()
	{
		foreach (self::$_combinations as $type => $actionClass) {
			foreach ($actionClass as $action => $class) {
				$this->execute($type, $action, $class);
			}
		}
	}


	/**
	 *
	 * @param string $type
	 * @param string $action
	 * @param string $class
	 *
	 */

	private function execute($type, $action, $class)
	{
		$recordId = null;

		if ($action === RecordManagerFactory::ACTION_UPDATE) {
			$recordId = 1;
		}

		$pRecordManager = RecordManagerFactory::createByTypeAndAction
			($type, $action, $recordId);
		$this->assertInstanceOf($class, $pRecordManager);
	}


	/**
	 *
	 * @covers onOffice\WPlugin\Record\RecordManagerFactory::getGenericClassTables
	 *
	 */

	public function testGetGenericClassTables()
	{
		$expected = array(
			RecordManagerFactory::TYPE_ADDRESS => RecordManager::TABLENAME_LIST_VIEW_ADDRESS,
			RecordManagerFactory::TYPE_ESTATE => RecordManager::TABLENAME_LIST_VIEW,
			RecordManagerFactory::TYPE_FORM => RecordManager::TABLENAME_FORMS,
		);

		$genericTables = RecordManagerFactory::getGenericClassTables();
		$this->assertEquals($expected, $genericTables);
	}
}