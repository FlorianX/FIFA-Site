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
 * League
 */
class League extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * name
	 * 
	 * @var string
	 * @validate NotEmpty
	 */
	protected $name = '';

	/**
	 * clubs
	 * 
	 * @var \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\FifaStats\Domain\Model\Club>
	 * @cascade remove
	 */
	protected $clubs = NULL;

	/**
	 * country
	 * 
	 * @var \TYPO3\FifaStats\Domain\Model\Country
	 */
	protected $country = NULL;

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
		$this->clubs = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
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
	 * Adds a Club
	 * 
	 * @param \TYPO3\FifaStats\Domain\Model\Club $club
	 * @return void
	 */
	public function addClub(\TYPO3\FifaStats\Domain\Model\Club $club) {
		$this->clubs->attach($club);
	}

	/**
	 * Removes a Club
	 * 
	 * @param \TYPO3\FifaStats\Domain\Model\Club $clubToRemove The Club to be removed
	 * @return void
	 */
	public function removeClub(\TYPO3\FifaStats\Domain\Model\Club $clubToRemove) {
		$this->clubs->detach($clubToRemove);
	}

	/**
	 * Returns the clubs
	 * 
	 * @return \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\FifaStats\Domain\Model\Club> $clubs
	 */
	public function getClubs() {
		return $this->clubs;
	}

	/**
	 * Sets the clubs
	 * 
	 * @param \TYPO3\CMS\Extbase\Persistence\ObjectStorage<\TYPO3\FifaStats\Domain\Model\Club> $clubs
	 * @return void
	 */
	public function setClubs(\TYPO3\CMS\Extbase\Persistence\ObjectStorage $clubs) {
		$this->clubs = $clubs;
	}

	/**
	 * Returns the country
	 * 
	 * @return \TYPO3\FifaStats\Domain\Model\Country $country
	 */
	public function getCountry() {
		return $this->country;
	}

	/**
	 * Sets the country
	 * 
	 * @param \TYPO3\FifaStats\Domain\Model\Country $country
	 * @return void
	 */
	public function setCountry(\TYPO3\FifaStats\Domain\Model\Country $country) {
		$this->country = $country;
	}

}