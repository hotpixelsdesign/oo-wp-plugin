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

namespace onOffice\WPlugin\WP;

use Exception;
use onOffice\WPlugin\Controller\Exception\ExceptionPrettyPrintable;
use function __;

/**
 *
 */

class UnknownPageException
	extends Exception
	implements ExceptionPrettyPrintable
{
	/**
	 *
	 * @return string
	 *
	 */

	public function printFormatted(): string
	{
		/* translators: %s is the path of a page. */
		return sprintf(__('Bad path "%s". The Page was not found.', 'onoffice-for-wp-websites'), $this->message);
	}
}
