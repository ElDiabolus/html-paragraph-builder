<?php
/**
 * @autor Lorenz Pfeifer <info@main-dev.com>
 * Erstellt am: 06.08.2018 15:19
 */

$strData = 'your data';

echo '<textarea style="display: inline-block; width: 100%;">'; echo editText($strData); echo '</textarea>';

function editText($strText)
{
    $boolFirstElement = true;
    $strAusgabe  = '';
    $arrSplitted = preg_split("/((\r?\n)|(\r\n?))/", $strText);
    foreach($arrSplitted as $strLine)
    {
        $strAusgabe .= $this->editLine($strLine, $boolFirstElement);
        $boolFirstElement = false;
    }

    return $strAusgabe;
}

function editLine($strLine, $boolFirstElement)
{
    $strLineCutted = str_replace('	', '', str_replace(' ', '', $strLine));
    if($strLineCutted == '')
    {
        return $strLine;
    }
    else if(substr($strLineCutted, 0, 1) == '<')
    {
        return PHP_EOL. $strLine;
    }
    else
    {
        if($boolFirstElement)
        {
            return '<p>' . $strLine . '</p>';
        }
        else{
            return PHP_EOL . '<p>' . $strLine . '</p>';
        }
    }
}