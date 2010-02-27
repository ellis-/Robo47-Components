<?php

/**
 * Robo47 Components
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.
 * It is also available through the world-wide-web at this URL:
 * http://robo47.net/licenses/new-bsd-license
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to robo47[at]robo47[dot]net so I can send you a copy immediately.
 *
 * @category   Robo47
 * @package    Robo47
 * @copyright  Copyright (c) 2007-2010 Benjamin Steininger (http://robo47.net)
 * @license    http://robo47.net/licenses/new-bsd-license New BSD License
 */
/**
 * Robo47_Core
 *
 * @package     Robo47
 * @subpackage  Core
 * @since       0.1
 * @copyright   Copyright (c) 2007-2010 Benjamin Steininger (http://robo47.net)
 * @license     http://robo47.net/licenses/new-bsd-license New BSD License
 * @author      Benjamin Steininger <robo47[at]robo47[dot]net>
 */
class Robo47_Core
{

    /**
     * Robo47 Components version identification
     */
    const VERSION = '0.1';

    /**
     * Get Type
     *
     * Returns the type of the variable or class if it is an object
     *
     * @param mixed $var
     * @return string
     */
    public static function getType($var)
    {
        $type = strtolower(gettype($var));
        if ($type == 'object') {
            $type = get_class($var);
        }
        return $type;
    }
}
