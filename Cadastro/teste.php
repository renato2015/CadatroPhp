<!DOCTYPE html>
<html>
    <head>
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
            <label>Nome:
                <input type="text" name="nome" placeholder="Nome:" autofocus required />
            </label>
            <label>E-mail:
                <input type="email" name="email" placeholder="E-mail:" required />
            </label>
            <label>Telefone:
                <input type="tel" name="telefone" placeholder="Telefone:" required />
            </label>
            <input type="submit" value="Enviar">
        </form>

        <?php

        if(isset($_POST['nome'])){
            require_once './model/BeanCliente.php';
        require_once './controller/ControllerCliente.php';
        
            $beanCliente = new BeanCliente();
            $controllerCliente = new ControllerCliente();

            $beanCliente->setNome($_POST['nome']);
            $beanCliente->setEmail($_POST['email']);
            $beanCliente->setTelefone($_POST['telefone']);

            $controllerCliente->inserir($beanCliente);
        }
        ?>
    </body>
</html>
