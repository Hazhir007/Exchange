<?php


namespace App\Domain\Currency;


interface CurrencyInterface
{
    public function setName(string $name);

    public function getName(): string;

    public function setScale(int $scale);

    public function getScale(): string;

    public function setCode(string $code);

    public function getCode(): string;

    public function sameAs(Currency $otherCurrency): bool;
}
