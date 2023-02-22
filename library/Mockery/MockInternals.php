<?php
/**
 * Mockery
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://github.com/padraic/mockery/blob/master/LICENSE
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to padraic@php.net so we can send you a copy immediately.
 *
 * @category   Mockery
 * @package    Mockery
 * @license    http://github.com/padraic/mockery/blob/master/LICENSE New BSD License
 */

namespace Mockery;

class MockInternals
{
    private Container $container;
    private int $dynamicExpectationVerifications = 0;
    private bool $hasBeenVerified = false;

    function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function container(): Container
    {
        return $this->container;
    }

    /**
     * Get a count of expectation verifications that happened other than those
     * stored in the expectation directors
     */
    public function dynamicExpectationVerifications(): int
    {
        return $this->dynamicExpectationVerifications;
    }

    /**
     * Spy style verifications happen on the fly, so  we count them here, rather
     * than keeping the directors around for later querying
     */
    public function incrementDynamicExpectationVerifications(): self
    {
        $this->dynamicExpectationVerifications++;

        return $this;
    }

    public function hasBeenVerified(): bool
    {
        return $this->hasBeenVerified;
    }

    public function markAsVerified(): self
    {
        $this->hasBeenVerified = true;

        return $this;
    }
}
