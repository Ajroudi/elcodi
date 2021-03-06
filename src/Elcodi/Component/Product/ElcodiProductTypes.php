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

namespace Elcodi\Component\Product;

/**
 * Class ElcodiProductTypes
 */
final class ElcodiProductTypes
{
    /**
     * @var integer
     *
     * Physical product type
     */
    const TYPE_PRODUCT_PHYSICAL = 0;

    /**
     * @var integer
     *
     * Virtual product type
     */
    const TYPE_PRODUCT_VIRTUAL = 1;

    /**
     * @var integer
     *
     * Downloadable product type
     */
    const TYPE_PRODUCT_DOWNLOAD = 2;
}
