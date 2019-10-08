# Twig Barcode 
Generate barcodes within twig

## Installation 

Install with Composer

```
composer require alpin11/twig-barcode
```

After installation add it to your bundles

### Usage 

Simply use it like any other Twig function: 

```
barcode_html_ean13(theBarcodeValue, widthFactor = 2, totalHeight = 30)
```

### Options 

#### Width Factor

With that option you can manipulate the width of the barcode. Default is `2`.
That means, the generated width of the barcode will be multiplied with you width factor.

### Total Height

With that option you can set the height of the generated barcode. The default is value is `30`

### Supported Formats 

#### HTML
```
barcode_html_*
```
#### SVG
```
barcode_svg_*
```
#### PNG
```
barcode_png_*
```
#### JPG
```
barcode_jpg_*
```

### Supported Types 

| Type | Twig Function |
|------|---------------|
| TYPE_CODE_39 | `barcode_*_c39` |
| TYPE_CODE_39_CHECKSUM | `barcode_*_c39_plus` |
| TYPE_CODE_39E | `barcode_*_c39e` |
| TYPE_CODE_39E_CHECKSUM | `barcode_*_c39e_plus` |
| TYPE_CODE_93 | `barcode_*_c93` |
| TYPE_STANDARD_2_5 | `barcode_*_s25` |
| TYPE_STANDARD_2_5_CHECKSUM | `barcode_*_s25_plus` |
| TYPE_INTERLEAVED_2_5 | `barcode_*_i25` |
| TYPE_INTERLEAVED_2_5_CHECKSUM | `barcode_*_i25_plus` |

