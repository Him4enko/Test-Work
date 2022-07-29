<?php
/**
 *  Автор: Евгений Сорока
 *
 *  Дата реализации: 28.07.2022 17:45
 *
 *  Дата изменения: 29.07.2022 13:04
 *
 *  Класс для работы с пользователем
 */

/**
 * Класс database
 *
 * Классс содержит 4 публичных переменных  private $host, $user, $password, $database.
 * В классе зайдествовано 3 публичных функции включая конструктор объекта.
 * В конструкторе происхоидт инициализация переменных и вызов метода подключения к БД.
 * Функция connect() отвечает за подключение к базе данных.
 * Функция request() отвечает за отправку запроса к базе данных.
 */
class database
{
    private $host, $user, $password, $database;
    public function __construct($host='localhost', $user='root', $password='', $database='')
    {
        $this->host = $host;
        $this->user = $user;
        $this->password = $password;
        $this->database = $database;
        $this->connect();
    }

    public function connect()
    {
        $connect = mysqli_connect($this->host, $this->user, $this->password, $this->database);
        if ($connect) {
            return $connect;
        }
    }

    public function request($request)
    {
        $query = $this->connect()->query($request);
        return $query;
    }
}