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
echo (int)(new \FSM\FSM(new \FSM\OutputHandlers\MOD3OutputHandler()))->evaluate(new MOD3Automation($input));
```
or

## quick unit tests run
```bash
docker compose up
```
