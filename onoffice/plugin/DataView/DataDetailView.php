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

namespace onOffice\WPlugin\DataView;

use onOffice\WPlugin\Types\MovieLinkTypes;

/**
 *
 * @url http://www.onoffice.de
 * @copyright 2003-2017, onOffice(R) GmbH
 *
 * DO NOT MOVE OR RENAME - NAME AND/OR NAMESPACE MAY BE USED IN SERIALIZED DATA
 *
 */

class DataDetailView
	implements DataView
{
	/** */
	const PICTURES = 'pictures';

	/** */
	const FIELDS = 'fields';

	/** */
	const ADDRESSFIELDS = 'addressfields';

	/** @var string[] */
	private $_fields = [
		'objekttitel',
		'objektart',
		'objekttyp',
		'vermarktungsart',
		'plz',
		'ort',
		'bundesland',
		'objektnr_extern',
		'wohnflaeche',
		'grundstuecksflaeche',
		'nutzflaeche',
		'anzahl_zimmer',
		'anzahl_badezimmer',
		'kaufpreis',
		'kaltmiete',
		'objektbeschreibung',
		'lage',
		'ausstatt_beschr',
		'sonstige_angaben',
	];

	/** @var string[] */
	private $_addressFields = [
		'Anrede',
		'Vorname',
		'Name',
		'Zusatz1',
		'Strasse',
		'Plz',
		'Ort',
		'Telefon1',
		'mobile',
	];

	/** @var string[] */
	private $_pictureTypes = [];

	/** @var string */
	private $_template = '';

	/** @var string */
	private $_expose = '';

	/** @var int */
	private $_pageId = 0;

	/** @var int */
	private $_movieLinks = MovieLinkTypes::MOVIE_LINKS_NONE;


	/** @return array */
	public function getFields(): array
		{ return $this->_fields; }

	/** @return array */
	public function getPictureTypes(): array
		{ return $this->_pictureTypes; }

	/** @return string */
	public function getTemplate(): string
		{ return $this->_template; }

	/** @return string */
	public function getExpose(): string
		{ return $this->_expose; }

	/** @return string */
	public function getName(): string
		{ return 'detail'; }

	/** @return string[] */
	public function getAddressFields(): array
		{ return $this->_addressFields; }

	/** @return int */
	public function getPageId(): int
		{ return $this->_pageId; }

	/** @param array $fields */
	public function setFields(array $fields)
		{ $this->_fields = $fields; }

	/** @param array $pictureTypes */
	public function setPictureTypes(array $pictureTypes)
		{ $this->_pictureTypes = $pictureTypes; }

	/** @param string $template */
	public function setTemplate(string $template)
		{ $this->_template = $template; }

	/** @param string $expose */
	public function setExpose(string $expose)
		{ $this->_expose = $expose; }

	/** @param int $pageId */
	public function setPageId(int $pageId)
		{ $this->_pageId = $pageId; }

	/** @var string[] $addressFields */
	public function setAddressFields(array $addressFields)
		{ $this->_addressFields = $addressFields; }

	/** @return int */
	public function getMovieLinks(): int
		{ return $this->_movieLinks; }

	/** @param int $movieLinks */
	public function setMovieLinks(int $movieLinks)
		{ $this->_movieLinks = $movieLinks; }
}
