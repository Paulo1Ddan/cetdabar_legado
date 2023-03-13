<?php if(!class_exists('Rain\Tpl')){exit;}?><head>
    <link rel="stylesheet" href="/cetdabar/lib/paper-css/paper.min.css">
    <meta charset="UTF-8">
    <title>Relatorio - <?php echo htmlspecialchars( $datamatricula["nomeuser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>, <?php echo htmlspecialchars( $datamatricula["datamatricula"], ENT_COMPAT, 'UTF-8', FALSE ); ?></title>
</head>
<style>
    @page {
        size: A4
    }
    *{
        font-family: 'Arial';
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    .sheet{
        padding: 10px;
    }
    .regMatricula{
        width: 100%;
        padding: 20px 0;
        text-align: center;
        border-bottom: 1px solid #000;
    }

    .user-img{
        display: flex;
        justify-content: center;
        margin-top: 10px;
    }
    .user-img img{
        width: 150px;
        height: 150px;
        border-radius: 50%;
        object-fit: cover;
    }

    .tbl-user{
        width: 100%;
        border-collapse: collapse;
    }
    .tbl-user .tbl-header{
        width: 100%;
    }
    .tbl-user .tbl-header th{
        text-align: center;
        border: 1px solid black;
        font-size: 1.2rem;
        font-weight: bold;
    }
    .tbl-body td{
        border: 1px solid black;
        width: 50%;
        text-align: center;
    }
    
    .tbl-curso{
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }
    .tbl-curso .tbl-header{
        width: 100%;
    }
    .tbl-curso .tbl-header th{
        text-align: center;
        border: 1px solid black;
        font-size: 1.2rem;
        font-weight: bold;
    }
    .tbl-body td{
        border: 1px solid black;
        width: 50%;
        text-align: center;
    }
    th{
        padding: 10px;
    }
    td{
        padding: 5px;
    }

    .tbl-infomatricula{
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }
    .tbl-infomatricula .tbl-header{
        width: 100%;
    }
    .tbl-infomatricula .tbl-header th{
        text-align: center;
        border: 1px solid black;
        font-size: 1.2rem;
        font-weight: bold;
    }
    .tbl-body td{
        border: 1px solid black;
        width: 50%;
        text-align: center;
    }

    .data-matricula{
        margin-top: 10px;
    }
    .data-matricula p{
        font-size: 1.1rem;
        text-align: center;
    }
    .data-matricula p span{
        font-weight: bold;
    }

    .footer{
        position: relative;
        top: 70px;
        width: 100%;
    }
    .footer .underline{
        width: 100%;
        border: 1px solid #ddd;
    }
</style>

<body class="A4">
    <section class="sheet">
        <div class="regMatricula">
            <h1>Registro de matricula</h1>
        </div>
        <div class="user-img">
            <img src="/cetdabar/res/site/assets/user/<?php echo htmlspecialchars( $datamatricula["imguser"], ENT_COMPAT, 'UTF-8', FALSE ); ?>" alt="">
        </div>
        <div class="data-matricula">
            <!-- User -->
            <table class="tbl-user">
                <tr class="tbl-header">
                    <th colspan="2">Usuario</th>
                </tr>
                <tr class="tbl-body">
                    <td><p class="username"><span>Nome: </span><?php echo htmlspecialchars( $datamatricula["nomeuser"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p></td>
                    <td><p class="useremail"><span>Email: </span><?php echo htmlspecialchars( $datamatricula["emailuser"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p></td>
                </tr>
                <tr class="tbl-body">
                    <td><p class="usertel"><span>Celular: </span><?php echo htmlspecialchars( $datamatricula["celuser"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p></td>
                    <td><p class="usertel"><span>Tel. Fixo: </span><?php echo htmlspecialchars( $datamatricula["telfixouser"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p></td>
                </tr>
                <tr class="tbl-body">
                    <td><p class="Naturalidade"><span>Naturalidade: </span><?php echo htmlspecialchars( $datamatricula["naturalidade"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p></td>
                    <td><p class="estadocivil"><span>Estado Civil: </span><?php echo htmlspecialchars( $datamatricula["estadocivil"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p></td>
                </tr>
                <tr class="tbl-body">
                    <td><p class="sexo"><span>Sexo: </span><?php echo htmlspecialchars( $datamatricula["sexouser"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p></td>
                    <td><p class="statususer"><span>Status: </span><?php echo htmlspecialchars( $datamatricula["status"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p></td>
                </tr>
                <tr class="tbl-body">
                    <td><p><span>CEP: </span><?php echo htmlspecialchars( $datamatricula["cepuser"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p></td>
                    <td><p><span>Endereço: </span><?php echo htmlspecialchars( $datamatricula["addressuser"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p></td>
                </tr>
                <tr class="tbl-body">
                    <td><p><span>Bairro: </span><?php echo htmlspecialchars( $datamatricula["bairrouser"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p></td>
                    <td><p><span>Cidade: </span><?php echo htmlspecialchars( $datamatricula["cidadeuser"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p></td>
                </tr>
                <tr class="tbl-body">
                    <td><p><span>Número: </span><?php echo htmlspecialchars( $datamatricula["numerouser"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p></td>
                    <td><p><span>Complemento: </span><?php echo htmlspecialchars( $datamatricula["complementouser"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p></td>
                </tr>
                <tr class="tbl-body">
                    <td><p class="pai"><span>Pai: </span><?php echo htmlspecialchars( $datamatricula["nomepai"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p></td>
                    <td><p class="mae"><span>Mãe: </span><?php echo htmlspecialchars( $datamatricula["nomemae"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p></td>
                </tr>
                <tr class="tbl-body">
                    <td><p class="documento"><span>Documento: </span><?php echo htmlspecialchars( $datamatricula["documento"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p></td>
                    <td><p class="cpf"><span>CPF: </span><?php echo htmlspecialchars( $datamatricula["cpf"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p></td>
                </tr>
                <tr class="tbl-body">
                    <td><p class="escolaridade"><span>Escolaridade: </span><?php echo htmlspecialchars( $datamatricula["escolaridade"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p></td>
                    <td><p class="profissao"><span>Profissão: </span><?php echo htmlspecialchars( $datamatricula["profissao"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p></td>
                </tr>
                <tr class="tbl-body">
                    <td><p class="igreja"><span>Igreja: </span><?php echo htmlspecialchars( $datamatricula["igreja"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p></td>
                    <td><p class="pastor"><span>Pastor: </span><?php echo htmlspecialchars( $datamatricula["pastor"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p></td>
                </tr>
                <tr class="tbl-body">
                    <td><p class="conversao"><span>Conversão: </span><?php echo htmlspecialchars( $datamatricula["conversao"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p></td>
                    <td><p class="funcao"><span>Função: </span><?php echo htmlspecialchars( $datamatricula["funcao"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p></td>
                </tr>
            </table>
            <!-- Curso -->
            <table class="tbl-curso">
                <tr class="tbl-header">
                    <th colspan="2">Curso matriculado</th>
                </tr>
                <tr class="tbl-body">
                    <td><p><span>Curso: </span><?php echo htmlspecialchars( $datamatricula["nomecurso"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p></td>
                    <td><p><span>Status do Curso: </span><?php echo htmlspecialchars( $datamatricula["statuscurso"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p></td>
                </tr>
                <tr class="tbl-body">
                    <td><p><span>Turma: </span><?php echo htmlspecialchars( $datamatricula["nometurma"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p></td>
                    <td><p><span>Status da Turma: </span><?php echo htmlspecialchars( $datamatricula["statusturma"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p></td>
                </tr>
            </table>

            <!-- Info Matricula -->
            <table class="tbl-infomatricula">
                <tr class="tbl-header">
                    <th colspan="2">Informações da matricula</th>
                </tr>
                <tr class="tbl-body">
                    <td><p><span>Duração da Matricula: </span><?php echo htmlspecialchars( $datamatricula["duracao"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p></td>
                    <td><p><span>Status da Matricula: </span><?php echo htmlspecialchars( $datamatricula["statusmatricula"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p></td>
                </tr>
                <tr class="tbl-body">
                    <td><p><span>Vencimento do boleto: </span><?php echo htmlspecialchars( $datamatricula["vencimentoboleto"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p></td>
                    <td><p><span>Data da matricula: </span><?php echo htmlspecialchars( $datamatricula["datamatricula"], ENT_COMPAT, 'UTF-8', FALSE ); ?></p></td>
                </tr>
            </table>
        </div>
        <div class="footer">
            <p>Cetdabar - Centro Educacional de Teologia DABAR, <?php echo htmlspecialchars( $todaydate, ENT_COMPAT, 'UTF-8', FALSE ); ?></p>
            <div class="underline"></div>
        </div>
    </section>
</body>