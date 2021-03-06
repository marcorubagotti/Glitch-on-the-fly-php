# Glitch on the fly php

A simple php script for glitch jpg/jpeg images on the fly, based on hex string manipulation

![Glitch php sample](http://marcorubagotti.com/glitch.php?src=http://loremflickr.com/320/240/cat&c=1&cs=5&q=10)

## Getting Started

Put glitch.php file into your directory where are hosted the images, you can also use external images hosted anywhere

### Prerequisites

PHP 5.x or newer version, currently tested with 5.6.25

### How to use

```
<img src="glitch.php?src=your-img-path/image.jpg&c=1">
```

### Parameters

| Params | Description | Values |
| --- | --- | --- |
| src | url of image to glitch | *required* |
| c | enable current glitch effect | *optional* 1 - default 0 |
| cs | effect strength, recommended range from 1 to 5. highest value could break the image | *optional* default 3 |
| q | quality of jpg image | *optional* 0/100 - default 80 |
| p | enable pixelate effect | *optional* 1 - default 0 |
| ps | pixelate strength | *optional* default 5 |

### Quick tips

* Set *q* to 0 for pixel effect, also could be used without *c* enabled
* Set higher value to *cs* could make slow the glith process 
* Make sure that display errrors setting is set to 0

### Sample images

![Glitch php sample](https://raw.githubusercontent.com/marcorubagotti/Glitch-on-the-fly-php/master/samples/example_1.jpg)
![Glitch php sample](https://raw.githubusercontent.com/marcorubagotti/Glitch-on-the-fly-php/master/samples/example_2.jpg)
![Glitch php sample](https://raw.githubusercontent.com/marcorubagotti/Glitch-on-the-fly-php/master/samples/example_3.jpg)
