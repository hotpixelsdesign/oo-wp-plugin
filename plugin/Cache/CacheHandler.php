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

namespace onOffice\WPlugin\Cache;

use onOffice\SDK\Cache\onOfficeSDKCache;
use onOffice\WPlugin\SDKWrapper;


/**
 *
 */

class CacheHandler
{
	/** @var SDKWrapper */
	private $_pSDKWrapper = null;


	/**
	 *
	 * @param SDKWrapper $pSDKWrapper
	 *
	 */

	public function __construct(SDKWrapper $pSDKWrapper)
	{
		$this->_pSDKWrapper = $pSDKWrapper;
	}


	/**
	 *
	 */

	public function clear()
	{
		foreach ($this->_pSDKWrapper->getCache() as $pCache) {
			/* @var $pCache onOfficeSDKCache */
			$pCache->clearAll();
		}
	}


	/**
	 *
	 */

	public function clean()
	{
		foreach ($this->_pSDKWrapper->getCache() as $pCache) {
			/* @var $pCache onOfficeSDKCache */
			$pCache->cleanup();
		}
	}
}