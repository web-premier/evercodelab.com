# Green Coding Godzilla Bird main site

Also known as [evercodelab.com](http://evercodelab.com).

## Setup

```
git clone git@github.com:EvercodeLab/evercodelab.git
bin/setup # tested on OS X
```

## Usefull

```
bin/update # will pull, install composer deps and run migrations
bin/start # will bin/update and run local server
bin/start --no-update # will run local server
bin/check_cs fix # will ensure compliance with coding standards
```

## Deploy

```
cap deploy
cap deploy:migrations
```