<?php
/**
 *  Автор: Евгений Сорока
 *
 *  Дата реализации: 28.07.2022 17:45
 *
 *  Дата изменения: 29.07.2022 13:09
 *
 *  Класс для работы со списком
 */
require_once 'db_user.php';
if (class_exists('db_user')) {
    /**
     * Класс list_user
     *
     * Классс содержит 6 публичных переменных $user_id, $list_exemp, $temp являющихся масивами.
     * В классе зайдествовано 3 публичных функции включая конструктор объекта.
     * В конструкторе происхоидт инициализация переменных.
     * Функция get_users() отвечает за добавление экземпляров класса в массив используя выбранные ID пользователя
     * Функция delete_users() отвечает за удаление данных пользователей задействую класс db_user.
     */
    class list_user
    {
        public $users_id = [];
        public $list_exemp = [];
        public $temp = [];


        public function __construct($list_id, $list_exemp)
        {
            $this->users_id = $list_id;
            $this->list_exemp = $list_exemp;
            $this->temp= [];

        }

        public function get_users()
        {
            for ($i = 0; $i<count($this->users_id); $i++){
                for ($b = 0; $b < count($this->list_exemp); $b++){
                    if ($this->list_exemp[$b]->id == $this->users_id[$i])
                        array_push($this->temp, $list_exemp[$b]);
                }
            }
        }

        public function delete_users()
        {
            for ($i = 0; $i < count($this->temp); $i++) {
                $this->temp[$i]->delete();
            }
        }


    }
} else {
    echo 'Ошибка. Не найден класс.';
}

?>