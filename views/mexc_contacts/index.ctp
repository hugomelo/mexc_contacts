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

echo $this->Bl->sboxContainer(array(), array('size' => array('M' => 10)));

	echo $this->Bl->sbox(array(), array('size' => array('M' => 10, 'g' => -1), 'type' => 'cloud'));
		echo $this->Bl->h2(array('class' => 'section_title'), array(), __d('mexc_contacts', 'Contato', true));

	
		echo $this->Bl->sboxContainer(array(), array('size' => array('M' => 10), 'type' => 'column_container'));
			echo $this->Bl->sboxContainer(array(), array('size' => array('M' => 6)));
			echo $this->Bl->sbox(array(), array('size' => array('M' => 5, 'g' => -1), 'type' => 'inner_column'));

				echo $this->Form->create('MexcContact', array('url' => $this->here));
					echo $this->Form->input('name', array('label' => __d('mexc_contacts', 'Nome', true)));
					echo $this->Form->input('institution', array('label' => __d('mexc_contacts', 'Escola / instituição', true)));
					echo $this->Form->input('email', array('label' => __d('mexc_contacts', 'E-mail', true)));
					echo $this->Form->input('function', array('label' => __d('mexc_contacts', 'Sua função na escola / instituição', true)));
				
					echo $this->Bl->sboxContainer(array(), array('size' => array('M' => 2, 'g' => -1)));
					echo $this->Bl->sboxContainer(array(), array('size' => array('M' => 2, 'g' => -2)));
						echo $this->Form->input('state', array('label' => __d('mexc_contacts', 'Estado', true)));
					echo $this->Bl->eboxContainer();
					echo $this->Bl->eboxContainer();
				
					echo $this->Bl->sboxContainer(array(), array('size' => array('M' => 3, 'g' => -1)));
						echo $this->Form->input('city', array('label' => __d('mexc_contacts', 'Cidade', true)));
					echo $this->Bl->eboxContainer();
					echo $this->Bl->floatBreak();
				
					echo $this->Form->input('comments', array('label' => __d('mexc_contacts', 'Comentários', true), 'type' => 'textarea'));
			
					echo $this->Bl->br();
			
					echo $this->Bl->button(array('type' => 'submit'), array(), __d('mexc_contacts', 'Enviar', true));
				echo $this->Form->end();

			echo $this->Bl->ebox();
			echo $this->Bl->eboxContainer();
	
			echo $this->Bl->sbox(array(), array('size' => array('M' => 4, 'g' => -1), 'type' => 'inner_column'));
				echo $this->Cork->tile(array(), array(
					'key' => $section['FactSection']['metadata']['corktile_key'],
					'type' => 'cs_cork',
					'replaceOptions' => false
				));
			echo $this->Bl->ebox();
		echo $this->Bl->eboxContainer();
	echo $this->Bl->ebox();
	
echo $this->Bl->eboxContainer();
	
