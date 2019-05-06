Passo 1- Criar um bando de dados em seu servidor e configurá-lo no arquivo
.env localizado na raiz do projeto;

Passo 2 - Clonar a aplicação, abrir o terminal no diretório 
da pasta do projeto em seguida executar o código:
	
	php artisan migrate --seed

Este código irá upar todas as tabelas necessárias 
para o correto funcionamento desta aplicação;


/////////////////////////////////////////
O sistema irá iniciar na tela de login do cliente, porém,
como não há clientes cadastrados, não será possível logar.

Para acessar a área administrativa:

	(servidor)/login

Dados do usuário admin:

Email: admin@mail.com
Senha: 12345678



 