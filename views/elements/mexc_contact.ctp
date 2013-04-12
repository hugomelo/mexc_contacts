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

switch ($type[0])
{
	case 'factory':
		switch ($type[1])
		{
			case 'subform':
				echo $this->Buro->input(array(), array(
					'fieldName' => 'metadata.email',
					'label' => __d('mexc_contacts', 'E-mail de envio', true),
					'instructions' => __d('mexc_contacts', 'Digite o e-mail para onde os dados do formulário serão enviados.', true)
				));
				echo $this->Buro->input(array(), array(
					'type' => 'hidden',
					'fieldName' => 'metadata.corktile_key'
				));
			break;
			
			case 'subview':
				echo $this->Bl->strongDry('Endereço de envio'),
					 '&ensp;',
					 $this->Bl->spanDry($data['FactSection']['metadata']['email']);
				
				echo $this->Bl->br();
				
				if (!empty($data['FactSection']['metadata']['corktile_key']))
				{
					echo $this->Bl->br();
					
					echo $this->Bl->anchor(array(),
						array(
							'url' => array(
								'plugin' => 'corktile', 'controller' => 'cork_corktiles', 'action' => 'edit',
								$data['FactSection']['metadata']['corktile_key']
							)
						),
						__d('mexc_contacts', 'Editar texto da página de contato', true)
					);
				}
			break;
		}
	break;
}
