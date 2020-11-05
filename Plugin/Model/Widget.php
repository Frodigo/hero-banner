<?php
declare(strict_types=1);
/**
 * @copyright Copyright (C) Marcin Kwiatkowski (http://marcin-kwiatkowski.com)
 */

namespace Marcinkwiatkowski\HeroBanner\Plugin\Model;

use Magento\Widget\Model\Widget as MagentoWidget;

/**
 * Class Widget
 * @package Marcinkwiatkowski\HeroBanner\Plugin\Model
 */
class Widget
{
    /**
     * @param  MagentoWidget $subject
     * @param string $type
     * @param array $params
     * @param bool $asIs
     * @return array
     */
    public function beforeGetWidgetDeclaration(
        MagentoWidget $subject,
        string $type,
        array $params = [],
        ?bool $asIs = true
    ) : array
    {
        foreach ($params as $name => $value) {
            if (preg_match('/(___directive\/)([a-zA-Z0-9,_-]+)/', $value, $matches)) {
                $directive = base64_decode(strtr($matches[2], '-_,', '+/='));
                $params[$name] = str_replace(['{{media url="', '"}}'], ['', ''], $directive);
            }
        }

        return [$type, $params, $asIs];
    }
}
