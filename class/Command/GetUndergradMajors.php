<?php
namespace Intern\Command;

use Intern\DataProvider\Major\MajorsProviderFactory;
use Intern\TermFactory;

class GetUndergradMajors {

    public function execute()
    {
        $terms = TermFactory::getAvailableTerms();

        // A bit of a hack regarding the term. There isn't always a single "current" term, so we'll take whatever
        // the first active term is.
        $majorsList = MajorsProviderFactory::getProvider()->getMajors($terms[0]);
        $majorsList = $majorsList->getUndergradMajorsAssoc();

        $majorsList = array('-1' => 'Select Undergraduate Major') + $majorsList;

        echo json_encode($majorsList);
        exit;
    }
}
