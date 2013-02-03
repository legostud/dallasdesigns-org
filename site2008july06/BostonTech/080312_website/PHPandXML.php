<?php

// XML file
$xml_file = "Menu2.xml";

// parse it
if (!$doc = xmldocfile($xml_file))
{
     die("Error in XML document");
}

// get the root node
$root = $doc->root();

// get its children
$children = get_children($root);

// element counter
// start with 1 so as to include document element
$elementCount = 1;

// start printing
print_tree($children);

// this recursive function accepts an array of nodes as argument,
// iterates through it and prints a list for each element found
function print_tree($nodeCollection)
{
     global $elementCount;

     // iterate through array
     echo "<ul>";

     for ($x=0; $x<sizeof($nodeCollection); $x++)
     {
          // add to element count
          $elementCount++;
          
          // print element as list item
          echo "<li>" . $nodeCollection[$x]->tagname;

          // go to the next level of the tree
          $nextCollection = get_children($nodeCollection[$x]);

          // recurse!
          print_tree($nextCollection);

     }

     echo "</ul>";
}

// function to return an array of children, given a parent node
function get_children($node)
{
      $temp = $node->children();
      $collection = array();

     // iterate through children array
     for ($x=0; $x<sizeof($temp); $x++)
     {
          // filter out all nodes except elements
          // and create a new array
          if ($temp[$x]->type == XML_ELEMENT_NODE)
          {
               $collection[] = $temp[$x];
          }
     }

     // return array containing child nodes
     return $collection;
}

echo "Total number of elements in document: $elementCount";
?>
