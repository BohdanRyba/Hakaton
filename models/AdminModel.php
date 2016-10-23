<?php

class AdminModel
{
    static function events_all($link)
    {
        $query = "SELECT * FROM events ORDER BY id DESC";
        $result = mysqli_query($link, $query);
        if (!$result) {
            die(mysqli_error($link));
        }
        $n = mysqli_num_rows($result);

        $events = array();

        for ($i = 0; $i < $n; $i++) {
            $row = mysqli_fetch_assoc($result);
            $events[] = $row;
        }

        return $events;
    }

    static  function  event_by_id($link,$event_id){
        $query = sprintf("SELECT * FROM events WHERE id=%d",(int)$event_id);
        $result = mysqli_query($link,$query);
        $event=array();
        if (!$result){
            die(mysqli_error($link));
        }
        $event = mysqli_fetch_assoc($result);
        return $event;
    }
    static function event_add($link,$sobytie,$organization,$status,$name_meroprijatia,$date_begin,$date_end,
                              $city,$country,$main_sudia,$skutiner,$afisha/*,$image*/){

        if (is_null( $organization)|| is_null($status)|| is_null($name_meroprijatia)|| is_null($date_begin)|| is_null($date_end)||
            is_null($city)|| is_null($country)|| is_null($main_sudia)|| is_null($skutiner)|| is_null($afisha) /*and $image=''*/){
            return false;
        }
        $sobytie = trim($sobytie);
        $organization = trim($organization);
        $status = trim($status);
        $name_meroprijatia = trim($name_meroprijatia);
        $date_begin = trim($date_begin);
        $date_end = trim($date_end);
        $city = trim($city);
        $country = trim($country);
        $main_sudia = trim($main_sudia);
        $skutiner = trim($skutiner);
        $afisha = trim($afisha);
        //$image=trim($image);



        $t = " INSERT INTO events (sobytie,organization,status,name_meroprijatia,date_begin,date_end,city,country,main_sudia,skutiner,afisha)
  VALUES ('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s');";
        $query = sprintf($t,
            mysqli_real_escape_string($link,$sobytie),
            mysqli_real_escape_string($link,$organization),
            mysqli_real_escape_string($link,$status),
            mysqli_real_escape_string($link,$name_meroprijatia),
            mysqli_real_escape_string($link,$date_begin),
            mysqli_real_escape_string($link,$date_end),
            mysqli_real_escape_string($link,$city),
            mysqli_real_escape_string($link,$country),
            mysqli_real_escape_string($link,$main_sudia),
            mysqli_real_escape_string($link,$skutiner),
            mysqli_real_escape_string($link,$afisha)
        /*,mysqli_real_escape_string($link,$image)*/
        );
        $result = mysqli_query($link,$query);
        if (!$result){
            mysqli_error($link);
        }
        return $result="successful";
    }
    static function event_edit($link,$id,$sobytie,$organization,$status,$name_meroprijatia,$date_begin,$date_end,
                               $city,$country,$main_sudia,$skutiner,$afisha)
    {
        if (is_null( $organization)|| is_null($status)|| is_null($name_meroprijatia)|| is_null($date_begin)|| is_null($date_end)||
            is_null($city)|| is_null($country)|| is_null($main_sudia)|| is_null($skutiner)|| is_null($afisha) /*and $image=''*/){
            return false;
        }
        $sobytie=trim($sobytie);
        $organization=trim($organization);
        $status=trim($status);
        $name_meroprijatia=trim($name_meroprijatia);
        $date_begin=trim($date_begin);
        $date_end=trim($date_end);
        $city=trim($city);
        $country=trim($country);
        $main_sudia=trim($main_sudia);
        $skutiner=trim($skutiner);
        $afisha=trim($afisha);

        $sql = "UPDATE events SET sobytie='%s', organization='%s', status='%s', name_meroprijatia='%s', date_begin='%s',date_end='%s', city='%s', country='%s', main_sudia='%s' ,skutiner='%s', afisha='%s' WHERE id='%d'";
        $query = sprintf(
            $sql,
            mysqli_real_escape_string($link,$sobytie),
            mysqli_real_escape_string($link,$organization),
            mysqli_real_escape_string($link,$status),
            mysqli_real_escape_string($link,$name_meroprijatia),
            mysqli_real_escape_string($link,$date_begin),
            mysqli_real_escape_string($link,$date_end),
            mysqli_real_escape_string($link,$city),
            mysqli_real_escape_string($link,$country),
            mysqli_real_escape_string($link,$main_sudia),
            mysqli_real_escape_string($link,$skutiner),
            mysqli_real_escape_string($link,$afisha),
            $id
        );
        $result = mysqli_query($link,$query);
        if (!$result){
            die(mysqli_error($link));
        }
        return mysqli_affected_rows($link);
    }

    static function event_delete($link,$id){
        if ($id==''){
            return false;
        }
        $id = (int)$id;
        $query = sprintf("DELETE FROM events WHERE id='%d'",$id);
        $result = mysqli_query($link,$query);
        if (!$result){
            die(mysqli_error($link));
        }
        return mysqli_affected_rows($link);
    }
}