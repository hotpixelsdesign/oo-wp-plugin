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

use onOffice\WPlugin\API\ApiClientException;
use onOffice\WPlugin\PDF\PdfDocumentFetcher;
use onOffice\WPlugin\PDF\PdfDocumentModel;
use onOffice\WPlugin\PDF\PdfDocumentModelValidationException;
use onOffice\WPlugin\PDF\PdfDocumentModelValidator;
use onOffice\WPlugin\PDF\PdfDownload;
use onOffice\WPlugin\PDF\PdfDownloadException;
use WP_UnitTestCase;

/**
 *
 */

class TestClassPdfDownload
	extends WP_UnitTestCase
{
	/** @var PdfDocumentModelValidator */
	private $_pPdfDocumentModelValidator = null;

	/** @var PdfDocumentFetcher */
	private $_pPdfDocumentFetcher = null;

	/** @var PdfDownload */
	private $_pPdfDownload = null;

	/**
	 * @before
	 */
	public function prepare()
	{
		$this->_pPdfDocumentFetcher = $this->getMockBuilder(PdfDocumentFetcher::class)
			->disableOriginalConstructor()
			->getMock();
		$this->_pPdfDocumentModelValidator = $this->getMockBuilder(PdfDocumentModelValidator::class)
			->disableOriginalConstructor()
			->getMock();
		$this->_pPdfDownload = new PdfDownload($this->_pPdfDocumentFetcher, $this->_pPdfDocumentModelValidator);
	}

	/**
	 * @runInSeparateProcess
	 * @preserveGlobalState disabled
	 * @throws ApiClientException
	 * @throws PdfDocumentModelValidationException
	 * @throws PdfDownloadException
	 */
	public function testDownload()
	{
		$url = uniqid();
		$pPdfDocumentModel = new PdfDocumentModel(12, 'testview');

		$this->_pPdfDocumentModelValidator
			->expects($this->once())
			->method('validate')
			->will($this->returnValue($pPdfDocumentModel));
		$this->_pPdfDocumentFetcher
			->expects($this->once())
			->method('fetchUrl')
			->with($pPdfDocumentModel)
			->will($this->returnValue($url));
		$this->_pPdfDocumentFetcher
			->expects($this->once())
			->method('proxyResult')
			->with($pPdfDocumentModel, $url);
		$pSubject = new PdfDownload($this->_pPdfDocumentFetcher, $this->_pPdfDocumentModelValidator);
		$pSubject->download($pPdfDocumentModel);
	}
}
