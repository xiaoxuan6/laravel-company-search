<?php
/**
 * This file is part of PHP CS Fixer.
 *
 * (c) vinhson <15227736751@qq.com>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */
namespace Vinhson\LaravelCompanySearch;

class ResultResponse
{
    private string $status;

    private array $response;

    public const ERROR_CODE = [
        400 => '访问方式错误',
        401 => '请求参数不合法',
        402 => 'appkey验证错误或服务请求次数为0',
        403 => 'appkey不能为空',
        500 => '系统服务错误',
        501 => '系统无记录',
    ];

    public function __construct($response)
    {
        $this->response = $response;
        $this->status = $response['data']['resp']['RespCode'] ?? '';
    }

    public function isSuccess(): bool
    {
        return $this->response['status'] == 200 && $this->status == 200;
    }

    public function isFail(): bool
    {
        return ! $this->isSuccess();
    }

    public function getReason(): string
    {
        if ($this->isSuccess()) {
            return $this->response['msg'];
        }

        return self::ERROR_CODE[$this->status] ?? $this->response['msg'];
    }

    public function getData(): array
    {
        return $this->response['data']['data']['result']['result'] ?? [];
    }

    /*X
     * 股东信息
     * @return array
     */
    public function getInvestorList(): array
    {
        return $this->getData()['investorList'] ?? [];
    }

    /**
     * 变更信息
     * @return array
     */
    public function getComChanInfoList(): array
    {
        return $this->getData()['comChanInfoList'] ?? [];
    }

    /**
     * 基本信息
     * @return array
     */
    public function getBaseInfo(): array
    {
        return $this->getData()['baseInfo'] ?? [];
    }

    /**
     * 投资公司
     * @return array
     */
    public function getInvestList(): array
    {
        return $this->getData()['investList'] ?? [];
    }

    /**
     * 经营异常信息
     */
    public function getComAbnoInfoList()
    {
        return $this->getData()['comAbnoInfoList'] ?? '';
    }

    /**
     * 商标
     */
    public function getTmList()
    {
        return $this->getData()['tmList'] ?? '';
    }

    /**
     * 年报信息
     * @return array
     */
    public function getAnnuRepYearList(): array
    {
        return $this->getData()['annuRepYearList'] ?? [];
    }

    /**
     * 分支机构
     */
    public function getBranchList()
    {
        return $this->getData()['branchList'] ?? '';
    }

    /**
     * 高管
     * @return array
     */
    public function getStaffList(): array
    {
        return $this->getData()['staffList'] ?? [];
    }

    /**
     * 诉讼
     * @return array
     */
    public function getLawSuitList(): array
    {
        return $this->getData()['lawSuitList'] ?? [];
    }
}
