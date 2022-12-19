<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Solicitação de Servico</title>
</head>
<body>
    <h2>Solicitação de Informação</h2><hr>
    <p><strong>Nome: </strong>{{$detail['nome']}}</p>
    <p><strong> E-mail: </strong>{{$detail['email']}}</p>
    <p><strong> Contacto: </strong>{{$detail['contacto']}}</p>
    <p><strong>Mensagem: </strong>{{$detail['mensagem']}}</p>
    <h3>Informação da Propriedade</h3>
    <p><strong>Nome: </strong>{{$detail['detalhenome']}}</p>
    <p><strong>Endereço: </strong>{{$detail['detalheavenida']}}</p>
    <p><strong>Preço: </strong>{{$detail['detalhepreco']}}</p>
    <p><strong>Estado: </strong>{{$detail['detalheestado']}}</p>
    <p>Muito Obrigado</p>
    <p>Criado por <a href="https://firsteducation.edu.mz/">FirstTech</a></p>
</body>
</html>