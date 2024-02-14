# mod-three

## TL;DR
modThree test project with some unit tests
quick unit tests run
```bash
docker compose up
```

## How to use
### include into the project
```bash
composer require kirillve/mod-three
```

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
