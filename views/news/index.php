<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php if (isset($this->message)) {
        echo $this->message;
    }
    ?>
    <section class="content-header">
        <h1>
            Page Header
            <small>Optional description</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <!-- Your Page Content Here -->

        <div class="container">
            <div class="col-sm-12">
                <div class="row">

                    <?php for ($i = $start; $i < $end; $i++): ?>
                        <?php $news = $newsList[$i]; ?>
                        <div class="col-sm-6 col-md-3">
                            <div class="thumbnail">
                                <img src="<?php echo $news['preview'] ?>" alt="news_image">
                                <div class="caption">
                                    <h3><?php echo $news['title'] ?></h3>
                                    <p><?php echo $news['short_content'] ?></p>
                                    <p>Автор: <?php echo $news['author_name'] ?></p>
                                    <h4>Дата: <?php echo $news['date'] ?></h4>
                                    <p><a href="<?php echo CORE_PATH . 'news/single/' . $news['id'] ?>"
                                          class="btn btn-primary" role="button">Читать
                                            далее...</a>
                                </div>
                            </div>
                        </div>
                    <?php endfor; ?>

                </div>
            </div>
        </div>
        <div class="row text-center">
            <?php echo $pagination; ?>
        </div>

        <!--popap about us-->
        <div class="us_info col-md-4">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Как с нами связатся</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <div class="kontakt_tel">
                        <p>+380-999-911-111</p>
                        <p>e-mail: hakaton@gmail.com</p>
                    </div>
                    <div class="soc_icon">
                        <ul>
                            <li><a href="#"></a></li>
                            <li><a href="#"></a></li>
                            <li><a href="#"></a></li>
                        </ul>
                    </div>

                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
        <!--popap log in-->
        <div id="overlay_log"></div>
        <div class="col-md-8 form_log">
            <!-- Horizontal Form -->
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Horizontal Form</h3>
                </div>
                <!-- /.box-header -->
                <!-- form start -->
                <form class="form-horizontal" method="post" action="../../login">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="inputEmail3" class="col-sm-2 control-label">Email</label>

                            <div class="col-sm-10">
                                <input name="email" type="email" class="form-control" id="inputEmail3"
                                       placeholder="Email">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-2 control-label">Password</label>

                            <div class="col-sm-10">
                                <input name="pass_in" type="password" class="form-control" id="inputPassword3"
                                       placeholder="Password">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <div class="checkbox">
                                    <label>
                                        <input name="remember_me" type="checkbox"> Remember me
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer">
                        <button type="submit" class="btn btn-default">Cancel</button>
                        <button type="submit" class="btn btn-info pull-right">Sign in</button>
                    </div>
                    <!-- /.box-footer -->
                    <input type="hidden" name="redirect" value="news/page/<?php echo $Cpag ?>">
                </form>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
