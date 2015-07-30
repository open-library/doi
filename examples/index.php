<?php

    require_once __DIR__ . '/../vendor/autoload.php';

    # create factory - this hold doi.prefix.anything.special/
    # create suffix - this auto-gets a unique id (using UBCGenerator), and puts it onto anything else you have

    $doiFactory = new UBCDOI(1234,5678);

    $doiName = new UBCSuffix(new UBCGenerator(),"brand", "unit", "year");

    $doi = $doiFactory->generate($doiName, "http://ubc.library.ca");

