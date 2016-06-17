<?php

/*
 * (c) Jérémy Marodon <marodon.jeremy@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Th3Mouk\FreeMobileSMSNotif;

use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Exception\RequestException;

final class Client implements ClientInterface
{
    /**
     * URL to contact Free Mobile API.
     */
    const API_URL = 'https://smsapi.free-mobile.fr/sendmsg';

    /**
     * Login to connect at the Free Mobile API.
     *
     * @var string
     */
    private $login;

    /**
     * Authentication key generated by the Free Mobile web interface.
     *
     * @var string
     */
    private $pass;

    /**
     * HTTP Client to communicate throught the web.
     *
     * @var GuzzleClient
     */
    private $httpClient;

    /**
     * Client constructor.
     *
     * @param string $login
     * @param string $pass
     */
    public function __construct($login, $pass)
    {
        $this->login = $login;
        $this->pass = $pass;
        $this->httpClient = new GuzzleClient();
    }

    /**
     * {@inheritdoc}
     */
    public function sendMessage($message)
    {
        try {
            return $this->httpClient->post(self::API_URL, [
                'login' => $this->login,
                'pass' => $this->pass,
                'msg' => (string) $message,
            ]);
        } catch (RequestException $exception) {
            return $exception->getResponse();
        }
    }

    /**
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @return string
     */
    public function getPass()
    {
        return $this->pass;
    }

    /**
     * @return GuzzleClient
     */
    public function getHttpClient()
    {
        return $this->httpClient;
    }

    /**
     * @param GuzzleClient $httpClient
     */
    public function setHttpClient(GuzzleClient $httpClient)
    {
        $this->httpClient = $httpClient;
    }
}