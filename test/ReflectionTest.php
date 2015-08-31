<?php

/*
 * This file is part of the FiveLab Reflection package.
 *
 * (c) FiveLab <mail@fivelab.org>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace FiveLab\Component\Reflection;

/**
 * Reflection tests
 *
 * @author Vitaliy Zhuk <v.zhuk@fivelab.org>
 */
class ReflectionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Testing load class reflection from class name
     */
    public function testLoadClassReflectionFromClassName()
    {
        $reflection = Reflection::loadClassReflection('FiveLab\Component\Reflection\ReflectionClassTested');

        $this->assertInstanceOf('ReflectionClass', $reflection);
        $this->assertEquals('FiveLab\Component\Reflection\ReflectionClassTested', $reflection->getName());
    }

    /**
     * Testing load class reflection from object
     */
    public function testLoadClassReflectionFromObject()
    {
        $object = new ReflectionClassTested();
        $reflection = Reflection::loadClassReflection($object);

        $this->assertInstanceOf('ReflectionClass', $reflection);
        $this->assertEquals('FiveLab\Component\Reflection\ReflectionClassTested', $reflection->getName());
    }

    /**
     * Test load class reflection for nonexistent class
     *
     * @expectedException \ReflectionException
     * @expectedExceptionMessage Class NonexistentClass does not exist
     */
    public function testLoadClassReflectionForNonexistentClass()
    {
        Reflection::loadClassReflection('NonexistentClass');
    }

    /**
     * Testing load method from class name and method name
     */
    public function testLoadMethodReflectionFromClassName()
    {
        $reflection = Reflection::loadMethodReflection('FiveLab\Component\Reflection\ReflectionClassTested', 'someMethod');

        $this->assertInstanceOf('ReflectionMethod', $reflection);
        $this->assertEquals('someMethod', $reflection->getName());
        $this->assertEquals('FiveLab\Component\Reflection\ReflectionClassTested', $reflection->getDeclaringClass()->getName());
    }

    /**
     * Testing load method from object and method name
     */
    public function testLoadMethodReflectionFromObject()
    {
        $object = new ReflectionClassTested();
        $reflection = Reflection::loadMethodReflection($object, 'someMethod');

        $this->assertInstanceOf('ReflectionMethod', $reflection);
        $this->assertEquals('someMethod', $reflection->getName());
        $this->assertEquals('FiveLab\Component\Reflection\ReflectionClassTested', $reflection->getDeclaringClass()->getName());
    }

    /**
     * Test load method reflection for nonexistent class
     *
     * @expectedException \ReflectionException
     * @expectedExceptionMessage Class NonexistentClass does not exist
     */
    public function testLoadMethodReflectionForNonexistentClass()
    {
        Reflection::loadMethodReflection('NonexistentClass', 'someMethod');
    }

    /**
     * Test load method reflection for nonexistent method
     *
     * @expectedException \ReflectionException
     * @expectedExceptionMessage Method nonexistentMethod does not exist
     */
    public function testLoadMethodReflectionForNonexistentMethod()
    {
        Reflection::loadMethodReflection('FiveLab\Component\Reflection\ReflectionClassTested', 'nonexistentMethod');
    }
}
