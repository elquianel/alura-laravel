<img src="https://raw.githubusercontent.com/MicaelliMedeiros/micaellimedeiros/master/image/computer-illustration.png" min-width="400px" max-width="400px" width="400px" align="right" alt="Computador iuriCode">

# Grupo Intra

- Download [pulsar](https://github.com/pulsar-edit/pulsar) (substituto do atom)
- Instalar pacotes 
    - atom-ide-ui (no caso aqui, você deve procurar o do Pulsar)
    - autocomplete
    - emmet
    - file-icons
    - highlight-selected
    - ide-css
    - ide-html
    - ide-php
    - php-cs-fixer
    - php-debug
    - __remote-ftp__ (o mais importante, sem ele você não consegue acessar a parte em "PRODUCAO" das aplicações)


<br>


## Plataformas
__Os projetos utilizam (ou tentam), utilizar o mvc, então a distribuição das pastas será com base nisso, todos os projetos abaixos são em PHP puro e Codeigniter (que é um framework PHP que tem por padrão o MVC)__

> Versões utilizadas <br>



- - -   

<br>

### EAD
<br>
<details>
    <summary>Estrutura e localização do projeto</summary>

    - Caminho (C:\nomePastaDeProjetos\enfermagemadistancia.com.br\public_html)
</details>
<details>
    <summary>Funcionalidades/Ações</summary>


</details>
<br>


### Intra

    - Caminho (C:\nomePastaDeProjetos\intra-ead.com.br\public_html)

### Venes

    - Caminho (C:\projetos\simplesead.com.br\public_html\venes.com.br)

### Simples

    - Caminho (C:\nomePastaDeProjetos\simplesead.com.br\public_html)

### Ninpe

    - C:\projetos\simplesead.com.br\public_html\ninpe.com.br


<br><br>

## Banco de dados
__Os acessos de todos os bancos (exceto o do Gintra), pode ser manipulado por qualquer SGBD__ <br>
__As ações no banco servem para todos (exceto o do Gintra), pois todos possuem a mesma estrutura__

---

<br>
<details>
    <summary>Edição de conta</summary>
<br>

### Dicas
1.  ``` SELECT * FROM usuario WHERE id_usuario = ID_USUARIO  ```
1. De acordo com o resultado você terá a possibilidade de editar qualquer informação da conta selecionada
2. Edite com cuidado e cautela, cada dado alterado pode influenciar diretamente na conta/acesso dos alunos
    
</details>

<br>
<details>
    <summary>Gerar Pedidos</summary>
<br>

### Estrutura da tabela

<br>

 #### Criando um pedido manual pelo banco

- <span style="color: red">id_pedido</span> &rarr; isso é autoincremento, não mexe
- id_usuario &rarr; só colocar o id do usuário que tá fazendo o pedido
- dt_requisicao &rarr; é a data que o pedido foi gerado/solicitado
- dt_vencimento &rarr; aqui geralmente ele só é adicionado quando é boleto
- order_key &rarr; é a chave lá do mundipagg, dentro do pedido você encontra
- <span style="color: red">transaction_key </span> &rarr; deixa vazio 
- status &rarr; aqui é o status do pagamento (__paid__ - pago, __generated__ - gerado, __waiting_payment__ - esperando pagamento, __not_authorized__ - não autorizado)
- dt_status &rarr; aqui é a data que houve a mudança de status, se for adicionar um pedido, só perguntar quando ele foi pago
- itens &rarr; aqui é a parte de adicionar os itens que citarei abaixo
- valor_total &rarr; o valor total da compra, lembrando que é com '.' e não ','
- status_baixa &rarr; aqui é para dar baixa no pedido, basta colocar '1'
- method_payment &rarr; aqui é o metodo do pagamento, temos 3 (__pix, bolet, creditCard__)
- <span style="color: red">payment_link </span> &rarr; pode ignorar
- <span style="color: red">line</span> &rarr; pode ignorar

### Dicas
1. tipo de pedido e modelo para inserir no campo __'itens'__ (__TX, TX2, TX3, TX4, CP, CPLUS, VIP__)
    1. TX (__Emissão de certificado do curso__) : 
        - 1 curso: ``` {"TX":[{"tx_idCurso":"idCurso"}]} ```
        - 2 cursos ou mais: ``` {"TX":[{"tx_idCurso":"idCurso"},{"tx_idCurso":"idCurso"}]} ```
    1. TX2 (__Emissão da 2ª via do certificado do curso__) :
        - 1 curso: ``` {"TX2":[{"tx2_idCurso":"idCurso"}]} ```
        - 2 cursos ou mais: ``` {"TX2":[{"tx2_idCurso":"idCurso"},{"tx2_idCurso":"idCurso"}]} ```
    1. TX3 (__Emissão de certificado digital e impresso__) :
        - 1 curso: ``` {"TX3":[{"tx3_idCurso":"idCurso"}]} ```
        - 2 cursos ou mais: ``` {"TX3":[{"tx3_idCurso":"idCurso"},{"tx3_idCurso":"idCurso"}]} ```
    1. TX4 (__Emissão de cetificado impresso do curso, é utilizado no reenvio tambem__) : 
        - 1 curso: ``` {"TX4":[{"tx4_idCurso":"idCurso"}]} ```
        - 2 cursos ou mais: ``` {"TX4":[{"tx4_idCurso":"idCurso"},{"tx4_idCurso":"idCurso"}]} ```
    1. CP (__aquisição do curso (apenas EAD e Intra)__): 
        - 1 curso: ``` {"CP":[{"cp_idCurso":"idCurso"}]} ```
        - 2 cursos ou mais: ``` {"CP":[{"cp_idCurso":"idCurso"},{"cp_idCurso":"idCurso"}]} ```
    1. CPLUS (__aquisição do curso utilizando o PLUS (apenas EAD e Intra)__): 
        - 1 curso: ``` {"CPLUS":[{"cplus_idCurso":"idCurso"}]} ```
        - 2 cursos ou mais: ``` {"CPLUS":[{"cplus_idCurso":"idCurso"},{"cplus_idCurso":"idCurso"}]} ```
    1. VIP (__aquisição do vip (apena EAD e Intra)__): 
        - vip anual: ``` {"VIP_1ANO":[{"vip_1ano_":""}]} ```
        - vip vitalicio: ``` {"VIP_50ANO":[{"vip_50ano_":""}]} ```
    1. MISTOS (__Situações comuns na qual o cliente faz vários tipos de pedidos em um só__): 
        - 2 cursos ou mais com tipos diferentes: ``` {"CP":[{"cp_idCurso":"idCurso"}],"CPLUS":[{"cplus_idCurso":"idCurso"}]} ```
        - 2 cursos ou mais com tipos diferentes: ``` {"TX2":[{"tx2_idCurso":"idCurso"},{"tx2_idCurso":"idCurso"}],"CPLUS":[{"cplus_idCurso":"idCurso"},{"cplus_idCurso":"idCurso"}]} ```

<br>

### Observação importante: 

    Se você está fazendo um pedido de reenvio, você precisa ir na tabela de "certificados" e fazer o passo a passo que citarei abaixo:

<br>

 #### EDITANDO UM CERTIFICADO QUE SERÁ REENVIADO

- <span style="color: red">id_usuario</span> &rarr; não mexe, o usuário é esse que já está
- id_curso &rarr; id do curso que foi feito a solicitação de um certificado
- valor &rarr; é o valor pago pelo envio do certificado, geralmente é o valor padrão do correios (R$ 18,37 - atualmente 2023)
- cod_rastreio &rarr; se for reenvio, você armazenará esse código e irá setar o campo como null novamente, pra que ele consiga voltar pra fila de impressão
- status &rarr; 0 - fila de impressão || 1 - impresso e aguardando cod_rastreio || 2 - impresso e com cod_rastreio cadastrado
- <span style="color: red">dt_in </span> &rarr; data que o certificado entra na fila da impressão (no caso, quando a solicitação de reenvio for feita)
- dt_impressao &rarr; data que for impresso o certificado
- dt_postagem &rarr; data que for cadastrado o código de rastreio

1. ``` SELECT * FROM certificados WHERE id_usuario = ID_USUARIO  ```


<br>

### Queries que poderão ser utilizadas
1.  ``` SELECT * FROM pedido WHERE id_usuario = ID_USUARIO  ```
1. De acordo com o resultado você terá a possibilidade de editar qualquer informação da conta   selecionada
    
</details>
