# vendasTray
Processo seletivo para a vaga de desenvolvedor PHP na empresa Tray.

## Informações relevantes:

1. Objetivo
2. Tecnologias e arquitetura utilizada
3. Modelagem do banco


### 1 - Objetivo:

O meu objetivo neste projeto foi cumprir todos os tópicos do documento de requisitos, seguindo as boas práticas da linguagem, isto é, prezando pela semântica do código, mantendo-o limpo e, é claro, funcionando.

Embora eu não tenha conhecimentos **técnicos** em testes automatizados, tdd, unity test e afins (estou correndo atrás), testei e retestei mesmo que manualmente o software para garntir que o mesmo cumpa os requisitos.

### 2 - Tecnologias e Arquitetura utilizada:

PHP v.7.3~ : Utilizei a versão estável do php. Optei por utilizá-lo "puro" pois anda senti a necessidade de utilizar Laravel neste projeto.

HTML5 : Linguagem de hypertexto indispensável para projetos web. Aqui eu dei menos atenção à semântica (sem deixá-la de lado é claro), pois como se trata de um **sistema de gerenciamento web**, creio que nao seria de toda preocupação dos clientes indexá-lo ao google.

Bootstrap 4: Páginas administrativas muitas vezes não necessitam de um layout tão personalizado. Visto tal situação, visando a produtividade, utilizei o bootstrap para o **client side **.

Jquery : Embora sua maior utilização seja para integrá-lo com as funcionalidades do **bootstrap.js**. Em alguns casos foi utilizado para deixar a interação Cliente/Sistema mais agradável. Optei por esta biblioteca pois não queria focar tanto em codigicação client side. A produtividade foi algo pensado aqui também.

Composer v1.9.0: Utilizado para gerenciar as dependências e diminuir o número de **includes **.

PHPMailer v.~6.0: Utilizado para suprir a necessidade de envios de e-mail do sistema.

MySql v.8.0: Utilizado para a persistência de dados.

Arquitetura utiilizada: Neste projeto, utilizei a arquitetura **MVC** não toda sua filosofia, mas sim a essência de "manter cada coisa em seu lugar". O que deu para encapsular e transformar em objeto, assim foi feito. Todavia, algumas funcionalidades se encaixaram mais como funções por terem a característica de **estado eplícito".

### 3 - Modelagem:

![](/informacoes_adicionais/modelo.png)


**Os dumps da tabela e imagem do modelo encontram-se na pasta 'informacoes_adicionais'**




