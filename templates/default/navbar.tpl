    <!-- Fixed navbar -->
    <nav class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Project name</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
          <ul class="nav navbar-nav">
            <li class="{if $page == 'index'}active{/if}"><a href="{$url}home">Home</a></li>
            <li><a href="#">Contact us</a></li>
            <li class="dropdown {if $page == 'example-fa'}active{/if}">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Examples <span class="caret"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li class="{if $page == 'example-fa'}active{/if}"><a href="{$url}example/fa">Font Awesome</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </nav>