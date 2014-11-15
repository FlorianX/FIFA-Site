<?php
namespace TYPO3\FifaStats\Tests\Unit\Controller;
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2014 Florian Schuhmann 
 *  			Martin Gutsche 
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
 * Test case for class TYPO3\FifaStats\Controller\ClubController.
 *
 * @author Florian Schuhmann 
 * @author Martin Gutsche 
 */
class ClubControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {

	/**
	 * @var \TYPO3\FifaStats\Controller\ClubController
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = $this->getMock('TYPO3\\FifaStats\\Controller\\ClubController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllClubsFromRepositoryAndAssignsThemToView() {

		$allClubs = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$clubRepository = $this->getMock('TYPO3\\FifaStats\\Domain\\Repository\\ClubRepository', array('findAll'), array(), '', FALSE);
		$clubRepository->expects($this->once())->method('findAll')->will($this->returnValue($allClubs));
		$this->inject($this->subject, 'clubRepository', $clubRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('clubs', $allClubs);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function showActionAssignsTheGivenClubToView() {
		$club = new \TYPO3\FifaStats\Domain\Model\Club();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('club', $club);

		$this->subject->showAction($club);
	}

	/**
	 * @test
	 */
	public function newActionAssignsTheGivenClubToView() {
		$club = new \TYPO3\FifaStats\Domain\Model\Club();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('newClub', $club);
		$this->inject($this->subject, 'view', $view);

		$this->subject->newAction($club);
	}

	/**
	 * @test
	 */
	public function createActionAddsTheGivenClubToClubRepository() {
		$club = new \TYPO3\FifaStats\Domain\Model\Club();

		$clubRepository = $this->getMock('TYPO3\\FifaStats\\Domain\\Repository\\ClubRepository', array('add'), array(), '', FALSE);
		$clubRepository->expects($this->once())->method('add')->with($club);
		$this->inject($this->subject, 'clubRepository', $clubRepository);

		$this->subject->createAction($club);
	}

	/**
	 * @test
	 */
	public function editActionAssignsTheGivenClubToView() {
		$club = new \TYPO3\FifaStats\Domain\Model\Club();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('club', $club);

		$this->subject->editAction($club);
	}

	/**
	 * @test
	 */
	public function updateActionUpdatesTheGivenClubInClubRepository() {
		$club = new \TYPO3\FifaStats\Domain\Model\Club();

		$clubRepository = $this->getMock('TYPO3\\FifaStats\\Domain\\Repository\\ClubRepository', array('update'), array(), '', FALSE);
		$clubRepository->expects($this->once())->method('update')->with($club);
		$this->inject($this->subject, 'clubRepository', $clubRepository);

		$this->subject->updateAction($club);
	}

	/**
	 * @test
	 */
	public function deleteActionRemovesTheGivenClubFromClubRepository() {
		$club = new \TYPO3\FifaStats\Domain\Model\Club();

		$clubRepository = $this->getMock('TYPO3\\FifaStats\\Domain\\Repository\\ClubRepository', array('remove'), array(), '', FALSE);
		$clubRepository->expects($this->once())->method('remove')->with($club);
		$this->inject($this->subject, 'clubRepository', $clubRepository);

		$this->subject->deleteAction($club);
	}
}
