<?php

/**
 * Задача номер 1.
 * Решается простенькой рекурсией. Альтернативный вариант - императивный,
 * создать массив-карту объектов и итеративно переназначить ссылки на объекты в $next
 * на основе индексов (вариант более многословный).
 *
 */

class test {
    /**
     * @param  string  $name
     */
    public function __construct(public string $name){}

    /**
     * @var test|null
     */
    public test|null $next;
}

$a = new test("A");
$b = new test("B");
$c = new test("C");
$a->next = $b;
$b->next = $c;
$c->next = null;

/**
 * @param  test|null  $current
 * @param  test|null  $prev
 * @return test|null
 */
function reverse(test|null $current, test|null $prev = null): ?test
{
    if ($current === null) {
        return $prev;
    }

    $next = $current->next;

    $current->next = $prev;

    return reverse($next, $current);
}

$ob1 = reverse($a);

var_dump($ob1);