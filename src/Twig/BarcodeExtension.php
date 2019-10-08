<?php

namespace TwigBarcode\Twig;

use Picqer\Barcode\BarcodeGenerator;
use ReflectionClass;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;
use TwigBarcode\Templating\BarcodeHelper;

class BarcodeExtension extends AbstractExtension
{
    /**
     * @var BarcodeHelper[]
     */
    private $barCodeHelpers = [];

    /**
     * @var array
     */
    private $formats;

    public function __construct(
        BarcodeHelper $htmlBarcodeHelper,
        BarcodeHelper $svgBarcodeHelper,
        BarcodeHelper $pngBarcodeHelper,
        BarcodeHelper $jpgBarcodeHelper,
        array $formats
    )
    {
        $this->barCodeHelpers['html'] = $htmlBarcodeHelper;
        $this->barCodeHelpers['svg'] = $svgBarcodeHelper;
        $this->barCodeHelpers['png'] = $pngBarcodeHelper;
        $this->barCodeHelpers['jpg'] = $jpgBarcodeHelper;
        $this->formats = $formats;
    }

    public function getFilters()
    {
        return [
            new TwigFilter('base64_encode', [$this, 'base64Encode'])
        ];
    }

    public function getFunctions()
    {
        $functions = [];

        $reflectionClass = new ReflectionClass(BarcodeGenerator::class);
        $types = $reflectionClass->getConstants();


        foreach ($this->formats as $format) {

            if (!array_key_exists($format, $this->barCodeHelpers)) {
                continue;
            }

            foreach ($types as $type) {

                $name = sprintf('barcode_%s_*', $format);
                $name = str_replace('+', '_plus', $name);

                $functions[] = new TwigFunction(
                    $name,
                    [
                        $this->barCodeHelpers[$format],
                        'getBarcode'
                    ],
                    [
                        'is_safe' => ['html']
                    ]
                );
            }
        }

        return $functions;
    }

    public function base64Encode($data)
    {
        return base64_encode($data);
    }
}
