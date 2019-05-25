<?php

namespace League\CommonMark\Util;

/**
 * Implement this class to inject the configuration where needed
 */
interface ConfigurationAwareInterface
{
    /**
     * @param ConfigurationInterface $configuration
     */
    public function setConfiguration(ConfigurationInterface $configuration);
}
