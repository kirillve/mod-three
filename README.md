# mod-three

## TL;DR

modThree test project with some unit tests

include into the project
```bash
composer require kirillve/mod-three
```
run FSM MOD3
```php
echo \modThree('0001');
```
or
```php
echo \ModThree\Facade::modThree('0001');
```
or
```php
$modThree = new \ModThree\ModThree(new \ModThree\Evaluators\FSMMOD3Evaluator(new \FSM\FSM()))
echo $modThree->evaluate('0001');
```

## quick unit tests run
```bash
docker compose up
```
