<?php


namespace App\Http\Filters;


use Illuminate\Database\Eloquent\Builder;

abstract class AbstractFilter implements FilterInterface
{
    /** @var array */
    //Массив тех самых гет параметров, ?category_id=3
    private $queryParams = [];

    /**
     * AbstractFilter constructor.
     *
     * @param array $queryParams
     */
    //На основании данного класса создаем объект с проинициализированными квери параметрами
    //Сами квери параметры идут из контроллера
    public function __construct(array $queryParams)
    {
        $this->queryParams = $queryParams;
    }

    //Возвращает массив коллбеков под каждый возможный квери параметр1
    abstract protected function getCallbacks(): array;

    //Перебираем этот массив колбеков и ищем соответствие
    public function apply(Builder $builder)
    {
        $this->before($builder);

        foreach ($this->getCallbacks() as $name => $callback) {
            //Елси пришел title передаем это в PostFilter.php
            if (isset($this->queryParams[$name])) {
                call_user_func($callback, $builder, $this->queryParams[$name]);
            }
        }
    }

    /**
     * @param Builder $builder
     */
    protected function before(Builder $builder)
    {
    }

    /**
     * @param string $key
     * @param mixed|null $default
     *
     * @return mixed|null
     */
    protected function getQueryParam(string $key, $default = null)
    {
        return $this->queryParams[$key] ?? $default;
    }

    /**
     * @param string[] $keys
     *
     * @return AbstractFilter
     */
    protected function removeQueryParam(string ...$keys)
    {
        foreach ($keys as $key) {
            unset($this->queryParams[$key]);
        }

        return $this;
    }
}
