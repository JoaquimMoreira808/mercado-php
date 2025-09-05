# :shopping_cart: Simulador de Carrinho de Compras em PHP

**Simulador de Carrinho de Compras** é um projeto educacional em PHP que reproduz as regras básicas de um checkout de e-commerce.  
Foi desenvolvido para rodar em **XAMPP**, com foco em boas práticas de programação e simulação de um fluxo real de negócio.

---

> [!IMPORTANT]
> :scroll: Licença:
> 
> Projeto desenvolvido para **fins educacionais** na disciplina de Design Patterns e Clean Code.  
> Livre para modificar, adaptar e evoluir.
>
> **Obs:** Informações sobre os colaboradores e a instituição estão no final deste README.

---

## :dart: Objetivos de Aprendizagem

- Praticar boas práticas de programação (**PSR-12**, **DRY**, **KISS**).  
- Aplicar **validações** e **regras de negócio simples**.  
- Entender a importância de **organização do código** e **documentação mínima**.  
- Simular um **fluxo real de checkout de e-commerce**.  

---

## :open_file_folder: Estrutura do Projeto

- `src/ShoppingCart.php` → Classe principal do carrinho de compras.  
- `src/Inventory.php` → Controle de estoque (produtos disponíveis).  
- `src/Discount.php` → Regras de desconto.  
- `docs/` → Pasta reservada para documentação extra, diagramas, etc.  
- `index.php` → Ponto de entrada para testes no navegador.  

---

## :sparkles: Funcionalidades

- **Adicionar Item ao Carrinho**
  - Verifica se o produto existe.
  - Checa se há estoque suficiente.
  - Reduz estoque ao adicionar no carrinho.

- **Remover Item do Carrinho**
  - Valida se o item existe no carrinho.
  - Remove item e devolve estoque ao inventário.

- **Listar Itens**
  - Exibe produtos do carrinho com nome, quantidade, preço e subtotal.

- **Calcular Total**
  - Soma todos os subtotais.

- **Aplicar Desconto**
  - Cupom `DISCOUNT10` → aplica 10% no valor total.

---

## :gear: Como Executar

### Pré-requisitos
- [XAMPP](https://www.apachefriends.org/index.html) instalado.  
- PHP configurado (já incluso no XAMPP).  

### Passos
1. Copie o projeto para a pasta `htdocs` do XAMPP:
````
   C:\xampp\htdocs\mercado-php
````
3. Inicie o Apache no painel do XAMPP.

4. No navegador, acesse:
   - http://localhost/mercado-php

---

## :warning: Limitações

- Estoque não é persistido em banco de dados (somente em memória).
- Interface simples, sem frontend estilizado.

---

## :test_tube: Casos de Uso (Exemplos)

### 1. Adicionar Produto ao Carrinho
```php
$inventory = new Inventory();
$cart = new ShoppingCart($inventory);

$cart->addProduct(1, 2); // Adiciona 2 unidades do produto ID 1 (beans)
```

### 2. Listar Itens do Carrinho
```php
print_r($cart->listCart());
```
#### Saída esperada:
```php
Array
(
    [0] => Array
        (
            [product_id] => 1
            [name] => beans
            [price] => 3.5
            [quantity] => 2
            [subtotal] => 7
        )
)
```

### 3. Calcular Total sem desconto
```php
echo $cart->calculateTotal(); // Saída esperada: 7.0
```

### 4. Calcular Total com desconto
```php
echo $cart->calculateTotal('DESCONTO10'); // Saída esperada: 6.3
```

### 5. Remover Produto
```php
$cart->removeProduct(1);
```
---

## :white_check_mark: Boas Práticas Aplicadas

### PSR-12 (Padrão de Código PHP)
- **Declaração strict_types** no início dos arquivos (`declare(strict_types=1);`).
- **Organização de imports** (`require_once`) antes da definição das classes.
- **Indentação e espaçamento** consistentes no código.
- **Nomes de classes** (`ShoppingCart`, `Inventory`, `Discount`) em PascalCase.
- **Tipos declarados** em propriedades e parâmetros (ex: `private Inventory $inventory`, `addProduct(int $productId, int $quantity = 1)`).

### DRY (Don’t Repeat Yourself)
- A lógica de desconto foi centralizada na classe **`Discount`**, evitando duplicação de regras de desconto dentro do `ShoppingCart`.
- A lógica de validação de estoque foi concentrada no **`Inventory`**, evitando repetir verificações em outros pontos do código.
- O cálculo de subtotal é feito em um único lugar (`listCart()`), não espalhado em vários métodos.

### KISS (Keep It Simple, Stupid)
- O carrinho foi dividido em **três classes claras**:
  - `ShoppingCart` → operações do carrinho.
  - `Inventory` → controle de estoque.
  - `Discount` → regras de desconto.
- Métodos pequenos e com responsabilidade única (`addProduct`, `removeProduct`, `listCart`, etc.).
- Uso de **arrays simples** para representar produtos, sem complicar com estruturas desnecessárias.
- Regras de negócio diretas e legíveis, sem abstrações desnecessárias.

---

## Informacões Adicionais

- **Nome:** Joaquim Fernando Santana Moreira | **RA:** 1993917 :man_technologist:
- **Nome:** José Vitor de Almida Lima | **RA:** 1994104 :man_technologist:

### Informações Acadêmicas
- **Universidade:** UNIMAR - Universidade de Marília :school:
- **Curso:** Analise e Desenvolvimento de Sistemas :mortar_board:
- **Disciplina:** Design Patterns e Clean Code :computer:
- **Docente:** Valdir Amancio Pereira Jr. :man_teacher:
