<!DOCTYPE html>
<html>
<head>
    <link href="https://fonts.googleapis.com/css?family=Muli" rel="stylesheet">
</head>
<body style="font-family: 'Muli', sans-serif;">
    <center>
        <img src="img/logo.png">
        <h3>Olá, <b>{{$user->getNome()}}</b></h3>
        <p>Alguém precisa do seu sangue</p><br>
        <p><b>Nome do Paciente:</b> {{$pedido->paciente}}</p>
        <p><b>Hospital:</b> {{$pedido->hospital}}, <b>quarto</b> {{$pedido->quarto}}</p>
        <p><b>Endereço:</b> {{$pedido->endereço}}</p>
        <p><b>Tipo sanguíneo:</b> {{$pedido->sangue->nome}}</p>
        <p><b>Requerente:</b> {{$pedido->requerente->nome}}</p>
        <p><b>Telefone para contato:</b> {{$pedido->requrente->getFone()}}</p>
    </center>
</body>
</html>
