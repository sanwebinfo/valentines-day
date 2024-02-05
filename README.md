# Valentine's Day 💜  

Happy Valentine's Day Terminal Style Wish image ❤️ Impress your Partner ❤️  

Free Online Valentine's Day Card Maker - Valentine' Day Greeting image Generator with Name.  

> Linux Terminal Style valentines day wish - Built using PHP 💗  

![valentines-day-14028337](https://github.com/sanwebinfo/valentines-day/assets/10300271/acf69a23-2952-4997-9e69-527d80259d24)

## Built using

- PHP
- Bulma CSS
- `html2canvas` for convert HTML Content to image
- `Imagick` for OG image Generation

## usage

- Clone or download this repo

```sh
git clone https://github.com/sanwebinfo/valentines-day
cd valentines-day

## Start local server
php -S localhost:6003
```

- Open New Terminal Window with Project Location
- Generate Terminal Style Greeting image

```sh

## Set Execute Permission
chmod a+x cli

## run this on your terminal
php cli

or 

./cli

```

- Enter your Partner name and get the Greeting Page URL
- you can also Create a Greeting image from webpage too

```sh
## Open URL in webpage
http://localhost:6003/

## Enter your Partner Name in Form and Click Button to Generate the Greeting image
http://localhost:6003/?name=partnername

```

- **it supports English Letters, Numbers and Selected Symbols**
- Done

## OG image

- if you wanna an OG image then use it like this

```sh
http://localhost:6003/og/?title=partnername
```

- it require `php-imagick` and `imagemagick` Packages

```sh

## install both packages
sudo apt install imagemagick
sudo apt-get install php-imagick
```

![love-sanweb-info-GId1GAhbzR](https://github.com/sanwebinfo/valentines-day/assets/10300271/d58daa21-0285-4772-a130-7e4a73bf9548)

## SEO Friendly URL

- **nginx** SEO Friendly URL

```sh
location / {
try_files $uri $uri/ =404 @rewriteurl;
  #try_files $uri $uri/ /index.php?$args;
}

location @rewriteurl {
    rewrite ^/(.*)$ /?name=$1;
}
```

- **`https://example.com/?name=partnername` to `https://example.com/partnername`**

## Free Deploy 😍

- Deploy it on Vercel

[![Deploy with Vercel](https://vercel.com/button)](https://vercel.com/new/clone?repository-url=https%3A%2F%2Fgithub.com%2Fsanwebinfo%2Fvalentines-day)

```sh
https://example.vercel.app/?name=partnername
```

- you can also host it on your server - just upload the `index.php` file

## LICENESE

MIT
