<!--

$file = ROOT.'templates/news/template.html';

$content = file_get_contents($file);
$navigation = new Navigation();

$nav_content = $navigation->createNavContent('news', '');

$content = str_replace('[navigation]', $nav_content, $content);


//echo '<pre>';
//var_export($newsList);
//echo '</pre>';

$count = 0;
foreach ($newsList as $news){
    $tpl = file_get_contents(ROOT.'templates/news/news.tpl');
    $tpl = str_replace('[src]', $news['preview'], $tpl);
    $tpl = str_replace('[title]', $news['title'], $tpl);
    $tpl = str_replace('[short_content]', $news['short_content'], $tpl);
    $tpl = str_replace('[author_name]', $news['author_name'], $tpl);
    $tpl = str_replace('[date]', $news['date'], $tpl);
    $tpl = str_replace('[read_more_ref]', CORE_PATH.'news/'.$news['id'], $tpl);
    $content = str_replace("[text{$count}]", $tpl, $content);
    $count++;
}

echo $content; -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Все новости</title>
    <link type="text/css" rel="stylesheet" href="main/css/reset.css">
    <link rel="stylesheet" type="text/css" href="main/css/style.css">
    <script src="main/js/jquery.min.js"></script>
</head>
<body>
<div id="wrap">

    <!--    [navigation]-->

    <?php
    $navigation = new Navigation();
    $nav_content = $navigation->createNavContent('news', '');
    echo $nav_content;
    $count_news = count($newsList);
    const NEWS_PER_PAGE = 4;
    echo 'COUNT: ' . $count_news;

    $stat = 0;
    $end = $count_news / NEWS_PER_PAGE;

    echo '<pre>';
    var_export($newsList);
    echo '</pre>';
    ?>

    <div class="resize">
        <div class="slider">
            <!--<button id="prev"><img src="main/img/left.png" alt=""></button>-->
            <div id="circle">
<!--                --><?php //for(){
//
//                } ?>
                <div class="go">
                    <?php foreach ($newsList as $news): ?>
                        <?php static $count_news = 1;
                        if ($count_news == 5) {
                            break;
                        } ?>
                        <section>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="image_news">
                                        <img src="<?php echo $news['preview'] ?>" alt="news_image" width="100%">
                                    </div>
                                    <h3><?php echo $news['title'] ?></h3>
                                    <p><?php echo $news['short_content'] ?></p>
                                    <p>Автор: <?php echo $news['author_name'] ?></p>
                                    <h4>Дата: <?php echo $news['date'] ?></h4>
                                    <a href="<?php echo CORE_PATH . 'news/' . $news['id'] ?>">Читать далее...</a>
                                </div>
                            </div>
                        </section>
                        <?php $count_news++;
                    endforeach; ?>
                </div>
                <!--                <div class="go">-->
                <!--                    <section>[text0]</section>-->
                <!--                    <section>[text1]</section>-->
                <!--                    <section>[text2]</section>-->
                <!--                    <section>[text3]</section>-->
                <!--                </div>-->
                <!--                <div class="go">-->
                <!--                    <section>[text4]</section>-->
                <!--                    <section>[text5]</section>-->
                <!--                    <section>[text6]</section>-->
                <!--                    <section>[text7]</section>-->
                <!--                </div>-->
                <!--                <div class="go">-->
                <!--                    <section>[text8]</section>-->
                <!--                    <section>[text9]</section>-->
                <!--                    <section>[text10]</section>-->
                <!--                    <section>[text11]</section>-->
                <!--                </div>-->
                <!--            </div>-->
            </div>
            <!-- log in -->
            <div id="overlay_log"></div>
            <div class="form_log">
                <form method="POST" action="login">
                    <label for="login_in"><input name="log_in" id="login_in" type="login"
                                                 placeholder="Введите логин"></label>
                    <label for="password_in"><input name="pass_in" id="password_in" type="password"
                                                    placeholder="Введите пароль"></label>
                    <label><input name="login_sub" id="login_sub" type="submit" value="Войти"></label>
                    <input name="redirect" type="hidden" value="news">
                    <a href="home#registration_form" class="reg">Зарегистрироватся</a>
                </form>
            </div>
            <!-- popup -->
            <div id="overlay"></div>
            <div id="popup">
                <div class="header"><h2>Наши контакты</h2></div>
                <div class="content">
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
                </div>
            </div>

        </div>
    </div>

    <a href="#" class="prev"><img src="main/img/left.png"></a>
    <a href="#" class="next"><img src="main/img/right.png"></a>
    <!--POP-UP--><!--
<div id="overlay1"></div>
<div id="popup-news">
    <div class="header">Заголовок новости</div>
    <div class="text">Текст новости</div>
    <p class="buttons"><a href="#">Ok</a></p>
</div>-->

    <script type="text/javascript" src="main/js/script.js"></script>
</body>
</html>