<header>
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-Kakoubook" href="{{route('dashboard')}}">Kakoubook <br> <div align="center"><span class="glyphicon glyphicon-music" aria-hidden="true"></span></div> </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{route('account')}}">Account <br> <div align="center"><span class="glyphicon glyphicon-th-large" aria-hidden="true"></span></div> </a></li>
                    <li><a href="{{route('users')}}">Users <br> <div align="center"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></div> </a></li>
                    <li><a href="{{route('friends')}}">Friends <br> <div align="center"><span class="glyphicon glyphicon-star" aria-hidden="true"></span></div> </a></li>
                    <li><a href="{{route('settings.create')}}">Settings <br> <div align="center"><span class="glyphicon glyphicon-cog" aria-hidden="true"></span></div> </a></li>
                    <li><a href="{{route('logout')}}">Logout <br> <div align="center"><span class="glyphicon glyphicon-off" aria-hidden="true"></span></div> </a></li>

                </ul>

            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</header>