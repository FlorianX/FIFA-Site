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
 * Player
 */
class Player extends \TYPO3\CMS\Extbase\DomainObject\AbstractEntity {

	/**
	 * userName
	 * 
	 * @var string
	 * @validate NotEmpty
	 */
	protected $userName = '';

	/**
	 * realName
	 * 
	 * @var string
	 * @validate NotEmpty
	 */
	protected $realName = '';

	/**
	 * Returns the userName
	 * 
	 * @return string $userName
	 */
	public function getUserName() {
		return $this->userName;
	}

	/**
	 * Sets the userName
	 * 
	 * @param string $userName
	 * @return void
	 */
	public function setUserName($userName) {
		$this->userName = $userName;
	}

	/**
	 * Returns the realName
	 * 
	 * @return string $realName
	 */
	public function getRealName() {
		return $this->realName;
	}

	/**
	 * Sets the realName
	 * 
	 * @param string $realName
	 * @return void
	 */
	public function setRealName($realName) {
		$this->realName = $realName;
	}

}