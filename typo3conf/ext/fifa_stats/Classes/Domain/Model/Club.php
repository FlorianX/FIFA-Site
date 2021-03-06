<?php
namespace TYPO3\FifaStats\Domain\Model;


/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2014 Florian Schuhmann
 *           Martin Gutsche
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Club
 */
class Club extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * name
	 * 
	 * @var string
	 * @validate NotEmpty
	 */
	protected $name = '';

	/**
	 * league
	 * 
	 * @var \TYPO3\FifaStats\Domain\Model\League
	 */
	protected $league = NULL;

	/**
	 * Returns the name
	 * 
	 * @return string $name
	 */
	public function getName() {
		return $this->name;
	}

	/**
	 * Sets the name
	 * 
	 * @param string $name
	 * @return void
	 */
	public function setName($name) {
		$this->name = $name;
	}

	/**
	 * Returns the league
	 * 
	 * @return \TYPO3\FifaStats\Domain\Model\League $league
	 */
	public function getLeague() {
		return $this->league;
	}

	/**
	 * Sets the league
	 * 
	 * @param \TYPO3\FifaStats\Domain\Model\League $league
	 * @return void
	 */
	public function setLeague(\TYPO3\FifaStats\Domain\Model\League $league) {
		$this->league = $league;
	}

}