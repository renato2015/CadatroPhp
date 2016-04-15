<!DOCTYPE html>
<html>
    <head>
        <link href="resources/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <script src="resources/js/bootstrap.min.js" type="text/javascript"></script>
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
        <script type="text/javascript">
            $('input[type=submit]').click(function (e) {
//setamos para quando submeter não atualizar a pagina
                e.preventDefault();
//o serialize retorna uma string pronta para ser enviada
                var valores = $('#form').serialize()
                console.log(valores);
//iniciamos o ajax
                $.ajax({
                    //definimos a url
                    url: 'teste.php',
                    //definimos o tipo de requisição
                    type: 'post',
                    //definimos o tipo de retorno
                    dataType: 'html',
                    //colocamos os valores a serem enviados
                    data: valores,
                    //antes de enviar ele alerta para esperar
                    beforeSend: function () {
                        $('#carregando').show('100');
                    },
                    //colocamos o retorno na tela
                    success: function (pre) {
                        $('#carregando').hide('100');
                        $('#retorno').find('strong').text(pre).end().show(100);
                    }
                });
            });
        </script>
    </head>
    <body>
        <form id="form" method="post">
            <div class="form-group">
                <label>Nome:</label>
                <input type="text" class="form-control" name="nome" placeholder="Nome:" autofocus required />
            </div>
            <div class="form-group">
                <label>E-mail:</label>
                <input type="email" class="form-control" name="email" placeholder="E-mail:"  />
            </div>
            <div class="form-group">
                <label>Telefone:</label>
                <input type="tel" class="form-control" name="telefone" placeholder="Telefone:"  />
            </div>

            <input type="submit" class="btn-sm btn-success" name="gravar" value="Gravar"/>
            <input type="submit" class="btn-sm btn-info" name="alterar" value="Alterar"/>
            <input type="submit" class="btn-sm btn-danger" name="excluir" value="Excluir"/>
            <input type="submit" class="btn-sm btn-default" name="limpar" value="Limpar"/>
        </form>

        <?php
        include_once './model/BeanCliente.php';
        include_once './controller/ControllerCliente.php';

        if (isset($_POST['nome'])) {
            $beanCliente = new BeanCliente();
            $controllerCliente = new ControllerCliente();

            echo $beanCliente->getNome();
            $beanCliente->setNome($_POST['nome']);
            $beanCliente->setEmail($_POST['email']);
            $beanCliente->setTelefone($_POST['telefone']);

            if (isset($_POST['gravar'])) {
                echo 'Gravar : ' . $beanCliente->getNome();
            } elseif ($_POST['alterar']) {
                echo 'Alterar : ' . $beanCliente->getNome();
            } elseif ($_POST['limpar']) {
                echo 'Limpar : ' . $beanCliente->getNome();
            }



            $controllerCliente->inserir($beanCliente);
        }
        ?>
    </body>
</html>
