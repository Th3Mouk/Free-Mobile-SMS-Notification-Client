<?php

/*
 * (c) Jérémy Marodon <marodon.jeremy@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Th3Mouk\FreeMobileSMSNotif;

use Psr\Http\Message\ResponseInterface;

interface ClientInterface
{
    /**
     * Method to send a POST message through the Free Mobile API.
     *
     * @param $message
     *
     * @return ResponseInterface
     */
    public function sendMessage($message);
}
