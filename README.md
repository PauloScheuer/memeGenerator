# memeGenerator
Aplicação web simples que cria "memes" aleatórios em PHP

O projeto possui 3 arquivos: index, create e data.

index.php : 

- Lê todas as imagens e cria um array com elas;

- Lê todos os "objetos" e cria um array com eles;

- Lê todas as ações e cria um array com elas;

- Verifica se foi informado um id na URL. Se foi, define os parâmetros da criação do "meme" usando esse id (no formato idImagem-idObjeto-idAção). Se não, define valores aleatórios para os campos e cria um id com eles;

- Chama o arquivo create.php, criando o "meme";

- Mostra o "meme";

- Abaixo do "meme", botões de salvar a imagem, criar outro meme e enviar link da página no Whatsapp.

create.php :

- Cria o "meme", unindo a imagem informada e seu texto;

- Verifica se na sessão já existe um "meme", se sim, o exclui (serve para não sobrecarregar servidor);

- Define o "meme" atual na sessão.

data.json :

- Possui os valores dos objetos e das ações.

Além dos arquivos, há três pastas: fonts, images e memes 

fonts/ :

- Onde fica a fonte usada no "meme".

images/ :

- Onde ficam as bases a serem usadas na criação de "memes". Os nomes dessas bases devem ser ser numéricos e seguindo a ordem. Ex: "0.jpg", "1.jpg", ... , "n.jpg".

memes/ :

- Pasta onde ficam guardados os "memes".
