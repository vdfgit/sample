<?php

namespace sample;

require_once('Senators.php');

class ContactController {
    private $entries = [];
    private $dataHandler = null;
    private $display = null;

    public function __construct(Display $display, DataHandler $dataHandler) {
        $this->senators = new Senators();
        $this->display = $display;
        $this->dataHandler = $dataHandler;
        $this->populate();
        $this->display->displayResult($this->senators->getEntries());
    }

    public function populate() {
        $this->dataHandler->populate($this->senators);
    }
}