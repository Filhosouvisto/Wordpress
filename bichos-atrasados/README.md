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
2. Personalize as cores desejadas
3. Clique em **Salvar Configurações**

## 🔄 Atualização Automática

O plugin atualiza dados automaticamente **a cada 1 hora** buscando de:
```
https://hojenobicho.com/atrasados/
```

Você também pode forçar uma atualização manual no dashboard.

## 📄 Licença

GPL v2 ou posterior

---

**Versão**: 1.0.0  
**Autor**: Filhosouvisto  
**Data de Criação**: 2026-05-13
