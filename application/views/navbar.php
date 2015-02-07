
<nav class="navbar navbar-inverse navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?=site_url();?>">Vkysnee.NET<small> beta</small></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

            <form class="navbar-form navbar-left navbar-search" role="search" >
                <div class="input-group navbar-search">
                    <input type="text" class="form-control">
                    <span class="input-group-btn">
                        <button class="btn btn-default" type="button">
                            <span class="glyphicon glyphicon-search"></span>
                        </button>
                    </span>
                </div>
            </form>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="<?=site_url();?>"><span class="glyphicon glyphicon-info-sign"></span> Оплата и доставка</a>
                </li>
                <li>
                    <a href="<?=site_url()?>/login"><span class="glyphicon glyphicon-user"></span> 
                        <?php if(empty($this->session->userdata('logged_in'))) { ?>
                        Войти 
                        <?php }else {
                            $phone = $this->session->userdata('logged_in');
                            $phone = $phone['phone'];
                            echo $phone;
                        } ?>
                    </a>
                </li>
                <li>
                    <a href="<?=site_url();?>/cart">
                        <!-- <span class="badge"><?=$this->cart->total_items()?></span> -->
                        <span class="glyphicon glyphicon-shopping-cart cart_amount a"></span> 
                        <span id="cart_amount" class="cart_amount text-muted"><?=$this->cart->total()?></span> <span class="text-muted">грн</span></a>
                    </li>


                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>
