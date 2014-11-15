<?php

namespace TYPO3\FifaStats\Tests\Unit\Domain\Model;

/***************************************************************
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
 *  the Free Software Foundation; either version 2 of the License, or
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
 * Test case for class \TYPO3\FifaStats\Domain\Model\Country.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Florian Schuhmann 
 * @author Martin Gutsche 
 */
class CountryTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {
	/**
	 * @var \TYPO3\FifaStats\Domain\Model\Country
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = new \TYPO3\FifaStats\Domain\Model\Country();
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getNameReturnsInitialValueForString() {
		$this->assertSame(
			'',
			$this->subject->getName()
		);
	}

	/**
	 * @test
	 */
	public function setNameForStringSetsName() {
		$this->subject->setName('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'name',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getLeaguesReturnsInitialValueForLeague() {
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getLeagues()
		);
	}

	/**
	 * @test
	 */
	public function setLeaguesForObjectStorageContainingLeagueSetsLeagues() {
		$league = new \TYPO3\FifaStats\Domain\Model\League();
		$objectStorageHoldingExactlyOneLeagues = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneLeagues->attach($league);
		$this->subject->setLeagues($objectStorageHoldingExactlyOneLeagues);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneLeagues,
			'leagues',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addLeagueToObjectStorageHoldingLeagues() {
		$league = new \TYPO3\FifaStats\Domain\Model\League();
		$leaguesObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$leaguesObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($league));
		$this->inject($this->subject, 'leagues', $leaguesObjectStorageMock);

		$this->subject->addLeague($league);
	}

	/**
	 * @test
	 */
	public function removeLeagueFromObjectStorageHoldingLeagues() {
		$league = new \TYPO3\FifaStats\Domain\Model\League();
		$leaguesObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$leaguesObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($league));
		$this->inject($this->subject, 'leagues', $leaguesObjectStorageMock);

		$this->subject->removeLeague($league);

	}
}
