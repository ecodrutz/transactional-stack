<p align="center">
<a href="https://travis-ci.org/ecodrutz/transactional-stack"><img src="https://travis-ci.org/ecodrutz/transactional-stack.svg" alt="Build Status"></a>
</p>

## Module for a transactional stack
### Usage for simple stack
```
<?php
...
use Stack\Stack;
...
$stack = new Stack();
$stack->push('my value');
$stack->peek(); // my value
$stack->pop(); // my value
```

### Usage for transactional stack

```
<?php
...
use Stack\TransactionalStack;
...
$stack = new TransactionalStack();
$stack->push('my value');
$stack->peek(); // my value
$stack->pop(); // my value
$stack->start(); // new transaction started
$stack->push('my value');
$stack->push('my new value');
$stack->pop(); // my new value
// end and confirm the transaction
$stack->commit();
$stack->peek(); // my value
$stack->start();
$stack->push('another value');
// end and rollback the transaction
$stack->rollback();
$stack->peek(); // my value
```

Feel free to submit improvements!
Thanks.
