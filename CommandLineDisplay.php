<?php

namespace sample;

/**
 * Command Line Display:  a Concrete implementation of Display Interface
 */
require_once('Display.php');

class CommandLineDisplay implements Display {
    private $name = null;

    public function __construct(String $name) {
        $this->name = $name;
    }

    /**
     * Implemented required method by Display interface
     */
    public function displayResult(array $entries) {
        print("\n" . $this->name . "\n");
        if (count($entries) > 0) {
            foreach ($entries as $i => $entry) {
                print($entry->toJSON() . "\n");
            }
        } else {
            print("No Entries Found!!!\n");
        }
    }
}
