<?php
/**
 * Programmer:SuperProgrammer_YXQ
 * Date:2020/8/6
 * Time:9:40
 */
namespace MyClass;
class User
{
    public $id;
    public $name;
    public $phone;
    public $regtime;

    protected $db;
    function __construct($id)
    {
        $this->db = new \MyClass\DataBase\Mysqli();
        $this->db->connect('localhost','root','root','php-test');
        $res = $this->db->query("select * from `user` where `id`=$id limit 1");
        $data = $res->fetch_assoc();

        $this->id = $data['id'];
        $this->name = $data['name'];
        $this->phone = $data['phone'];
        $this->regtime = $data['regtime'];
    }

    function __destruct()
    {
        // TODO: Implement __destruct() method.
        $this->db->query("
            update `user` set 
            `name`='{$this->name}',
            `phone`='{$this->phone}',
            `regtime`='{$this->regtime}' 
            where `id`={$this->id}
        ");

    }
}