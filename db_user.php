
<?php
/**
 *  Автор: Евгений Сорока
 *
 *  Дата реализации: 28.07.2022 17:45
 *
 *  Дата изменения: 29.07.2022 13:08
 *
 *  Класс для работы с пользователем
 */
require_once 'database.php';
/**
 * Класс db_user
 *
 * Классс содержит 6 публичных переменных $id, $firstname, $lastname, $birthday, $sex, $city и 1 приватную переменную
 * для работы с классом базы данных $database.
 * Зайдествовано 7 публичных методов включаяя конструктор объекта. В конструкторе объекта содержится определние всех
 * передаваемых переменных и инициализация подключения к базе данных. В конструкторе происходит проверка на существование
 * пользователя в базе данных.
 * Метод Save ответчает за отправку данных объекта в БД.
 * Метод Delete отвечает за удаление пользователя по ID из БД.
 * Методы Convert_Date b Sex отвечают за преобразование типов данных.
 * Метод Exsist_user проверяет наличие пользователя в базе данных.
 * Метод StdClass отвечает за создание Std класса.
 */
class db_user
{

    public $id, $firstname, $lastname, $birthday, $sex, $city;
    private $database;
    public function __construct($id, $firstname, $lastname, $birthday, $sex, $city)
    {
        $this->id = $id;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->birthday = $birthday;
        $this->sex = $sex;
        $this->city = $city;
        $this->database = new database('localhost', 'root', '', 'him4e');
        if (!$this->exsist_user()) {
            $this->save();

        } else {
            $row = mysqli_fetch_assoc($this->database->request("SELECT * FROM `users` WHERE id= $this->$id"));
            return $row;
        }

    }

    public function save()
    {
        $query = "INSERT INTO `users` (`id`, `firstname`, `lastname`, `birthday`, `sex`, `city`) "
               . "VALUES ('$this->id', '$this->firstname', '$this->lastname', '$this->birthday', '$this->sex', '$this->city')";
        $this->database->request($query);
    }

    public function delete()
    {
        $query = "DELETE FROM `users` "
               . "WHERE `id` = $this->id";
        $this->database->request($query);
    }

    public static function convert_date($birthday)
    {
        $age = date("d.m.y")-$birthday;
        return $age;
    }

    public static function sex($sex)
    {
        if ($sex == 0) {
            return 'Женский';
        } else {
            return 'Мужской';
        }
    }

    public function exsist_user()
    {
        $query = "SELECT COUNT(*) "
               . "WHERE `lastname` = $this->firstname";
        $temp = $this->database->request($query);
        return $temp;
    }

    public function StdClass()
    {
        $user = new stdClass;
        $user->id = $this->id;
        $user->firstname = $this->firstname;
        $user->lastname = $this->lastname;
        $user->birthday = self::convert_date($this->birthday);
        $user->sex = self::sex($this->sex);
        $user->city = $this->city;
    }
}

?>