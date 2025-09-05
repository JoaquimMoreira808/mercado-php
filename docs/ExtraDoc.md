Documentação Extra - Simulador de Carrinho de Compras.

Esta documentação detalha a estrutura interna do projeto, o fluxo de operações do carrinho e as regras de negócio aplicadas.


---------------------------------------------------------------
 - Inventory → Controla estoque dos produtos.

 - Discount → Aplica regras de desconto (cupom DISCOUNT10).

 - ShoppingCart → Gerencia operações do carrinho, conecta Inventory e Discount.
---------------------------------------------------------------

1. Fluxo de Operações do Carrinho

---//--- Adicionar Produto ---//---

    - Usuário chama addProduct(id, quantidade).

    - ShoppingCart verifica existência do produto via Inventory->findProduct().

    - Valida estoque (Inventory->decreaseStock()).

    - Atualiza $cart com quantidade e subtotal.

---//--- Remover Produto ---//--

    - Usuário chama removeProduct(id).

    - Verifica se produto está no carrinho.

    - Remove item do array $cart.

    - Reposição de estoque (Inventory->increaseStock()).

---//--- Listar Itens ---//---

    - Itera $cart.

    - Calcula subtotal de cada item (preço x quantidade).

    - Retorna lista formatada.

---//--- Calcular Total ---//---

    - Soma todos os subtotais.

    - Aplica desconto opcional (Discount::apply(total, cupom)).

    - Retorna total final.

---------------------------------------------------------------

2. Regras de Negócio

- Produtos só podem ser adicionados se houver estoque suficiente.

- Ao remover, o estoque é reposto automaticamente.

- Desconto DESCONTO10 → aplica 10% sobre o total do carrinho.

- Carrinho mantém total atualizado apenas quando calculateTotal() é chamado.

---------------------------------------------------------------

3. Exemplos Detalhados de Uso

- Adicionar Produto
$cart->addProduct(2, 3); // Adiciona 3 unidades do produto ID 2 (ceiling_fan)

- Remover Produto
$cart->removeProduct(2);

- Listar Itens
print_r($cart->listCart());


Saída:

Array
(
    [0] => Array
        (
            [product_id] => 2
            [name] => ceiling_fan
            [price] => 50
            [quantity] => 3
            [subtotal] => 150
        )
)

- Calcular Total com Desconto

echo $cart->calculateTotal('DISCOUNT10'); // 135.0

---------------------------------------------------------------

4. Observações

- Estoque é em memória, não persistente.

- Projeto simula fluxo real de e-commerce, mas sem frontend avançado.

- Boas práticas de programação aplicadas:

    - PSR-12: padrões de código PHP.

    - DRY: lógica de desconto e estoque centralizadas.

    - KISS: classes e métodos pequenos e objetivos.

---------------------------------------------------------------

5. Estrutura de Pastas

carrinho/
├── src/
│   ├── ShoppingCart.php
│   ├── Inventory.php
│   └── Discount.php
├── docs/
│   └── ExtraDoc.md
├──index.php
└── README.md
