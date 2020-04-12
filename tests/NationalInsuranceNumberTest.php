<?php

namespace UntangleDev\LaravelNinoRule\Tests;

use Illuminate\Support\Facades\Lang;
use PHPUnit\Framework\TestCase;
use UntangleDev\LaravelNinoRule\NationalInsuranceNumber;

class NationalInsuranceNumberTest extends TestCase
{
    /**
     * @test
     * @dataProvider validNationalInsuranceNumbers
     *
     * @param string $value
     */
    public function itPassesAValidNationalInsuranceNumber(string $value)
    {
        $rule = new NationalInsuranceNumber;

        $this->assertTrue($rule->passes('attribute', $value));
    }

    /**
     * @test
     * @dataProvider invalidNationalInsuranceNumbers
     *
     * @param string $value
     */
    public function itFailsAnInvalidNationalInsuranceNumber(string $value)
    {
        $rule = new NationalInsuranceNumber;

        $this->assertFalse($rule->passes('attribute', $value));
    }

    /**
     * @return array
     */
    public function validNationalInsuranceNumbers(): array
    {
        return [
            ['AA 59 96 49'],
            ['BB001122Z'],
            ['CC 11 22 33 Y'],
            ['DD223344X'],
            ['EE 33 44 55 W'],
        ];
    }

    /**
     * @return array
     */
    public function invalidNationalInsuranceNumbers(): array
    {
        return [
            ['AA 59 96 49 1'],
            ['B0001122Z'],
            ['CC 11 BB 33Y'],
            ['DD 22 33 CC X'],
            ['EE 33 44 55 1'],
        ];
    }
}
