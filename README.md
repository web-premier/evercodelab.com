# Green Coding Godzilla Bird main site

Also known as [evercodelab.com](http://evercodelab.com).

[![SensioLabsInsight](https://insight.sensiolabs.com/projects/cc9289a9-bfe3-4380-91ae-17180b44b557/big.png)](https://insight.sensiolabs.com/projects/cc9289a9-bfe3-4380-91ae-17180b44b557)

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

## Tests

```
phpunit -v -c app/
```

## Deploy

```
cap deploy
cap deploy:migrations
```
