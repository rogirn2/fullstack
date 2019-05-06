<!DOCTYPE html>
<html>
    <head>
        <meta carset="utf-8">
        <title>Login</title>
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    </head>
    <body id="bg-login">
    <center>
        <section id="conteudo" class="login">
            
            {!! Form::open(['route' => 'cliente.login', 'method' => 'post']) !!}

                <p>Efetue login</p>
                <label>
                {!! Form::text('username', null, ['class' => 'input', 'placeholder' => 'Email']) !!}
                </label>

                <label>
                {!! Form::password('password', ['placeholder' => 'Senha']) !!}
                </label>

                {!! Form::submit('Entrar') !!}

            {!! Form::close() !!}
            
        </section>
    </center>
    </body>
</html>
