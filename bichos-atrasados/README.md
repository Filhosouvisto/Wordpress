# Plugin Bichos Atrasados

Um plugin WordPress profissional para exibir Bichos Atrasados de loterias com dados atualizados automaticamente da API: https://hojenobicho.com/atrasados/

## 📋 Características

- ✅ **Dashboard Wp-Admin** com menu "Bichos Atrasados"
- ✅ **Atualização Automática** a cada 1 hora
- ✅ **Configurações de Cores CSS** personalizáveis
- ✅ **Shortcode** `[bichos_atrasados]` para frontend
- ✅ **Grid Responsivo** (3 colunas no desktop, adaptativo em mobile)
- ✅ **Banco de Dados** para cache de dados
- ✅ **15 Loterias Suportadas** com emojis/ícones
- ✅ **Design Profissional** seguindo padrão da imagem fornecida

## 🎯 Loterias Suportadas

1. 🔵 PT Rio de Janeiro
2. 🏴 Look Goiás
3. 🦅 Loteria Federal
4. 🏛️ Nacional
5. 🏙️ São Paulo
6. 🍀 Boa Sorte
7. 🎰 Lotece
8. 🎲 Lotep
9. 🔺 MG
10. 🏘️ L-BA
11. 🤪 Maluca-BA
12. 💙 Maluquinha RJ
13. 👨‍👩‍👧‍👦 Loteria Popular
14. 🐂 Bicho-RS Rio Grande do Sul
15. 🏛️ LBR Brasília

## 🚀 Instalação

### Método 1: Upload via WordPress (Recomendado)
1. Compactar pasta `bichos-atrasados` em ZIP
2. Ir em: **Plugins** → **Adicionar novo** → **Enviar plugin**
3. Selecionar o arquivo ZIP
4. Clicar em **Instalar agora** e depois **Ativar plugin**

### Método 2: FTP
1. Conectar ao servidor via FTP
2. Navegar para: `/public_html/wp-content/plugins/`
3. Enviar pasta `bichos-atrasados`
4. Ativar no WordPress: **Plugins** → **Bichos Atrasados** → **Ativar**

### Método 3: Gestor de Arquivos (cPanel)
1. Acessar Gerenciador de Arquivos
2. Navegar para: `public_html/wp-content/plugins/`
3. Upload do `bichos-atrasados.zip`
4. Extrair arquivo
5. Ativar no WordPress

## 📖 Como Usar

### 1. No Frontend
Adicione o shortcode em qualquer página ou post:

```
[bichos_atrasados]
```

### 2. Painel Administrativo
- Vá em **Bichos Atrasados** no menu lateral
- **Dashboard**: Ver status e atualizar dados manualmente
- **Configurações**: Personalizar cores CSS

### 3. Configurar Cores
1. Menu: **Bichos Atrasados** → **Configurações**
2. Personalize:
   - Cor de fundo (grid)
   - Cor de texto
   - Cor do card
   - Cor do botão
   - Cor do texto do botão
3. Clique em **Salvar Configurações**

## 🗄️ Estrutura de Pastas

```
bichos-atrasados/
├── bichos-atrasados.php ................. Arquivo principal
├── includes/
│   ├── class-database.php .............. Banco de dados
│   ├── class-api-handler.php ........... Integração API
│   ├── class-admin.php ................. Painel Wp-Admin
│   ├── class-settings.php .............. Configurações
│   └── class-frontend.php .............. Shortcode/Frontend
├── css/
│   ├── admin-style.css
│   └── frontend-style.css
├── js/
│   ├── admin-script.js
│   └── frontend-script.js
└── README.md ........................... Este arquivo
```

## 🔄 Atualização Automática

O plugin atualiza dados automaticamente **a cada 1 hora** buscando de:
```
https://hojenobicho.com/atrasados/
```

Você também pode forçar uma atualização manual:
1. Vá em **Bichos Atrasados** → **Dashboard**
2. Clique em **🔄 Atualizar Dados Agora**

## 🎨 Personalização CSS

As cores podem ser alteradas na seção **Configurações**:

- **Cor de Fundo (Grid)**: Fundo da área total (padrão: #FDB710 - amarelo)
- **Cor de Texto**: Títulos dos estados (padrão: #000000 - preto)
- **Cor do Card**: Fundo dos cards (padrão: #FFFFFF - branco)
- **Cor do Botão**: Botão "Ver Tabelas" (padrão: #1E5BA8 - azul)
- **Cor do Texto do Botão**: Texto do botão (padrão: #FFFFFF - branco)

## 📱 Responsivo

O plugin é totalmente responsivo:
- **Desktop**: Grid com 3 colunas
- **Tablet**: Grid adaptável
- **Mobile**: Layout em 1 coluna

## 🔐 Segurança

- ✅ Proteção contra acesso direto
- ✅ Nonces para formulários
- ✅ Verificação de permissões
- ✅ Sanitização de dados

## 🐛 Solução de Problemas

### Plugin não aparece no menu
- Verificar se o plugin está ativado: **Plugins** → procure **Bichos Atrasados**
- Fazer logout e login novamente
- Limpar cache do navegador

### Shortcode não funciona
- Verificar se o plugin está ativado
- Usar exatamente: `[bichos_atrasados]`
- Não funciona em Custom HTML - usar em páginas/posts normais

### Dados não atualizam
- Clicar em **Atualizar Dados Agora** no dashboard
- Verificar se a API está respondendo
- Verificar logs do WordPress

## 📧 Suporte

Para problemas ou sugestões, entre em contato com o desenvolvedor.

## 📄 Licença

GPL v2 ou posterior

---

**Versão**: 1.0.0  
**Autor**: Filhosouvisto  
**Data de Criação**: 2026-05-13
