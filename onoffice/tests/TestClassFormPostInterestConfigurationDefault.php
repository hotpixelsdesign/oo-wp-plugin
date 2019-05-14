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

declare (strict_types=1);

namespace onOffice\tests;

use onOffice\WPlugin\Form\FormPostInterestConfigurationDefault;
use onOffice\WPlugin\SDKWrapper;
use WP_UnitTestCase;

/**
 *
 */

class TestClassFormPostInterestConfigurationDefault
	extends WP_UnitTestCase
{
	/** @var FormPostInterestConfigurationDefault */
	private $_pSubject = null;


	/**
	 *
	 * @before
	 *
	 */

	public function prepare()
	{
		$this->_pSubject = new FormPostInterestConfigurationDefault();
	}


	/**
	 *
	 */

	public function testGetPostValues()
	{
		$_POST = ['test' => 'asdfpost'];
		$this->assertEquals(['test' => 'asdfpost'], $this->_pSubject->getPostValues());
	}


	/**
	 *
	 */

	public function testGetSDKWrapper()
	{
		$this->assertInstanceOf(SDKWrapper::class, $this->_pSubject->getSDKWrapper());
	}
}