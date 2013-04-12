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

	echo $this->Bl->sp();
	echo $this->Bl->strongDry(__d('mexc_contacts', 'Nome', true));
	echo $mail_data['MexcContact']['name'];
	echo $this->Bl->ep();
	
	echo $this->Bl->sp();
	echo $this->Bl->strongDry(__d('mexc_contacts', 'Escola / instituição', true));
	echo $mail_data['MexcContact']['institution'];
	echo $this->Bl->ep();
	
	echo $this->Bl->sp();
	echo $this->Bl->strongDry(__d('mexc_contacts', 'E-mail', true));
	echo $mail_data['MexcContact']['email'];
	echo $this->Bl->ep();
	
	echo $this->Bl->sp();
	echo $this->Bl->strongDry(__d('mexc_contacts', 'Sua função na escola / instituição', true));
	echo $mail_data['MexcContact']['function'];
	echo $this->Bl->ep();
	
	echo $this->Bl->sp();
	echo $this->Bl->strongDry(__d('mexc_contacts', 'Cidade', true));
	echo $mail_data['MexcContact']['city'];
	echo $this->Bl->ep();
	
	echo $this->Bl->sp();
	echo $this->Bl->strongDry(__d('mexc_contacts', 'Estado', true));
	echo $mail_data['MexcContact']['state'];
	echo $this->Bl->ep();
	
	echo $this->Bl->sp();
	echo $this->Bl->strongDry(__d('mexc_contacts', 'Comentários', true));
	echo $mail_data['MexcContact']['comments'];
	echo $this->Bl->ep();

	echo $this->Bl->pDry(sprintf('Formulário submetido em %s às %s', date('d/m/Y'), date('H:i')));
	
