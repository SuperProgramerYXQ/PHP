<?php
/**
 * Programmer:SuperProgrammer_YXQ
 * Date:2020/8/11
 * Time:16:38
 */
namespace MyClass\Iteration;
use MyClass\DataBase\Mysqli;
use MyClass\Factory;

class AllUser implements \Iterator
{
    /**
     * 数据结果集
     * @var mixed
     */
    private $ids;
    /**
     * 数据库中取到的对象
     * @var array
     */
    private $data = array();
    /**
     * 当前迭代位置
     * @var int
     */
    private $index;
    function __construct()
    {
        $db = new Mysqli();
        $db->connect('localhost','root','root','php-test');
        $res = $db->query("select `id` from user");
        $db->close();
        $this->ids = $res->fetch_all(MYSQLI_ASSOC);
    }

    /**
     * Return the current element
     * @link https://php.net/manual/en/iterator.current.php
     * @return mixed Can return any type.
     * @since 5.0.0
     */
    public function current()
    {
        // TODO: Implement current() method.
        $id = $this->ids[$this->index]['id'];
        return Factory::getUser($id);
    }

    /**
     * Move forward to next element
     * @link https://php.net/manual/en/iterator.next.php
     * @return void Any returned value is ignored.
     * @since 5.0.0
     */
    public function next()
    {
        // TODO: Implement next() method.
        $this->index ++;
    }

    /**
     * Return the key of the current element
     * @link https://php.net/manual/en/iterator.key.php
     * @return mixed scalar on success, or null on failure.
     * @since 5.0.0
     */
    public function key()
    {
        // TODO: Implement key() method.
        return $this->index;
    }

    /**
     * Checks if current position is valid
     * @link https://php.net/manual/en/iterator.valid.php
     * @return bool The return value will be casted to boolean and then evaluated.
     * Returns true on success or false on failure.
     * @since 5.0.0
     */
    public function valid()
    {
        // TODO: Implement valid() method.
        return $this->index < count($this->ids);
    }

    /**
     * Rewind the Iterator to the first element
     * @link https://php.net/manual/en/iterator.rewind.php
     * @return void Any returned value is ignored.
     * @since 5.0.0
     */
    public function rewind()
    {
        // TODO: Implement rewind() method.
        $this->index = 0;
    }
}