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


namespace onOffice\WPlugin\Filter\SearchParameters;

use onOffice\WPlugin\Filter\SearchParameters\SearchParametersModel;
use function add_query_arg;
use function esc_url;
use function get_permalink;
use function trailingslashit;
use function user_trailingslashit;

/**
 *
 * class that holds submitted get parameters for the pagination
 *
 */

class SearchParameters
{

	/**
	 *
	 * Generates a pagelink for pagination with given parameters as GET Request
	 *
	 * partly taken from wp_link_pages() and _wp_link_page()
	 *
	 * @global int $page
	 * @global bool $more
	 * @param string $link
	 * @param int $i
	 * @return string
	 *
	 */

	public function linkPagesLink(string $link, int $i, SearchParametersModel $pModel): string
	{
		global $page, $more;

		$linkparams = $pModel->getDefaultLinkParams();
		$output = '';

		if ('number' == $linkparams['next_or_number']) {
			$link = $linkparams['link_before'].str_replace('%', $i, $linkparams['pagelink'])
				.$linkparams['link_after'];
			if ($i != $page || ! $more && 1 == $page) {
				$url = $this->geturl( $i, $pModel->getParameters() );
				$output .= '<a href="'.esc_url($url).'">'.$link.'</a>';
			} else {
				$output .= $link;
			}
		} elseif ($more) {
			$output .= $this->getLinkSnippetForPage($i, $page, $linkparams, $pModel);
		}

		return $output;
	}


	/**
	 *
	 * @param int $i
	 * @param int $page
	 * @param array $linkparams
	 * @param  SearchParametersModel $pModel
	 * @return string
	 *
	 */

	private function getLinkSnippetForPage(int $i, int $page, array $linkparams, SearchParametersModel $pModel): string
	{
		$key = $i < $page ? 'previouspagelink' : 'nextpagelink';

		return '<a href="'.esc_url($this->geturl($i, $pModel->getParameters())).'">'
			.$linkparams['link_before'].$linkparams[$key]
			.$linkparams['link_after'].'</a>';
	}


	/**
	 *
	 * @param int $i
	 * @param array $parameters
	 * @return string
	 *
	 */

	private function geturl($i, array $parameters): string
	{
		$url = trailingslashit(get_permalink()).user_trailingslashit($i, 'single_paged');
		return add_query_arg($parameters, $url);
	}
}