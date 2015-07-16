@section('navbar')
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Handy POS サーバー</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li><a href="{{URL::to('/')}}">ホーム</a></li>
                    <li><a href="{{URL::route('employees.index')}}">マスタ管理</a></li>
                    <li><a href="{{URL::route('settings.index')}}">全レジ初期設定</a></li>
                    <li><a href="{{URL::route('dataFromIOs.index')}}">最新注文</a></li>
                    <li><a href="#">テスト</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><span class="glyphicon glyphicon-user"></span>プロフィール</a></li>
                    <li><a href="./user/logout"><span class="glyphicon glyphicon-log-out"></span>ログアウト</a></li>
                </ul>
            </div>
        </div>
    </nav>
    @show