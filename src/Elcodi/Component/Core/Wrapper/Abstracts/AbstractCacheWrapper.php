<?php

/*
 * This file is part of the Elcodi package.
 *
 * Copyright (c) 2014 Elcodi.com
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * Feel free to edit as you please, and have fun.
 *
 * @author Marc Morera <yuhu@mmoreram.com>
 * @author Aldo Chiecchia <zimage@tiscali.it>
 */

namespace Elcodi\Component\Core\Wrapper\Abstracts;

use Doctrine\Common\Cache\CacheProvider;

use Elcodi\Component\Core\Encoder\Interfaces\EncoderInterface;

/**
 * Abstract caching wrapper
 *
 * This abstract class provides an easy way of mapping loaded data
 * Is just a wrapper, so every cache manager will have to extend this.
 */
abstract class AbstractCacheWrapper
{
    /**
     * @var CacheProvider
     *
     * Cache provider instance
     */
    protected $cache;

    /**
     * @var EncoderInterface
     *
     * Encoder
     */
    protected $encoder;

    /**
     * Set Cache
     *
     * @param CacheProvider $cache Cache
     *
     * @return $this self Object
     */
    public function setCache(CacheProvider $cache)
    {
        $this->cache = $cache;

        return $this;
    }

    /**
     * Set encoder
     *
     * @param EncoderInterface $encoder Encoder
     *
     * @return $this self Object
     */
    public function setEncoder(EncoderInterface $encoder)
    {
        $this->encoder = $encoder;

        return $this;
    }
}
