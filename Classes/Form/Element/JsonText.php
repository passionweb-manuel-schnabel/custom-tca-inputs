<?php

namespace Passionweb\CustomTcaInputs\Form\Element;

use TYPO3\CMS\Backend\Form\Element\AbstractFormElement;
use TYPO3\CMS\Core\Utility\GeneralUtility;
use TYPO3\CMS\Core\Utility\StringUtility;

class JsonText extends AbstractFormElement
{
    public function render(): array
    {
        $parameterArray = $this->data['parameterArray'];

        $fieldId = StringUtility::getUniqueId('formengine-textarea-');

        $fieldInformationResult = $this->renderFieldInformation();
        $fieldInformationHtml = $fieldInformationResult['html'];
        $resultArray = $this->mergeChildReturnIntoExistingResult($this->initializeResultArray(), $fieldInformationResult, false);

        $attributes = [
            'id' => $fieldId,
            'name' => htmlspecialchars($parameterArray['itemFormElName']),
            'data-formengine-input-name' => htmlspecialchars($parameterArray['itemFormElName']),
            'rows' => '8',
        ];

        $classes = [
            'form-control',
            't3js-formengine-textarea',
            'formengine-textarea',
        ];
        $attributes['class'] = implode(' ', $classes);

        $text = json_decode($parameterArray['itemFormElValue'], true);

        $content = $text ?? $parameterArray['itemFormElValue'];
        if(is_array($text)){
            $content = '';
            foreach ($text as $key => $value) {
                $content .= $key . ': ' . $value . PHP_EOL;
            }
        }

        $html = [];
        $html[] = '<div class="formengine-field-item t3js-formengine-field-item">';
        $html[] = $fieldInformationHtml;
        $html[] =   '<div class="form-wizards-wrap">';
        $html[] =      '<div class="form-wizards-element">';
        $html[] =         '<div class="form-control-wrap">';
        $html[] =            '<textarea ' . GeneralUtility::implodeAttributes($attributes, true) .'>';
        $html[] =               htmlspecialchars($content, ENT_QUOTES);
        $html[] =            '</textarea>';
        $html[] =         '</div>';
        $html[] =      '</div>';
        $html[] =   '</div>';
        $html[] = '</div>';
        $resultArray['html'] = implode(LF, $html);

        return $resultArray;
    }
}
