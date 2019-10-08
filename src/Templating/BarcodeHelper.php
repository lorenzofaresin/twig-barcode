<?php

namespace TwigBarcode\Templating;

use Picqer\Barcode\BarcodeGenerator;
use Symfony\Component\Templating\Helper\Helper;

class BarcodeHelper extends Helper
{
    /**
     * @var BarcodeGenerator
     */
    private $generator;

    public function __construct(BarcodeGenerator $generator)
    {
        $this->generator = $generator;
    }

    /**
     * @param $code
     * @param $type
     * @param int $widthFactor
     * @param int $totalHeight
     */
    public function getBarcode($code, $type, $widthFactor = 2, $totalHeight = 30)
    {
        return $this->generator->getBarcode($code, $type, $widthFactor, $totalHeight);
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'barcode';
    }
}
