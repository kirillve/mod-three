# mod-three

## TL;DR
modThree test project with some unit tests
quick unit tests run
```bash
git clone https://github.com/kirillve/mod-three.git
cd mod-three
docker compose up
```

## System Requirements
- docker 20 and higher
- docker-compose 2.x (in case of using docker without baked-in docker-compose plugin)

## How to use
### include into the project

### How to use FSM MOD3
```php
echo \modThree('0001');
```

### Using directly via FSM
```php
echo (int)(new \FSM\FSM(new \FSM\OutputHandlers\MOD3OutputHandler()))->evaluate(new MOD3Automation($input));
```

### Using directly via ModThree

```php
$modThree = new \ModThree\ModThree(
    new \ModThree\Evaluators\FSMMOD3Evaluator(
        new FSM\FSM(
            new \FSM\OutputHandlers\MOD3OutputHandler()
        )
    )
);
echo $modThree->evaluate('0001');
```
