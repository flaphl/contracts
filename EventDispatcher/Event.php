<?php

/**
 * This file is part of the Flaphl package.
 * 
 * (c) Jade Phyressi <jade@flaphl.com>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Flaphl\Contracts\EventDispatcher;

use Psr\EventDispatcher\StoppableEventInterface as StoppableEvent;

/**
 * Event is the base class for classes containing event data.
 *
 * This class contains no event data. It is used by events that do not pass
 * state information to an event handler when an event is raised.
 * 
 * Call the method stopPropagation() to stop the propagation of further event listeners.
 * 
 * @author Jade Phyressi 
 */
class Event implements StoppableEvent
{
    private bool $propagationStopped = false;

    public function isPropagationStopped(): bool
    {
        return $this->propagationStopped;
    }

    /**
     * Stops the propagation of the event to further event listeners.
     * 
     * If multiple event listeners are connected to the same event, notification
     * will be sent to the remaining event listeners once any event listener
     * calls this method.
     */
    public function stopPropagation(): void
    {
        $this->propagationStopped = true;
    }
}
