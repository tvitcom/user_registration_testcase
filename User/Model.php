<?php
if (!defined('WEB_DIR'))
    die('Access denied!');
/* /
  //*
 * * */

/*
 * The Model for entity "User" as many classes with handlers controllers
 */

function is_user($email)
{
    $query = MySQL::getInstance()->prepare('
        SELECT id, fio, whois, email, passhash, sex, photo, rights, t_passhash
        FROM users
        WHERE email=:email AND is_active=1 limit 1
    ');
    $query->BindValue(':email', $email, PDO::PARAM_STR);
    $query->execute();
    $user = $query->fetch(PDO::FETCH_ASSOC);
    return $user;
}

function get_count_users()
{
    $query = MySQL::getInstance()->query("
        SELECT count(*) as quantity
        FROM  users
        WHERE is_active = 1"
    );
    return $query->fetch(PDO::FETCH_ASSOC);
}

function update_user($data = array())
{
    if (!count($data))
        return;
    $query = "
        UPDATE users
        SET (
            fio=:fio,
            whois=:whois,
            email=:email,
            passhash=:passhash,
            credit_card=:credit_card,
            card_expire=:card_expire,
            sex=:sex,
            photo=:photo,
            rights=:rights,
            t_passhash=:t_passhash,
            is_active=:is_active)
        WHERE id = :id
        ";
    $query = MySQL::getInstance()->prepare($query);
    $query->bindValue(':id', $data['id'], PDO::PARAM_INT);
    $query->bindValue(':fio', $data['fio'], PDO::PARAM_STR);
    $query->bindValue(':whois', $data['whois'], PDO::PARAM_STR);
    $query->bindValue(':email', $data['email'], PDO::PARAM_STR);
    $query->bindValue(':passhash', $data['passhash'], PDO::PARAM_STR);
    $query->bindValue(':credit_card', $data['credit_card'], PDO::PARAM_STR);
    $query->bindValue(':card_expire', $data['card_expire'], PDO::PARAM_STR);
    $query->bindValue(':sex', $data['sex'], PDO::PARAM_BOOL);
    $query->bindValue(':photo', $data['photo'], PDO::PARAM_STR);
    $query->bindValue(':rights', $data['rights'], PDO::PARAM_STR);
    $query->bindValue(':t_passhash', $data['t_passhash'], PDO::PARAM_STR);
    $query->bindValue(':is_active', $data['is_active'], PDO::PARAM_BOOL);
    $query->execute();
}

function delete_user($user_id = 0)
{
    $query = MySQL::getInstance()->prepare("DELETE FROM users WHERE id = :id");
    $query->bindValue(':id', $user_id, PDO::PARAM_INT);
    $result = $query->execute();
    return $result;
}

function insert_user($data)
{
    $query = MySQL::getInstance()->prepare("
        INSERT INTO users
        VALUES (:id,:fio,:whois,:email,:passhash,:credit_card,:card_expire,
                :sex,:photo,:rights,:t_passhash,:is_active)
    ");
    $query->bindValue(':id', '', PDO::PARAM_STR);
    $query->bindValue(':fio', $data['fio'], PDO::PARAM_STR);
    $query->bindValue(':whois', $data['whois'], PDO::PARAM_STR);
    $query->bindValue(':email', $data['email'], PDO::PARAM_STR);
    $query->bindValue(':passhash', $data['passhash'], PDO::PARAM_STR);
    $query->bindValue(':credit_card', $data['credit_card'], PDO::PARAM_STR);
    $query->bindValue(':card_expire', $data['card_expire'], PDO::PARAM_STR);
    $query->bindValue(':sex', $data['sex'], PDO::PARAM_BOOL);
    $query->bindValue(':photo', $data['photo'], PDO::PARAM_STR);
    $query->bindValue(':rights', $data['rights'], PDO::PARAM_STR);
    $query->bindValue(':t_passhash', $data['t_passhash'], PDO::PARAM_STR);
    $query->bindValue(':is_active', $data['is_active'], PDO::PARAM_BOOL);
    try
    {
        $query->execute();
        return true;
    }
    catch (PDOException $e)
    {
        echo '{"notice":"' . addslashes($e->getMessage()) . '"}';
        exit();
    };
}

function get_user_data($email = '')
{
    if (!empty($email)) {
        $user = MySQL::getInstance()->prepare('
            SELECT id, fio, whois, email, passhash, credit_card, card_expire,
                         sex, photo, rights, t_passhash, is_active
            FROM users
            WHERE email = :email
            LIMIT 1
        ');
        $user->bindValue(':email', $email, PDO::PARAM_STR);
        $user->execute();
        return $user->fetch(PDO::FETCH_ASSOC);
    }
    return;
}

function set_user_profile($email = '')
{
    $user = MySQL::getInstance()->prepare('
        UPDATE users
        SET is_active = 1
        WHERE email=:email
    ');
    $user->bindValue(':email', $email, PDO::PARAM_STR);
    if ($user->execute()) {
        return true;//$user->fetch(PDO::FETCH_ASSOC);
    } else {
        return;
    }
}
