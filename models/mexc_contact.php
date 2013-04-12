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

class MexcContact extends MexcContactsAppModel
{
	var $name = 'MexcContact';
	var $useTable = false;
	
	function __construct($id = false, $table = null, $ds = null)
	{
		$this->validate = array(
			'name' => array(
				'rule' => 'notEmpty',
				'message' => __d('mexc_contacts', 'Não deixe de escrever seu nome', true)
			),
			'institution' => array(
				'rule' => 'notEmpty',
				'message' => __d('mexc_contacts', 'Campo obrigatório', true)
			),
			'email' => array(
				'rule' => 'email',
				'message' => __d('mexc_contacts', 'Digite um e-mail válido', true)
			),
			'comments' => array(
				'rule' => 'notEmpty',
				'message' => __d('mexc_contacts', 'Não esqueça de escrever sua mensagem', true)
			)
		);
		
		return parent::__construct($id, $table, $ds);
	}
	
	
	public function factoryActions($action, $data)
	{
		switch ($action)
		{
			case 'create':
				// Get the current FactSite we are working on
				$FactSite = ClassRegistry::init('SiteFactory.FactSite');
				$FactSite->recursive = -1;
				$site = $FactSite->findById($data['FactSection']['fact_site_id']);
		
				// Get an available ID
				$CorkCorktile = ClassRegistry::init('Corktile.CorkCorktile');
				$data['FactSection']['metadata']['corktile_key'] = $CorkCorktile->getAvailableUuid();
		
				// Create the corktile
				$config = array(
					'key' => $data['FactSection']['metadata']['corktile_key'],
					'type' => 'cs_cork',
					'location' => array('public_page', 'fact_sites', $site['FactSite']['mexc_space_id'], 'contact'),
					'title' => sprintf(__d('mexc_contacts', 'Texto da página \'%s\' (página de contato) do programa \'%s\'', true), $data['FactSection']['name'], $site['FactSite']['name']),
					'editorsRecommendations' => __d('fact_site', 'O texto que aparece à direita do formulário de contato pode ser editado aqui nesta página.', true),
					'options' => array(
						'type' => 'fact_site_static',
						'cs_type' => 'fact_site_static'
					)
				);
				if ($CorkCorktile->getData($config) == false)
					return false;
				return $data;
			break;
			
			case 'delete':
				if (!empty($data['FactSection']['metadata']['corktile_key']))
				{
					$CorkCorktile = ClassRegistry::init('Corktile.CorkCorktile');
					return $CorkCorktile->delete($data['FactSection']['metadata']['corktile_key']);
				}
			break;
		}
		
		return true;
	}
}
