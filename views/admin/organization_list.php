<?php ?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="../../../views/main/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../../../views/main/css/AdminLTE.css">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <link rel="stylesheet" href="../../../views/main/css/skins/skin-blue.min.css">
    <link rel="stylesheet" type="text/css" href="../../../views/main/css/style.css">
    <script src="../../../views/main/js/jquery.min.js"></script>
    <title>Document</title>
    <style>
        label{
            margin-left: 50px;
        }
        input{
            margin-left:50px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
<div style="background: #0259C4; margin: 10px; ">
    <form action="index.php?action=<?=$_GET['action']?>&id=<?=$_POST['id']?>" method="post" ><br/>
        <label>Название события<br/><input type="text" value="" name="sobytie"/></label><br/>
        <label>Название организации<br/><input type="text" value="" name="organization"/></label><br/>
        <label>Статус<br/><input type="text" value="" name="status"/></label><br/>
        <label>Название мероприятия<br/><input type="text" value="" name="name_meroprijatia"/></label><br/>
        <label> Дата начала <br/><input type="date" value="" name="date_begin" required/></label><br/>
        <label> Дата окончания <br/><input type="date" value="" name="date_end"/></label><br/>
        <label> Выбирите город <br/><input type="text" value="" name="city"/></label><br/>
        <label> Выбирите страну <br/><input type="text" value="" name="country"/></label><br/>
        <label> Главный судья <br/><input type="text" value="" name="main_sudia"/></label><br/>
        <label>Скутинер<br/><input type="text" value="" name="skutiner"/></label><br/>
        <label>Добавить афишу события<br/><input type="text" value="" name="afisha"/></label><br/>
        <input type="submit" value="Save"/>
        <input type="hidden" value="<?php events::event_add($link,$_POST['sobytie'],$_POST['organization'],
            $_POST['status'], $_POST['name_meroprijatia'],$_POST['date_begin'],
            $_POST['date_end'],$_POST['city'],$_POST['country'],$_POST['main_sudia'],
            $_POST['skutiner'],$_POST['afisha']/*,$_POST['image']*/
        );?>
    </form>
</div>
</body>
</html>
