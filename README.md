# Link Generate
O sistema tem como intuito redirecionar através de um link gerado pelo mesmo para múltiplos links cadastrados pelo usuário seguindo o critério de quantidade de redirecionamento de cada link filho ou uma data de limite configurada pelo mesmo.

## Requisitos técnicos
- Backend utilizando o framework Lumen ^7.0.
- Frontend utilizando o framework Vue.js ^2.6
- Utilizar como banco de dados MySQL ^8.0
- Realizar o versionamento do projeto utilizando Git.
- Tentar seguir ao máximo o protótipo fornecido no final deste documento

## Requisitos funcionais
- O usuário deverá ser capaz de criar um novo “link de redirecionamento” podendo escolher seu nome e para o mesmo será gerado um “link de entrada” (Ex: “redirect.gdigital.com.br/abc123”). O mesmo poderá adicionar N links de saída, sendo que que para cada link de saída o mesmo deve configurar uma quantidade maxima de redirecionamento (Ex: “google.com.br”, 100; “facebook.com”, 200; “whatsapp.com”, 100) e o mesmo também deverá cadastrar um link default  (Ex: “evernote.com”) e opcionalmente uma data limite de funcionamento do link.
- O sistema deverá redirecionar cada acesso no “link de entrada” para o primeiro “link de saída" que ainda não teve seu limite atingido e incrementar seu contador.
- Assim que todos os “links de saída” já tiverem sido esgotados todo acesso será redirecionado para o “link default ”.
- O usuário poderá editar o nome dos links e a quantidade máxima de redirecionamento de cada link após sua criação, podendo também adicionar novos “links de saída” na sua edição.
- Caso a data limite tenha sido configurado e a mesma tenha sido atingida o sistema deverá redirecionar para o link default  mesmo que os “links de saída” ainda não tenham sido esgotados
- O usuário poderá desativar o “link de redirecionamento” fazendo com que o mesmo passe a redirecionar para o link default.


## License

The Link Generate is [proprietary](https://en.wikipedia.org/wiki/Proprietary_software) software licensed developed by [WilliamSena13](https://github.com/williamsena13)
