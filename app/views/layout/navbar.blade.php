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
                    <li class="active"><a href="#">ホーム</a></li>
                    <li><a href="./employees">マスタ管理</a></li>
                    <li><a href="./settings">全レジ初期設定</a></li>
                    <li><a href="./dataFromIOs">最新注文</a></li>
                    <li><a href="#">テスト</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#"><span class="glyphicon glyphicon-user"></span>プロフィール</a></li>
                    <li><a href="#"><span class="glyphicon glyphicon-log-in"></span>ログイン</a></li>
                </ul>
            </div>
        </div>
    </nav>
    @show