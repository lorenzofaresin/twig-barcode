<?php

namespace TwigBarcode\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;
use TwigBarcode\Templating\BarcodeHelper;

class BarcodeExtension extends AbstractExtension
{
    /**
     * @var BarcodeHelper
     */
    private $htmlBarcodeHelper;
    /**
     * @var BarcodeHelper
     */
    private $svgBarcodeHelper;
    /**
     * @var BarcodeHelper
     */
    private $pngBarcodeHelper;
    /**
     * @var BarcodeHelper
     */
    private $jpgBarcodeHelper;

    public function __construct(
        BarcodeHelper $htmlBarcodeHelper,
        BarcodeHelper $svgBarcodeHelper,
        BarcodeHelper $pngBarcodeHelper,
        BarcodeHelper $jpgBarcodeHelper
    ) {
        $this->htmlBarcodeHelper = $htmlBarcodeHelper;
        $this->svgBarcodeHelper = $svgBarcodeHelper;
        $this->pngBarcodeHelper = $pngBarcodeHelper;
        $this->jpgBarcodeHelper = $jpgBarcodeHelper;
    }

    public function getFilters()
    {
        return [
            new TwigFilter('base64_encode', [$this, 'base64Encode']),
        ];
    }

    public function getFunctions()
    {
        return [
            new TwigFunction('barcode_html', [$this->htmlBarcodeHelper, 'getBarcode']),
            new TwigFunction('barcode_svg', [$this->svgBarcodeHelper, 'getBarcode']),
            new TwigFunction('barcode_png', [$this->pngBarcodeHelper, 'getBarcode']),
            new TwigFunction('barcode_jpg', [$this->jpgBarcodeHelper, 'getBarcode']),
        ];
    }

    public function base64Encode($data)
    {
        return base64_encode($data);
    }
}
