<?php

namespace Passionweb\CustomTcaInputs\Hooks;

use TYPO3\CMS\Core\DataHandling\DataHandler;

class DataHandlerHook
{
    public function processDatamap_preProcessFieldArray(array &$fieldArray, string $table, $id, DataHandler $pObj): void
    {
        if($table === 'tx_customtcainputs_domain_model_sample' && !empty($fieldArray['json_text'])) {
            // requires that the content of the RTE field retains the specified structure
            // otherwise it is difficult to convert RTE inputs to valid JSON
            $singleLines = explode("\r\n", $fieldArray['json_text']);
            $keyValues = [];
            foreach ($singleLines as $singleLine) {
                $keyValue = explode(':', $singleLine);
                if(count($keyValue) === 2) {
                    $keyValues[trim($keyValue[0])] = trim($keyValue[1]);
                }
            }
            $fieldArray['json_text'] = json_encode($keyValues);
        }
    }
}
