<?php

/**
 *
 * Copyright 2011-2013, Museu Exploratório de Ciências da Unicamp (http://www.museudeciencias.com.br)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2011-2013, Museu Exploratório de Ciências da Unicamp (http://www.museudeciencias.com.br)
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 * @link          https://github.com/museudecienciasunicamp/mexc_contacts.git Mexc Contacts public repository
 */

class MexcContactsController extends MexcContactsAppController
{
	var $name = 'MexcContacts';
	var $uses = array('SiteFactory.FactSection', 'MexcContacts.MexcContact');
	var $components = array('MexcMail', 'Session');
	
	function index()
	{
		$section = $this->FactSection->find('first', array(
			'contain' => array('FactSite'),
			'conditions' => array(
				'FactSection.type' => 'contact',
				'FactSite.mexc_space_id' => $this->currentSpace
			)
		));
		
		$sent = false;
		if (!empty($this->data) && $this->MexcContact->create($this->data) && $this->MexcContact->validates())
		{
			if (!empty($section['FactSection']['metadata']['email']))
			{
				$this->set('mail_data', $this->data + $section);
				$sent = $this->MexcMail->send($section['FactSection']['metadata']['email'], $section['FactSite']['name'], 'Contato', 'contact');
				if ($sent)
				{
					$this->Session->write('MexcContacts.sentMail', true);
					$this->Session->setFlash(__d('mexc_contacts', 'Seu comentário foi enviado com sucesso.', true));
					$this->redirect(array('action' => 'success', 'space' => $this->currentSpace));
				}
			}
			
			$this->Session->setFlash(__d('mexc_contacts', 'Não foi possível enviar o seu comentário.', true));
		}
		
		$this->set(compact('section'));
	}
	
	function success()
	{
		if (!$this->Session->read('MexcContacts.sentMail'))
			$this->redirect(array('action' => 'index', 'space' => $this->currentSpace));
		$this->Session->delete('MexcContacts.sentMail');
	}
}
