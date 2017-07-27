<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet">
    <style>
        body, html{
            background: #efefef;
            height: 100%;
            font-family: 'Source Sans Pro', sans-serif;
        }
        .valign{
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
        }
        @media screen and (min-width: 30em){
            .modal-content {
                width: 22em;
                margin-left: auto;
                margin-right: auto;
            }
        }
        .modal-content {
            position: relative;
            background: #fff;
            overflow: auto;
            z-index: 2;
            border-radius: 3px;
            margin: 0 auto;
            top: auto;
            box-shadow: 0 0 10px rgba(155,155,155,0.4);
            max-width: 400px;
            color: #444;
        }
        .modal-content .header {
            border-bottom: 1px dashed #ccc;
        }
        .modal-content h1 {
            text-transform: uppercase;
            margin: 22px 0;
            font-weight: normal;
            font-size: 20px;
            text-align: center;
        }
        .modal-content .form {
            padding: 2em 1.5em 1.5em;
        }
        .form-group{
            margin-bottom: 15px;
        }
        label.control-label{
            font-weight: bold;
            margin-bottom: 5px;
            display: block;
        }
        input[type="text"], input[type="email"], input[type="password"] {
            display: block;
            width: 100%;
            box-sizing: border-box;
            padding: .5em;
            font-size: 1em;
            line-height: 1.5em;
            font-weight: 400;
            border: 2px solid #ddd;
            background: #fff;
            display: block;
            appearance: none;
            border-radius: 0;
            min-height: 2.75em;
        }
        .actions{
            text-align: center;
        }
        button{
            border: 2px solid #333;
            box-shadow: 0 0 0 transparent;
            color: #333;
            height: 40px;
            width: 150px;
            border-radius: 20px;
            background: transparent;
            font-size: 14px;
            text-transform: uppercase;
            font-weight: bold;
            transition: all 0.3s;
        }
        button:hover{
            background: #333;
            color: white;
            box-shadow: 0 2px 5px rgba(155,155,155,1);
        }

        .actions button{
            margin-bottom: 15px;
            margin-top: 20px;
        }
        .actions a{
            font-size: 14px;
            color: #444;
            text-decoration: none;
        }
        .actions a:hover{
            text-decoration: underline;
        }
        .error-msg{
            font-size: 12px;
            color: red;
        }
    </style>
</head>
<body>
    <div class="valign">
        <div class="modal-content">
            <div class="header">
                <h1>Printing Factory</h1>
            </div>
            <form class="form" role="form" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                    <div class="col-md-6">
                        <input id="email" type="email" class="form-control border-input" name="email" value="{{ old('email') }}" required autofocus>

                        @if ($errors->has('email'))
                            <span class="help-block error-msg">
                                                <strong>{{ $errors->first('email') }}</strong>
                                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <label for="password" class="col-md-4 control-label">Password</label>

                    <div class="col-md-6">
                        <input id="password" type="password" class="form-control border-input" name="password" required>

                        @if ($errors->has('password'))
                            <span class="help-block error-msg">
                                                <strong>{{ $errors->first('password') }}</strong>
                                            </span>
                        @endif
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Ghi nhớ đăng nhập
                            </label>
                        </div>
                    </div>
                </div>

                <div class="form-group actions">
                    <button type="submit" class="btn btn-primary">
                        Đăng Nhập
                    </button>
                    <br>
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        Quên mật khẩu?
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>