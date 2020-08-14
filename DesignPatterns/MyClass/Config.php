<?php
/**
 * 配置文件加载类
 * Programmer:SuperProgrammer_YXQ
 * Date:2020/8/12
 * Time:10:33
 */
namespace MyClass;
use mysql_xdevapi\Exception;

class Config implements \ArrayAccess
{
    /**
     * 配置文件路径
     * @var string
     */
    private $path;
    /**
     * @var array
     */
    private $configs = array();
    function __construct($path)
    {
        $this->path = $path;
    }

    /**
     * Whether a offset exists
     * @link https://php.net/manual/en/arrayaccess.offsetexists.php
     * @param mixed $offset <p>
     * An offset to check for.
     * </p>
     * @return bool true on success or false on failure.
     * </p>
     * <p>
     * The return value will be casted to boolean if non-boolean was returned.
     * @since 5.0.0
     */
    public function offsetExists($offset)
    {
        // TODO: Implement offsetExists() method.
        return isset($this->configs[$offset]);
    }

    /**
     * Offset to retrieve
     * @link https://php.net/manual/en/arrayaccess.offsetget.php
     * @param mixed $offset <p>
     * The offset to retrieve.
     * </p>
     * @return mixed Can return all value types.
     * @since 5.0.0
     */
    public function offsetGet($offset)
    {
        // TODO: Implement offsetGet() method.
        if (empty($this->configs[$offset]))
        {
            $file_path = $this->path.'/'.$offset.'.php';
            if (file_exists($file_path)) {
                $config = require $file_path;
                $this->configs[$offset] = $config;
            } else {
                return 'The profile does not exist.';
            }

        }
        return $this->configs[$offset];
    }

    /**
     * Offset to set
     * @link https://php.net/manual/en/arrayaccess.offsetset.php
     * @param mixed $offset <p>
     * The offset to assign the value to.
     * </p>
     * @param mixed $value <p>
     * The value to set.
     * </p>
     * @return void
     * @since 5.0.0
     */
    public function offsetSet($offset, $value)
    {
        // TODO: Implement offsetSet() method.
        throw new Exception("cannot write config file.");
    }

    /**
     * Offset to unset
     * @link https://php.net/manual/en/arrayaccess.offsetunset.php
     * @param mixed $offset <p>
     * The offset to unset.
     * </p>
     * @return void
     * @since 5.0.0
     */
    public function offsetUnset($offset)
    {
        // TODO: Implement offsetUnset() method.
        unset($this->configs[$offset]);
    }
}