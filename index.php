<?php
session_start();
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script type="text/javascript" src="js/jquery.js"></script>
        <script type="text/javascript">
            //var script = function () {
              //  $.ajax({
                //url: 'delete.php', 
                //success: function () {
                    
                //},
               // error: function () {
                    
                 //   }
                //});
            //};
            //window.addEventListener("beforeunload", script);
        </script>    
        <style>
            html, body { margin:0; height: 100%;}
            body{
                padding: 0;
                margin: 0;
                background-color: #eeeeee;
                font-family: sans-serif;
            }
            .y{
                padding-top: 2%
            }
            .button {
                background-color: #7C47B3;
                color: #FFFFB3;
                border: 3px solid #7C47B3;
                margin-top: 5px;
                padding: 15px;
                font-size: 20px;
                cursor: pointer;
                border-radius: 100px;

            }
            .button:link{
                text-decoration: none;
            }
            .button:visited{
                text-decoration: none;
            }
            .button:hover {
                background-color: #7C47B3;
                color: #FFFFB3

            }
            .imagem{
                margin: 20px;
            }
            .titulo{
                letter-spacing: 3px;
                color: #7C47B3;
                font-size: 50px;
            }
            @media only screen and (max-device-width: 900px) {

                body{
                    zoom: 1.5
                }
                .button{
                    display:block;
                    zoom:1.3;
                }
                .botoes{
                    text-align:center;
                    margin-top: 50px;
                }
            }
        </style>
    </head>
    <body>
        <?php
        //obtem imagens
        $pasta = 'images/';
        $arquivos = glob("$pasta{*.jpg,*.JPG,*.png,*.gif,*.bmp}", GLOB_BRACE);
        $count = count($arquivos);
        $images = [];
        $i = 0;
        while ($i < $count) {
            $images[] = $i;
            $i++;
        }

        //lê json com objetos e ações
        $jsonFile = "data.json";
        $data = json_decode(file_get_contents($jsonFile), true);

        //obtem objetos
        $objects = [];
        $numObj = sizeof($data['objects']);
        $iObj = 0;
        while ($iObj < $numObj) {
            $objects[] = $data['objects'][$iObj];
            $iObj++;
        }
        //obtem ações
        $actions = [];
        $numAct = sizeof($data['actions']);
        $iAct = 0;
        while ($iAct < $numAct) {
            $actions[] = $data['actions'][$iAct];
            $iAct++;
        }

        if (!empty($_GET['id'])) {
            $id = $_GET['id'];
            $idEx = explode("-", $id);
            $imageIndex = $idEx[0];
            $objectIndex = $idEx[1];
            $actionIndex = $idEx[2];
            //editar acima
        } else {
            $imageIndex = rand(0, sizeof($images) - 1);
            $objectIndex = rand(0, sizeof($objects) - 1);
            $actionIndex = rand(0, sizeof($actions) - 1);
            $id = $imageIndex ."-". $objectIndex ."-". $actionIndex;
        }
        $image = $images[$imageIndex];
        $object = $objects[$objectIndex];
        $action = $actions[$actionIndex];

        include 'create.php';
        echo "<a href='memes/".$namefile."'>$namefile</a>";
        ?> 
    <center>
        <div class="y">
            <div class="titulo">
                Gerador de memes
            </div>    
            <div class="imagem">
                <img src="memes/<?php echo $namefile ?>">
            </div>
        </div>
        <div class="botoes">
            <a href="memes/<?php echo $namefile ?>" download="meme.jpg" class="button">Baixar imagem</a>
            <a href="index.php"  class="button">Gerar novo meme</a>
            <a href="https://api.whatsapp.com/send?text=https://geradormemes.000webhostapp.com/index.php?id=<?php echo $id; ?>"
               class="button">Mandar no ZapZap</a>
        </div>
    </center>
</body>
</html>
