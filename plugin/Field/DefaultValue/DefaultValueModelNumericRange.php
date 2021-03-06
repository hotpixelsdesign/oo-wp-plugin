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

namespace onOffice\WPlugin\Field\DefaultValue;

/**
 *
 */
class DefaultValueModelNumericRange
	extends DefaultValueModelBase
{
	/** @var float */
	private $_valueFrom = .0;

	/** @var float */
	private $_valueTo = .0;

	/**
	 * @return float
	 */
	public function getValueFrom(): float
	{
		return $this->_valueFrom;
	}

	/**
	 * @param float $valueFrom
	 */
	public function setValueFrom(float $valueFrom)
	{
		$this->_valueFrom = $valueFrom;
	}

	/**
	 * @return float
	 */
	public function getValueTo(): float
	{
		return $this->_valueTo;
	}

	/**
	 * @param float $valueTo
	 */
	public function setValueTo(float $valueTo)
	{
		$this->_valueTo = $valueTo;
	}
}