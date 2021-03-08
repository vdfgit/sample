<?php

namespace sample;

/**
 * Command Line Display:  a Concrete implementation of Display Interface
 */
require_once('Display.php');

class CommandLineDisplay implements Display {
    private $name = null;
    private $argv = null;

    public function __construct(String $name, $argv) {
        $this->name = $name;
        $this->argv = $argv;
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