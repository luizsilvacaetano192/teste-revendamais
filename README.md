<p>Teste de Api Laravel 10 e spa vuejs 3.</p>

- [x] Criar api Laravel de endereços e implementar CRUD (Create, Read, Update, Delete) no sistema de endereços.
- [x] Criar um end-point para busca por CEP 
- [x] Criar um banco de dados local contendo algumas opções de CEP(seeders laravel).
- [x]  A API deve tentar localizar o CEP na base local e, caso não seja encontrado, deve realizar uma busca em um serviço externo (a sua escolha) para obter os dados do endereço, gravá-los na base local e retorná-los ao cliente
- [x] Implementar um end-point para busca fuzzy search, permitindo que o usuário pesquise por qualquer campo textual e obtenha resultados aproximados.
- [x] Caso possua conhecimentos de desenvolvimento front-end, crie uma Single Page Application (SPA) utilizando o framework Vue.js
- [x] Entregue o projeto em um ambiente Dockerizado

<p>
    Para rodar o teste você precisa ter o docker instalado <a href="https://www.docker.com/">Docker</a> e para rodar em ambiente windows vai precisar do wsl ubuntu instalado.
</p>
<p>
    No docker em settings - resources - wsl integration > abilite a integração com wls distro ubuntu.
</p>

<p>
   Instalando o wsl ubuntu para windows.
   - vá até o power shell e digite wsl --install
</p>

<p> no wsl ubuntu instale o  php 8.2. </p>
<p> no wsl ubuntu Instale o composer </p>
Digite: 'composer install`

Clone o Teste em uma pasta.
Digite: https://github.com/luizsilvacaetano192/teste-revendamais.git.


<p> Acesse a pasta do projeto clonado <br>
    cd teste-revendamais
</p>

<p> Copie o  .env.example -> .env </p>

 <p> execute ./vendor/bin/sail artisan key:generate <br>

<p> Rode o projeto localmente executando <br>
    ./vendor/bin/sail up
</p>

## Crie as tabelas do banco de dados usando o Sail
<p>./vendor/bin/sail artisan migrate</p>

## Crie os registros fake usando o 
<p>./vendor/bin/sail artisan db:seed</p>

<p> Decisões Tecnicas <br>
   
</p>
