<?php
$fileName = 'testFile.txt';
$fileArray = file($fileName);

foreach ($fileArray as $eachLine) {
  $eachLine = explode(',',trim($eachLine));

  if(patternChecker($eachLine[0],$eachLine[1])){
    print("Valid Pattern<br>");
  }else{
    print("Invalid pattern<br>");
  };
}

function patternChecker($firstWord,$secondWord){
  // Split the words into an array
  $firstWord = str_split(strtolower($firstWord));
  $secondWord = str_split(strtolower($secondWord));

  // Remove whitespace and quotation marks from the words
  // By filtering characters in the arrays through the
  // removeNonAlphabets callback function
  $firstWord = array_filter($firstWord,'removeNonAlphabets');
  $secondWord = array_filter($secondWord,'removeNonAlphabets');


  // Compare the length of the two words
  // If they are not the same, return false.
  if(count($firstWord) != count($secondWord)){
    return false;
  }
  else{
    // Sort the array containing the words in ascending order
    sort($firstWord);
    sort($secondWord);
    //  If the two words are equal, they match our criteria
    if($firstWord === $secondWord){
      return true;
    }else{
      return false;
    }
  }
}

// The definition of the callback that filters the word
// array and removes and returns non alphabetic characters
// from the array
function removeNonAlphabets($character){
  return (ctype_alpha($character));
}

?>