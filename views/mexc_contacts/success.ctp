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

		echo $this->Bl->sboxContainer(array('class' => 'success'), array('size' => array('M' => 5), 'type' => 'column_container'));
			echo $this->Bl->sbox(array(), array('size' => array('M' => 5, 'g' => -1), 'type' => 'inner_column'));
				echo $this->Session->flash();
			echo $this->Bl->ebox();
		echo $this->Bl->eboxContainer();
	echo $this->Bl->ebox();
echo $this->Bl->eboxContainer();
