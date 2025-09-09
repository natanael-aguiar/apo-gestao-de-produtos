
# Sistema de Gestão de Produtos

> Mini sistema acadêmico para gestão de produtos, fornecedores e usuários, desenvolvido em PHP puro, MySQL (PDO), HTML, JavaScript e Tailwind via CDN.

## Funcionalidades

- Cadastro e autenticação de usuários (senha com hash SHA254)
- Cadastro, listagem e atualização de produtos e fornecedores (AJAX)
- Relacionamento entre produtos e fornecedores
- Seleção de produtos para cesta (carrinho) com validação
- Visualização da cesta com resumo de valor total e quantidade
- Menus de navegação em todas as telas protegidas
- Interface moderna, responsiva e padronizada com Tailwind
- Banco e tabelas criados automaticamente na primeira execução
- Uso de variáveis de ambiente para configuração

## Estrutura do Projeto

```bash
public/           # Arquivos acessíveis pelo navegador (telas, AJAX)
src/classes/      # Classes de entidades (Usuário, Produto, Fornecedor, Cesta)
src/controllers/  # Lógica de negócio (CRUD, autenticação, relacionamento)
src/services/     # Serviços de banco e autenticação
config/           # Criação automática do banco e tabelas
.env              # Variáveis de ambiente (credenciais do banco)
README.md         # Documentação do projeto
```

## Requisitos

- PHP 7.4 ou superior
- MySQL/MariaDB
- Navegador web moderno

## Instalação e Execução

1. Configure o arquivo `.env` com os dados do seu banco MySQL.
2. Execute o servidor embutido do PHP na pasta `public`:
	```bash
	cd public
	php -S localhost:8080
	```
3. Acesse [http://localhost:8080](http://localhost:8080) no navegador.

O sistema criará o banco e as tabelas automaticamente na primeira execução.

## Observações Importantes

- Não utiliza frameworks como Laravel, React ou Vue.
- Todas as telas protegidas possuem menu padronizado: Dashboard, Produtos, Fornecedores, Cesta, Sair.
- Interface visual leve, amigável e responsiva, com paleta suave baseada em tons de índigo e cinza.
- Segurança: senhas com hash SHA254, uso de PDO, proteção contra SQL Injection.
- Código organizado e orientado a objetos, facilitando manutenção e expansão.

## Telas do Sistema

- **Login/Cadastro:** acesso ao sistema, criação de conta, senha com hash SHA254.
- **Dashboard:** página inicial após login, navegação centralizada.
- **Produtos:** cadastro, listagem e atualização dinâmica via AJAX.
- **Fornecedores:** cadastro, listagem e atualização dinâmica via AJAX.
- **Cesta:** seleção de produtos, resumo de valor total e quantidade.

## Autor

Desenvolvido por Natanael Aguiar para atividade acadêmica.
