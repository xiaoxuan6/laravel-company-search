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

use GuzzleHttp\Client;
use Illuminate\Contracts\Config\Repository;
use Symfony\Component\HttpFoundation\Request;
use GuzzleHttp\Exception\{GuzzleException, RequestException};

class LaravelCompanySearchHandler
{
    public const URI = 'https://cdetail.market.alicloudapi.com';

    /**
     * The configuration repository instance.
     *
     * @var Repository
     */
    protected $config;

    public function __construct(Repository $config)
    {
        $this->config = $config;
    }

    /**
     * @param string $key
     * @return ResultResponse
     * @throws GuzzleException
     */
    public function search(string $key): ResultResponse
    {
        try {
            $params = [
                'keyword' => $key
            ];

            $result = (new Client(['timeout' => 30, 'verify' => false]))
                ->request(Request::METHOD_GET, self::URI . '/lianzhuo/cdetails?' . http_build_query($params), [
                    'headers' => [
                        'Authorization' => 'APPCODE ' . $this->config->get('search.appcode', ''),
                        'Content-Type' => 'application/json',
                        'charset' => 'utf-8'
                    ]
                ]);

            return new ResultResponse([
                'status' => $result->getStatusCode(),
                'data' => json_decode($result->getBody()->getContents(), true),
                'msg' => 'ok'
            ]);
        } catch (RequestException $exception) {
            return new ResultResponse([
                'status' => $exception->getCode(),
                'data' => [],
                'msg' => $exception->getMessage()
            ]);
        }
    }
}
