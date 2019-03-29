<?php

/**
 *
 *    Copyright (C) 2019 onOffice GmbH
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

use onOffice\WPlugin\DataView\DataListView;
use onOffice\WPlugin\DataView\DataListViewFactoryBase;
use onOffice\WPlugin\Record\RecordManagerRead;

/**
 *
 * @url http://www.onoffice.de
 * @copyright 2003-2019, onOffice(R) GmbH
 *
 */
class TestClassDataListViewFactoryBase
	extends WP_UnitTestCase
{
	/** @var DataListViewFactoryBase */
	private $_pMockDataListViewFactoryBase = null;

	/** @var RecordManagerRead */
	private $_pMockRecordManagerRead = null;


	/**
	 *
	 */

	public function testGetListviewByNameSuccess()
	{
		$this->_pMockRecordManagerRead
			->method('getRowByName')
			->will($this->returnValue(['name' => 'test']));
		$this->_pMockDataListViewFactoryBase->getListViewByName('test');
	}


	/**
	 *
	 * @expectedException onOffice\WPlugin\DataView\UnknownViewException
	 *
	 */

	public function testGetListviewByNameError()
	{
		$this->_pMockRecordManagerRead
			->method('getRowByName')
			->will($this->returnValue(null));
		$pResult = $this->_pMockDataListViewFactoryBase->getListViewByName('asd');
		$this->assertInstanceOf(DataListView::class, $pResult);
	}


	/**
	 *
	 */

	public function testGetRecordManagerRead()
	{
		$pRecordManager = $this->_pMockDataListViewFactoryBase->getRecordManagerRead();
		$this->assertInstanceOf(RecordManagerRead::class, $pRecordManager);
	}


	/**
	 *
	 * @before
	 *
	 */

	public function prepare()
	{
		$pMockDataListViewFactoryBase = $this->getMock(DataListViewFactoryBase::class,
			['createListViewByRow']);
		$this->_pMockRecordManagerRead = $this->getMock(RecordManagerRead::class,
			['getRowByName', 'getRecords']);
		$pNewRecordFinder = $this->_pMockRecordManagerRead;

		Closure::bind(function() use ($pNewRecordFinder) {
			$this->setRecordManagerRead($pNewRecordFinder);
		}, $pMockDataListViewFactoryBase, DataListViewFactoryBase::class)();

		$this->_pMockDataListViewFactoryBase = $pMockDataListViewFactoryBase;
	}
}