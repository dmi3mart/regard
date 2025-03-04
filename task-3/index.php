<?php

/**
 * Задача номер 3
 * Здесь позволил себе обернуть входные данные в простой DTO,
 * а расчёт максимального количества рейсов положил в
 * гипотетический класс Courier.
 *
 */
class Data {
    public function __construct(public array $boxes, public int $weight){}
}

class Courier {

    /**
     * @param  Data  $data
     * @return int
     *
     * В реализации использован вариант с указателями
     * на индекс $a и $b, по которым мы складываем веса пары посылок
     * и сравниваем с $data->weight, в результате двигая указатели в одну
     * или другую сторону.
     *
     * Такой вариант хоть и явно императивен, но читается луше, чем
     * нагромождения с array_map и прочими функциями или коллекциями Laravel
     */
    public function getMaxFlights(Data $data): int
    {
        $flights = 0;

        /**
         * Исходим из того, что больше разрешённого weight
         * посылки курьер не берёт вообще, т.к. в задаче не указано иное.
         * Так же пропускаем посылки, которые не укладываются в 
         * условие (2 посылки строго равные weight)
         * В реальной работе можно проверять входные данные на уровне DTO
         * или валидации в сервисе.
         * Валидация этих входных данных важна, как минимум, чтобы отсечь
         * non-numeric значения и значения вне разрешенного диапазона.
         */
        $boxes = array_filter($data->boxes, fn($i) => $i <= $data->weight);
        $weight = $data->weight;

        sort($boxes);

        $a = 0;
        $b = count($boxes) - 1;

        while ($a < $b) {
            $sum = $boxes[$a] + $boxes[$b];

            if ($sum == $weight) {
                $flights++;
                $a++;
                $b--;
            } elseif ($sum < $weight) {
                $a++;
            } else {
                $b--;
            }
        }

        return $flights;
    }
}

$set1 = new Data(
    boxes: [1, 2, 1, 5, 1, 3, 5, 2, 5, 5],
    weight: 6
);

$set2 = new Data(
    boxes: [2,4,3,6,1],
    weight: 5
);

$courier = new Courier;

var_dump($courier->getMaxFlights($set1));
var_dump($courier->getMaxFlights($set2));



