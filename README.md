# Pass Storage

Pass Storage é um aplicativo simples para armazenar e gerenciar senhas com segurança. Ele inclui funcionalidades de autenticação e gerenciamento de credenciais, garantindo que seus dados estejam acessíveis apenas a usuários autenticados.

---

## 🚀 Funcionalidades

- **Autenticação:**
    - Registro de novos usuários.
    - Login para acesso ao sistema.
    - Logout seguro.

- **Gestão de Credenciais:**
    - Adicionar novas credenciais.
    - Visualizar detalhes de uma credencial específica.
    - Editar informações de credenciais existentes.
    - Excluir credenciais não desejadas.

---

## 🛠️ Rotas

### **Rotas Públicas (sem autenticação)**

| Método | Rota          | Descrição                       |
|--------|---------------|----------------------------------|
| GET    | `/`           | Exibe a homepage do sistema.    |
| GET    | `/login`      | Exibe o formulário de login.    |
| POST   | `/login`      | Realiza o login.                |
| GET    | `/register`   | Exibe o formulário de registro. |
| POST   | `/register`   | Realiza o registro de usuário.  |

---

### **Rotas Protegidas (com autenticação)**

| Método | Rota                       | Descrição                              |
|--------|----------------------------|---------------------------------------|
| GET    | `/home`                    | Exibe a página inicial do sistema.    |
| GET    | `/credential/{id}`         | Exibe os detalhes de uma credencial.  |
| POST   | `/credential/add`          | Adiciona uma nova credencial.         |
| POST   | `/credential/delete/{id}`  | Exclui uma credencial específica.     |
| POST   | `/credential/edit/{id}`    | Edita uma credencial existente.       |
| GET    | `/logout`                  | Realiza o logout do usuário.          |

---

## ⚙️ Tecnologias Utilizadas

- **Laravel**: Framework PHP utilizado para a construção do backend.
- **Blade Templates**: Para renderização das views.
- **Middleware**: Para proteção de rotas e controle de autenticação.

---


## 📝 Como Usar

1. Clone este repositório:
   ```bash
   git clone https://github.com/seu-usuario/pass-storage.git
   cd pass-storage
   ```

2. Instale as dependências:
   ```bash
   composer install
   npm install
   ```

3. Configure o arquivo `.env`:
    - Configure o banco de dados.
    - Defina a chave da aplicação:
      ```bash
      php artisan key:generate
      ```

4. Execute as migrações para criar as tabelas no banco de dados:
   ```bash
   php artisan migrate
   ```

5. Inicie o servidor local:
   ```bash
   php artisan serve
   ```

6. Acesse no navegador:
   ```
   http://localhost:8000
   ```
