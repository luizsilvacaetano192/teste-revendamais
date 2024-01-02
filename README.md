<p>Teste de Api Laravel 10 e spa vuejs 3.</p>

<p>
    Para rodar o teste você precisa ter o docker instalado <a href="https://www.docker.com/">Docker</a> e para rodar em ambiente windows vai precisar do wsl ubuntu instalado.
</p>
<p>
   Instalando o wsl ubuntu para windows.
</p>
- vá até o power shell e digite wsl --install


no wsl ubunto instale o  php 8.2.
no wsl ubunto Instale o composer
Digite: 'composer install`

Copie o  .env.example -> .env

Clone o Teste em uma pasta.
Digite: https://github.com/luizsilvacaetano192/teste-revendamais.git.


<p> Acesse a pasta do projeto clonado <br>
    cd teste-revendamais
</p>

<pRode o projeto localmente executando <br>
./vendor/bin/sail up
</p>

## Crie as tabelas do banco de dados usando o Sail
<p>./vendor/bin/sail artisan migrate</p>

## Crie os registros fake usando o 
<p>./vendor/bin/sail artisan db:seed</p>
