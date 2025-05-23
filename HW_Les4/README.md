# Библиотека книг (ООП, PHP)

## Структура

- `src/AbstractBook.php` — абстрактная книга
- `src/DigitalBook.php` — цифровая книга
- `src/PaperBook.php` — бумажная книга
- `app.php` — запуск приложения CLI

## Как запустить

````bash
php app.php

---

# 💡 Как вставлять

- Создай папку проекта, например `book-library`
- В ней сделай подпапку `src`
- Положи туда `AbstractBook.php`, `DigitalBook.php`, `PaperBook.php`
- В корне создай `app.php`
- Потом запускай:
  ```bash
  php app.php
````

Пункт 6:
Первая часть:
class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}

$a1 = new A();
$a2 = new A();
$a1->foo();
$a2->foo();
$a1->foo();
$a2->foo();
Что происходит:

static $x = 0; — переменная $x объявлена как static, значит она одна для всех экземпляров класса A.

Даже если создашь несколько объектов ($a1, $a2), переменная $x будет одна на весь класс A.

Пошагово:

$a1->foo();
$x = 0 → ++$x = 1 → выводит 1

$a2->foo();
$x = 1 → ++$x = 2 → выводит 2

$a1->foo();
$x = 2 → ++$x = 3 → выводит 3

$a2->foo();
$x = 3 → ++$x = 4 → выводит 4

Вывод:
1234

Вторая часть (с наследованием):
class A {
    public function foo() {
        static $x = 0;
        echo ++$x;
    }
}

class B extends A {
}

$a1 = new A();
$b1 = new B();
$a1->foo();
$b1->foo();
$a1->foo();
$b1->foo();
Что изменилось:

Теперь есть два разных класса: A и B.

У каждого класса будет своя отдельная статическая переменная $x (у A своя $x, у B своя $x).

Пошагово:

$a1->foo(); (A)
$x в классе A = 0 → ++$x = 1 → выводит 1

$b1->foo(); (B)
$x в классе B = 0 → ++$x = 1 → выводит 1

$a1->foo(); (A)
$x в классе A = 1 → ++$x = 2 → выводит 2

$b1->foo(); (B)
$x в классе B = 1 → ++$x = 2 → выводит 2

Вывод:
1122

Почему так происходит?
В первом случае (A без наследования) — у всех экземпляров общий $x.

Во втором случае (A и B) — у каждого класса своя собственная копия статической переменной $x.

👉 Это особенность PHP: static переменные привязаны к конкретному классу, а не ко всем наследникам.

Кратко запомнить:
Ситуация                           | Вывод
----------------------------------------------------------------------------
Несколько объектов одного класса   | Одна переменная static
Наследование с разными классами    | Своя static переменная на каждый класс
