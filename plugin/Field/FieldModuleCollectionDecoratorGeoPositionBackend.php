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

declare(strict_types=1);

namespace onOffice\WPlugin\Field;

use onOffice\SDK\onOfficeSDK;
use onOffice\WPlugin\GeoPosition;
use onOffice\WPlugin\Types\Field;
use onOffice\WPlugin\Types\FieldTypes;
use function __;


/**
 *
 * @url http://www.onoffice.de
 * @copyright 2003-2018, onOffice(R) GmbH
 *
 */

class FieldModuleCollectionDecoratorGeoPositionBackend
	extends FieldModuleCollectionDecoratorAbstract
{
	/** @var array */
	private $_geoFields = [
		// geoPosition for searchcriteria gets added by FieldLoaderSearchCriteria.
		// Reading geoPosition for estate in FieldLoaderGeneric is not possible right now
		// since FieldLoader/Collections must co-exist with Fieldnames which never added the field.
		onOfficeSDK::MODULE_ESTATE => [
			GeoPosition::FIELD_GEO_POSITION => [
				'type' => FieldTypes::FIELD_TYPE_VARCHAR,
				'length' => 250,
				'permittedvalues' => [],
				'default' => null,
				'label' => 'Geo Position',
			],
		],
	];


	/**
	 *
	 * @param FieldModuleCollection $pFieldModuleCollection
	 *
	 */

	public function __construct(FieldModuleCollection $pFieldModuleCollection)
	{
		parent::__construct($pFieldModuleCollection);
		$this->_geoFields[onOfficeSDK::MODULE_ESTATE][GeoPosition::FIELD_GEO_POSITION]['content'] =
			__('Geo Range Search', 'onoffice-for-wp-websites');
	}


	/**
	 *
	 * @return Field[]
	 *
	 */

	public function getAllFields(): array
	{
		$newFields = $this->generateListOfMergedFieldsByModule($this->_geoFields);
		return array_merge($this->getFieldModuleCollection()->getAllFields(), $newFields);
	}


	/**
	 *
	 * @param string $module
	 * @param string $name
	 * @return Field
	 *
	 */

	public function getFieldByModuleAndName(string $module, string $name): Field
	{
		$row = $this->_geoFields[$module][$name] ?? null;
		if ($row !== null) {
			$row['module'] = $module;
			return Field::createByRow($name, $row);
		}
		return parent::getFieldByModuleAndName($module, $name);
	}


	/**
	 *
	 * @param string $module
	 * @param string $name
	 * @return bool
	 *
	 */

	public function containsFieldByModule(string $module, string $name): bool
	{
		return isset($this->_geoFields[$module][$name]) ||
			parent::containsFieldByModule($module, $name);
	}
}
