<?php

namespace sample;

abstract class Entries {
    protected $entries = [];

    public function __construct() {
        $this->entries = [];
    }

    public function getEntries(): array
    {
        return $this->entries;
    }

    public abstract function addEntry(Entry $entry);
}
