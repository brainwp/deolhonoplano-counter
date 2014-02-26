# De Olho no Plano - Contador #

Tanto para o shortcode temos as seguintes parametros:

* text_before: Texto do início da frase.
* date_start: Data de ínicio (caso fique em branco, vai pegar a data atual)
* date_end: Data do termino (caso fique em branco, vai pegar a data atual)
* text_after: Texto do final da frase.

### Função ###

	<?php echo donp_counter( 'Faltam', '2014-02-22', '2014-03-22', 'para a votação.', 'class-html-opcional' ); ?>

### Shortcode ###

	[contador text_before="Faltam" date_start="2014-02-22" date_end="2014-03-22" text_after="para a votação." class="opcional"]

### Widget ###

Basta adicionar o widget "Contador" em qualquer sidebar e preencher as opções dele.
