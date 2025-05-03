<?php

namespace Tests\Unit\App\Models\Contracts;

use PHPUnit\Framework\TestCase;
use Illuminate\Database\Eloquent\Model;

abstract class ModelTestCase extends TestCase
{
    abstract protected function model() : Model;

    abstract protected function expectedTableName() : string;

    abstract protected function expectedTraits() : array;

    abstract protected function expectedFillable() : array;

    abstract protected function expectedHidden() : array;

    abstract protected function expectedCasts() : array;

    /**
     * Overwrite this function if model doesn't have an auto incrementing id
     *
     * @return boolean
     */
    protected function expectedIncrementing() : bool
    {
        return true;
    }

    /**
     * Overwrite this function if model primary key is different than int
     *
     * @return string|null
     */
    protected function expectedPrimaryKeyType() : ?string
    {
        return null;
    }

    /*
     * =================================================================================================================
     * Tests
     * =================================================================================================================
     */
    public function testTableName()
    {
        $table = $this->model()->getTable();

        $expectedTable = $this->expectedTableName();

        $this->assertEquals($table, $expectedTable);
    }

    public function testPrimaryKeyType()
    {
        $keyType = $this->model()->keyType;

        $expectedKeyType = $this->expectedPrimaryKeyType();

        $this->assertEquals($keyType, $expectedKeyType);
    }

    public function testTraits()
    {
        $traits = class_uses($this->model());    //Return Traits of class
        $traits = array_keys($traits);

        $expectedTraits = $this->expectedTraits();

        $this->assertEquals($expectedTraits, $traits);
    }

    public function testFillable()
    {
        $fillable = $this->model()->getFillable();

        $expectedFillable = $this->expectedFillable();

        $this->assertEquals($expectedFillable, $fillable);
    }

    public function testHidden()
    {
        $hidden = $this->model()->getHidden();

        $expectedHidden = $this->expectedHidden();

        $this->assertEquals($expectedHidden, $hidden);
    }

    public function testCasts()
    {
        $casts = $this->model()->getCasts();

        $expectedCasts = $this->expectedCasts();

        $this->assertEquals($expectedCasts, $casts);
    }

    public function testIncrementing()
    {
        $incrementing = $this->model()->incrementing;

        $expectedIncrementing = $this->expectedIncrementing();

        $this->assertEquals($expectedIncrementing, $incrementing);
    }

    /*
     * =================================================================================================================
     * Auxiliary Methods
     * =================================================================================================================
     */
    protected function defaultCasts() : array
    {
        return [
            'id' => 'int',
            'created_at' => 'datetime:Y-m-d H:i:s',
            'updated_at' => 'datetime:Y-m-d H:i:s',
        ];
    }
}