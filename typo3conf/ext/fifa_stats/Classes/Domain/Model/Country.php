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
 * Country
 */
class Country extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * name
	 * 
	 * @var string
	 * @validate NotEmpty
	 */
	protected $name = '';

	/**
	 * leagues
	 * 
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\FifaStats\Domain\Model\League>
	 * @cascade remove
	 */
	protected $leagues = NULL;

	/**
	 * __construct
	 */
	public function __construct() {
		//Do not remove the next line: It would break the functionality
		$this->initStorageObjects();
	}

	/**
	 * Initializes all ObjectStorage properties
	 * Do not modify this method!
	 * It will be rewritten on each save in the extension builder
	 * You may modify the constructor of this class instead
	 * 
	 * @return void
	 */
	protected function initStorageObjects() {
		$this->leagues = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
	}

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
	 * Adds a League
	 * 
	 * @param \TYPO3\FifaStats\Domain\Model\League $league
	 * @return void
	 */
	public function addLeague(\TYPO3\FifaStats\Domain\Model\League $league) {
		$this->leagues->attach($league);
	}

	/**
	 * Removes a League
	 * 
	 * @param \TYPO3\FifaStats\Domain\Model\League $leagueToRemove The League to be removed
	 * @return void
	 */
	public function removeLeague(\TYPO3\FifaStats\Domain\Model\League $leagueToRemove) {
		$this->leagues->detach($leagueToRemove);
	}

	/**
	 * Returns the leagues
	 * 
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\FifaStats\Domain\Model\League> $leagues
	 */
	public function getLeagues() {
		return $this->leagues;
	}

	/**
	 * Sets the leagues
	 * 
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\FifaStats\Domain\Model\League> $leagues
	 * @return void
	 */
	public function setLeagues(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $leagues) {
		$this->leagues = $leagues;
	}

}