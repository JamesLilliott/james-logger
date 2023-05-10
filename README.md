# James Logger
A packager to learn how to build a PSR3 logger.

### Usage
```php
$logLocation = 'log.txt';
$logger = new JamesLogger(
    new FileWriter($logLocation)
);

$logger->info('I am an info Log'); // Or any other PSR3 Log type
```

### Test
```bash
composer test
```

### Check
```bash
composer stan 
```
