<?phpnamespace models;use components\Db;class AppModel{    public static function saveMessage($data = null)    {        if (isset($data)) {            $_SESSION['messages'] = $data;        }        return;    }    public static function getUser($id)    {        if ($db = Db::getConnection(Db::ADMIN_BASE)) {            $query = "SELECT * FROM `clubs` WHERE `id` = '{$id}'";            $result = $db->query($query);            $row = $result->fetch_assoc();            $db->close();            return $row;        } else {            return false;        }    }    public static function showArray($array)    {        echo '<hr><br><pre>';        print_r($array);        echo '</pre><br><hr>';    }    public static function getAccordingPageTitle($current_page_uri){        if ($db = Db::getConnection(Db::ADMIN_BASE)) {            $current_page_uri = self::checkIfLastElementInteger($current_page_uri);            $query = "SELECT `title` FROM `pages` WHERE `link` = '{$current_page_uri}'";            $result = $db->query($query);            $title = 'No title';            if($result->num_rows > 0){                $row = $result->fetch_assoc();                $title = $row['title'];            }            $db->close();            return $title;        } else {            return 'Db connection error title';        }    }    public static function checkIfLastElementInteger($current_page_uri){        $route_arr = explode('/', $current_page_uri);        $last_element = $route_arr[count($route_arr) - 1];        $integer_pattern = '/^([0-9]+)$/';        if(preg_match("$integer_pattern", $last_element)){            array_pop($route_arr);            array_push($route_arr, '$1');            $current_page_uri = implode('/', $route_arr);        }        return $current_page_uri;    }}