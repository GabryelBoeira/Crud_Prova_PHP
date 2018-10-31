<?php
require_once "funcoesChipCelular.php";

    $id = "";
    $nome = "";
    $marca = "";
    $fabricante = "";
    $numSerie = "";
    $valor = "";
    $qtde = "";
    $descricao ="";

    if (!empty($_GET)) {
        $id = $_GET['id'];

        if ($_GET['acao'] == 'carregar') {
            $chip = buscarChip($id);

            $nome = $chip['nome'];
            $marca = $chip['marca'];
            $fabricante = $chip['fabricante'];
            $numSerie = $chip['numSerie'];
            $valor = $chip['valor'];
            $qtde = $chip['qtde'];
            $descricao = $chip['descricao'];
        }
        if ($_GET['acao'] == 'excluir') {
            excluirChip($id);
        }
    }
    if(!empty($_POST)) {

        if (!empty($_POST['id'])){
            editarChip($_POST);
        } else {
            salvarChip($_POST);
        }
    }
    $chips = listarChips();
?>

<header>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Cadastro Porta-Retrado</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/sticky-footer-navbar.css" rel="stylesheet">
</head>
        <!-- Fixed navbar -->
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <a class="navbar-brand" href="#">Controle de Produção</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="cadastroChipCelular.php">Cadastro Insumo</a>
                    </li>
            </div>
        </nav>
</header>
<!DOCTYPE html>
<body>
    <main role="main" class="container">
    <h2>Cadastro de Chips </h2>
            <form action="cadastroChipCelular.php" method="POST">
            <input type="hidden" id="id" name="id" value="<?=$id?>"/>
  
            <div class="form-group">
                <label for="nome">Nome do Chip</label>
                <input type="text" class="form-control" name="nome" id="nome" placeholder="Digite o nome do chip" value="<?=$nome?>">
            </div>
            <div class="form-group">
                <label for="marca">Nome da marca</label>
                <input type="text" class="form-control" name="marca" id="marca" placeholder="Digite o nome do marca" value="<?=$marca?>">
            </div>
            <div class="form-group">
                <label for="fabricante">Nome do fabricante</label>
                <input type="text" class="form-control" name="fabricante" id="fabricante" placeholder="Digite o nome do fabricante" value="<?=$fabricante?>">
            </div>
            <div class="form-group">
                <label for="numSerie">Numero de Serie</label>
                <input type="number" class="form-control" name="numSerie" id="numSerie" placeholder="Digite o Numero de Serie" value="<?=$numSerie?>">
            </div>
            <div class="form-group">
                <label for="valor">Valor </label>
                <input type="text" class="form-control money" name="valor" id="money" placeholder="Digite a Quantidade do produto" value="<?=$valor?>">
            </div>
            <div class="form-group">
                <label for="qtde">Quantidade de Chips </label>
                <input type="number" class="form-control" name="qtde" id="qtde" placeholder="Digite a Quantidade do produto" value="<?=$qtde?>">
            </div>
            <div class="form-group">
                <label for="descricao">descricao</label>
                <input type="text" class="form-control" name="descricao" id="descricao" placeholder="Digite uma descricao" value="<?=$descricao?>">
            </div>
            
            <input type="submit" value="Salvar" class="btn btn-primary" /> 
            </form>

        <table class="table table-dark">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Marca</th>
                    <th>valor</th>
                </tr>
            </thead>
            <?php
                foreach($chips as $chip){
            ?>
                <tbody>
                    <tr>
                        <td><?=$chip['id']?></td>
                        <td><?=$chip['nome']?></td>
                        <td><?=$chip['marca']?></td> 
                        <td><?=$chip['valor']?></td>                                     
                        <td>
                            <a href="cadastroChipCelular.php?acao=carregar&id=<?=$chip['id']?>"
                                class="btn btn-primary">Editar
                            </a>
                        </td>
                        <td>
                            <a href="cadastroChipCelular.php?acao=excluir&id=<?=$chip['id']?>" 
                                class="btn btn-primary"
                                onclick="return confirm('Você está certo disso?');">
                                Remover
                            </a>
                        </td>
                    </tr>
                </tbody>
            <?php  
                }
            ?>
        </table>

    </main>
    <footer class="footer">
    <div class="container">
        <p>&copy; Gabryel J. Boeira 2018. All Rights Reserved.</p>
    </div>
    </footer>
        <!-- JavaScript-->
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-latest.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/jquery.mask.min.js"></script>

    <script type="text/javascript" src="js/mask.js"></script>
</body>
</html>

