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
 * Test case for class TYPO3\FifaStats\Controller\LeagueController.
 *
 * @author Florian Schuhmann 
 * @author Martin Gutsche 
 */
class LeagueControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase {

	/**
	 * @var \TYPO3\FifaStats\Controller\LeagueController
	 */
	protected $subject = NULL;

	protected function setUp() {
		$this->subject = $this->getMock('TYPO3\\FifaStats\\Controller\\LeagueController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	protected function tearDown() {
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllLeaguesFromRepositoryAndAssignsThemToView() {

		$allLeagues = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$leagueRepository = $this->getMock('TYPO3\\FifaStats\\Domain\\Repository\\LeagueRepository', array('findAll'), array(), '', FALSE);
		$leagueRepository->expects($this->once())->method('findAll')->will($this->returnValue($allLeagues));
		$this->inject($this->subject, 'leagueRepository', $leagueRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('leagues', $allLeagues);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function showActionAssignsTheGivenLeagueToView() {
		$league = new \TYPO3\FifaStats\Domain\Model\League();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('league', $league);

		$this->subject->showAction($league);
	}

	/**
	 * @test
	 */
	public function newActionAssignsTheGivenLeagueToView() {
		$league = new \TYPO3\FifaStats\Domain\Model\League();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('newLeague', $league);
		$this->inject($this->subject, 'view', $view);

		$this->subject->newAction($league);
	}

	/**
	 * @test
	 */
	public function createActionAddsTheGivenLeagueToLeagueRepository() {
		$league = new \TYPO3\FifaStats\Domain\Model\League();

		$leagueRepository = $this->getMock('TYPO3\\FifaStats\\Domain\\Repository\\LeagueRepository', array('add'), array(), '', FALSE);
		$leagueRepository->expects($this->once())->method('add')->with($league);
		$this->inject($this->subject, 'leagueRepository', $leagueRepository);

		$this->subject->createAction($league);
	}

	/**
	 * @test
	 */
	public function editActionAssignsTheGivenLeagueToView() {
		$league = new \TYPO3\FifaStats\Domain\Model\League();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('league', $league);

		$this->subject->editAction($league);
	}

	/**
	 * @test
	 */
	public function updateActionUpdatesTheGivenLeagueInLeagueRepository() {
		$league = new \TYPO3\FifaStats\Domain\Model\League();

		$leagueRepository = $this->getMock('TYPO3\\FifaStats\\Domain\\Repository\\LeagueRepository', array('update'), array(), '', FALSE);
		$leagueRepository->expects($this->once())->method('update')->with($league);
		$this->inject($this->subject, 'leagueRepository', $leagueRepository);

		$this->subject->updateAction($league);
	}

	/**
	 * @test
	 */
	public function deleteActionRemovesTheGivenLeagueFromLeagueRepository() {
		$league = new \TYPO3\FifaStats\Domain\Model\League();

		$leagueRepository = $this->getMock('TYPO3\\FifaStats\\Domain\\Repository\\LeagueRepository', array('remove'), array(), '', FALSE);
		$leagueRepository->expects($this->once())->method('remove')->with($league);
		$this->inject($this->subject, 'leagueRepository', $leagueRepository);

		$this->subject->deleteAction($league);
	}
}
