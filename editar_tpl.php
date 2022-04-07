<!DOCTYPE html>
<html lang="pt=br">

<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/editar_interessado.css">
    <!-- JS, Popper.js, jQuery and fonts-->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/4d52201842.js" crossorigin="anonymous"></script>

</head>

<body class="banner-gravar">
    <main>
        <section>
            <div class="text-center h2 p-4">
                <?php
                    if ( isset($msg) ) echo $msg;
                ?>
            </div>

        
            <div>
                <form class="mx-auto" method="POST" action="edit.php">
                    <div class="col-10 py-2">
                        <span class="d-block pb-2">Nome</span>
                        <input type="text" id="nome" name="nome" placeholder="Nome completo" size="40" value="<?php echo $nome['nome'] ?>">
                    </div>

                    <div class="col-10 py-2">
                        <span class="d-block pb-2">Telefone</span>
                        <input type="number" id="telefone" name="telefone" placeholder="(DD) 1111-11111" size="40" value=" <?php echo $telefone['telefone'] ?>">
                    </div>

                    <div class="col-10 py-2">
                        <span class="d-block pb-2">nascimento</span>
                        <input type="text" id="data" name="data" placeholder="YYYY/MM/DD" size="40" value="<?php echo $nascimento['nascimento'] ?>">
                    </div>

                    <div class="col-11 d-flex justify-content-end pt-4">
                        <input type="number" name="id" value="<?php echo $user['id'] ?>" >
                    </div>
                    
                    <div class=" col-11 d-flex justify-content-end pt-4">
                        <input class="btn" type="submit" value="Gravar">
                    </div>

                </form>
            </div>
        </section>
    </main>
</body>

</html>