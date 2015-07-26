<?php

/*
 * This file is part of the league/commonmark package.
 *
 * (c) Colin O'Dell <colinodell@gmail.com>
 *
 * Original code based on the CommonMark JS reference parser (http://bitly.com/commonmark-js)
 *  - (c) John MacFarlane
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace League\CommonMark\Block\Element;

use League\CommonMark\Inline\Element\AbstractInline;
use League\CommonMark\Util\ArrayCollection;

abstract class AbstractInlineContainer extends AbstractBlock
{

    public function hasChildren()
    {
        return false;
    }

    public function getChildren()
    {
        return [];
    }

    /**
     * @return ArrayCollection|AbstractInline[]
     */
    public function getInlines()
    {
        $children = [];
        for($current = $this->firstChild;null !== $current;$current = $current->next) {
            $children[] = $current;
        }

        return $children;
    }

    /**
     * @param ArrayCollection|AbstractInline[] $inlines
     *
     * @return $this
     */
    public function setInlines($inlines)
    {
        if (!is_array($inlines) && !(is_object($inlines) && $inlines instanceof ArrayCollection)) {
            throw new \InvalidArgumentException(sprintf('Expect iterable, got %s', get_class($inlines)));
        }

        $this->unlinkChildren();
        foreach ($inlines as $inline) {
            $this->appendChild($inline);
        }

        return $this;
    }
}
