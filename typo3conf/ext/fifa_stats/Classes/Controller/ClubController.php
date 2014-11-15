<?php
namespace TYPO3\FifaStats\Controller;


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
 * ClubController
 */
class ClubController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * clubRepository
	 * 
	 * @var \TYPO3\FifaStats\Domain\Repository\ClubRepository
	 * @inject
	 */
	protected $clubRepository = NULL;

	/**
	 * action list
	 * 
	 * @return void
	 */
	public function listAction() {
		$clubs = $this->clubRepository->findAll();
		$this->view->assign('clubs', $clubs);
	}

	/**
	 * action show
	 * 
	 * @param \TYPO3\FifaStats\Domain\Model\Club $club
	 * @return void
	 */
	public function showAction(\TYPO3\FifaStats\Domain\Model\Club $club) {
		$this->view->assign('club', $club);
	}

	/**
	 * action new
	 * 
	 * @param \TYPO3\FifaStats\Domain\Model\Club $newClub
	 * @ignorevalidation $newClub
	 * @return void
	 */
	public function newAction(\TYPO3\FifaStats\Domain\Model\Club $newClub = NULL) {
		$this->view->assign('newClub', $newClub);
	}

	/**
	 * action create
	 * 
	 * @param \TYPO3\FifaStats\Domain\Model\Club $newClub
	 * @return void
	 */
	public function createAction(\TYPO3\FifaStats\Domain\Model\Club $newClub) {
		$this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See <a href="http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain" target="_blank">Wiki</a>', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
		$this->clubRepository->add($newClub);
		$this->redirect('list');
	}

	/**
	 * action edit
	 * 
	 * @param \TYPO3\FifaStats\Domain\Model\Club $club
	 * @ignorevalidation $club
	 * @return void
	 */
	public function editAction(\TYPO3\FifaStats\Domain\Model\Club $club) {
		$this->view->assign('club', $club);
	}

	/**
	 * action update
	 * 
	 * @param \TYPO3\FifaStats\Domain\Model\Club $club
	 * @return void
	 */
	public function updateAction(\TYPO3\FifaStats\Domain\Model\Club $club) {
		$this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See <a href="http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain" target="_blank">Wiki</a>', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
		$this->clubRepository->update($club);
		$this->redirect('list');
	}

	/**
	 * action delete
	 * 
	 * @param \TYPO3\FifaStats\Domain\Model\Club $club
	 * @return void
	 */
	public function deleteAction(\TYPO3\FifaStats\Domain\Model\Club $club) {
		$this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See <a href="http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain" target="_blank">Wiki</a>', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
		$this->clubRepository->remove($club);
		$this->redirect('list');
	}

}