<?php
declare(strict_types=1);
/**
 * @copyright Copyright (C) Marcin Kwiatkowski (http://marcin-kwiatkowski.com)
 */
namespace Marcinkwiatkowski\HeroBanner\Block\Widget;

use Magento\Cms\Helper\Wysiwyg\Images;
use Magento\Framework\View\Element\Template;
use Magento\Widget\Block\BlockInterface;

/**
 * Class HeroBanner
 * @package Marcinkwiatkowski\HeroBanner\Block\Widget
 */
class HeroBanner extends Template implements BlockInterface
{
    /**
     * @var Images
     */
    private Images $wysywigImagesHelper;

    /**
     * HeroBanner constructor.
     * @param Template\Context $context
     * @param Images $wysywigImagesHelper
     * @param array $data
     */
    public function __construct(
        Template\Context $context,
        Images $wysywigImagesHelper,
        array $data = []
    ) {
        parent::__construct($context, $data);
        $this->wysywigImagesHelper = $wysywigImagesHelper;
    }

    /**
     * @return $this
     */
    public function _construct() : HeroBanner
    {
        parent::_construct();
        $this->setTemplate("widget/hero-banner.phtml");

        return $this;
    }

    /**
     * Get hero image.
     *
     * @return string
     */
    public function getHeroImage() : string
    {
        $imagePath = $this->getImage();

        return $this->wysywigImagesHelper->getBaseUrl() . $imagePath;
    }
}
