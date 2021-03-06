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
 * PlayerController
 */
class PlayerController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController {

	/**
	 * playerRepository
	 * 
	 * @var \TYPO3\FifaStats\Domain\Repository\PlayerRepository
	 * @inject
	 */
	protected $playerRepository = NULL;

	/**
	 * action list
	 * 
	 * @return void
	 */
	public function listAction() {
		$players = $this->playerRepository->findAll();
		$this->view->assign('players', $players);
	}

	/**
	 * action show
	 * 
	 * @param \TYPO3\FifaStats\Domain\Model\Player $player
	 * @return void
	 */
	public function showAction(\TYPO3\FifaStats\Domain\Model\Player $player) {
		$this->view->assign('player', $player);
	}

	/**
	 * action new
	 * 
	 * @param \TYPO3\FifaStats\Domain\Model\Player $newPlayer
	 * @ignorevalidation $newPlayer
	 * @return void
	 */
	public function newAction(\TYPO3\FifaStats\Domain\Model\Player $newPlayer = NULL) {
		$this->view->assign('newPlayer', $newPlayer);
	}

	/**
	 * action create
	 * 
	 * @param \TYPO3\FifaStats\Domain\Model\Player $newPlayer
	 * @return void
	 */
	public function createAction(\TYPO3\FifaStats\Domain\Model\Player $newPlayer) {
		$this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See <a href="http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain" target="_blank">Wiki</a>', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
		$this->playerRepository->add($newPlayer);
		$this->redirect('list');
	}

	/**
	 * action edit
	 * 
	 * @param \TYPO3\FifaStats\Domain\Model\Player $player
	 * @ignorevalidation $player
	 * @return void
	 */
	public function editAction(\TYPO3\FifaStats\Domain\Model\Player $player) {
		$this->view->assign('player', $player);
	}

	/**
	 * action update
	 * 
	 * @param \TYPO3\FifaStats\Domain\Model\Player $player
	 * @return void
	 */
	public function updateAction(\TYPO3\FifaStats\Domain\Model\Player $player) {
		$this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See <a href="http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain" target="_blank">Wiki</a>', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
		$this->playerRepository->update($player);
		$this->redirect('list');
	}

	/**
	 * action delete
	 * 
	 * @param \TYPO3\FifaStats\Domain\Model\Player $player
	 * @return void
	 */
	public function deleteAction(\TYPO3\FifaStats\Domain\Model\Player $player) {
		$this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See <a href="http://wiki.typo3.org/T3Doc/Extension_Builder/Using_the_Extension_Builder#1._Model_the_domain" target="_blank">Wiki</a>', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
		$this->playerRepository->remove($player);
		$this->redirect('list');
	}

}