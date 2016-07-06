<?php
namespace App\Services\Admin;

/**
 * 服务基类
 *
 */
abstract class AbstractService
{
    /**
     * 错误与成功的信息载体
     *
     * @access protected
     */
    protected $errorMsg, $successMsg,$successData;

    /**
     * 取回错误的信息
     *
     * @access public
     */
    public function getErrorMessage()
    {
        return $this->errorMsg;
    }

    /**
     * @readme 取回成功的信息
     * @return mixed
     * @author LeslieWong
     * @email 99999r00t@gmail.com
     */
    public function getSuccessMsg()
    {
        return $this->successMsg;

    }

    /**
     * @readme 设置成功的数据
     * @param $successData
     * @return bool
     * @author LeslieWong
     * @email 99999r00t@gmail.com
     */
    public function getSuccessData()
    {
        return $this->successData;
    }



    /**
     * @readme 设置成功的信息
     * @param $successMsg
     * @return bool
     * @author LeslieWong
     * @email 99999r00t@gmail.com
     */
    public function setSuccessMsg($successMsg)
    {
        $this->successMsg = $successMsg;
        return true;
    }

    /**
     * 设置错误的信息
     *
     * @param string $errorMsg 错误的信息
     */
    public function setErrorMsg($errorMsg)
    {
        $this->errorMsg = $errorMsg;
        return false;
    }

    /**
     * @readme 设置成功的数据
     * @param $successData
     * @return bool
     * @author LeslieWong
     * @email 99999r00t@gmail.com
     */
    public function setSuccessData($successData)
    {
        $this->successData = $successData;
        return true;
    }



}
