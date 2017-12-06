<?php

/**
 *
 *    Copyright (C) 2017 onOffice GmbH
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
namespace onOffice\WPlugin\Renderer;

/**
 *
 * @url http://www.onoffice.de
 * @copyright 2003-2017, onOffice(R) GmbH
 *
 */

class InputFieldCheckboxButtonRenderer
	extends InputFieldCheckboxRenderer
{

	/** @var string */
	private $_id = null;

	/**
	 *
	 * @param string $name
	 * @param mixed $value
	 *
	 */

	public function __construct($name, $value)
	{
		parent::__construct($name, $value);
	}


	/**
	 *
	 * @param string $id
	 *
	 */

	public function setId($id)
	 { $this->_id = $id; }


	/**
	 *
	 * @return string
	 *
	 */

	public function getId()
	{ return $this->_id; }


	/**
	 *
	 */

	public function render()
	{
		parent::render();
		echo '<p>'
			.'<input type="submit" class="inputFieldCheckboxButton" name="'.$this->_id.'" value="'.__('Add', 'onoffice').'">'
			.'</p>';
	}
}