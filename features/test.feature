# language: pt
@test
Funcionalidade: Testando a configuracao


  Cenário: Teste de configuração do behat
    Dado   estou na página de entrada
    Então  devo ver "Laravel"
  @javascript
  Cenário: Teste de login
    Dado   estou na página de login
    E preencho "email" com "dacolera360@gmail.com"
    E      preencho "password" com "secret"
    Quando pressiono "Login"
    E      aguardo "5" segundos
    Entao  devo ver "Escolha o estilo da busca de produtos:"