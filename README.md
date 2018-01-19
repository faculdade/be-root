# Be Admin
> Backdoor feita em PHP para uso educacional. Upload ✔ Acesse ✔ Seja o admin

Pequeno script que ajuda na realização de testes de penetração :smirk: e
provas de conceito. Permite que o Security Engineer obtenha acesso ao
servidor alvo com um simples upload de arquivo.

## Instalação

Basta realizar o upload do arquivo `backdoor.php` para o servidor alvo (essa é a parte difícil) e acessá-lo pelo navegador.
 
## Modo de uso

Tudo é muito intuitivo. Ao acessar o arquivo você poderá enviar comandos de shell, navegar pela estrutura de diretórios, baixar arquivos e obter informações sobre as configurações do servidor.

## Contribuindo

1. Faça um Fork!
2. Crie um branch para sua funcionalidade: `git checkout -b nova-funcionalidade`
3. Faça o commit de suas mudanças: `git commit -am 'Nova funcionalidade'`
4. Faça um push: `git push origin nova-funcionalidade`
5. Envie um pull request :D

## TODO
- [x] Navegar pelas pastas
- [x] Fazer download dos arquivos
- [x] Enviar comandos shell
- [x] Ver dados do servidor
- [x] Acesso ao  `phpinfo()`;

## Licença

Copyright (c) 2016 Renato Tavares. Code released under the [MIT License](LICENSE).

## Aviso legal

    [!] Disclaimer: O uso deste software para atacar alvos sem prévio consentimento mútuo é ilegal. É de
    responsabilidade do usuário final obedecer todas as leis locais, estaduais e federais. Como desenvolvedor
    não assumo nenhuma responsabilidade por qualquer uso indevido ou dano causado por este programa. Esse 
    software foi criado apenas para uso educacional.