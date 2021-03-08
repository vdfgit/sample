<?php
namespace sample;

class Senators extends Entries {
    public function addEntry(Entry $entry) {
        $this->entries[] = $entry;
    }
}
