<?php
use \Tsugi\Core\LTIX;
use \Tsugi\UI\Output;

$pos_head_start = strpos($HTML,'<head');
$pos_head_start = strpos($HTML,'<',$pos_head_start+1);
$pos_head_end = strpos($HTML,'</head',$pos_head_start);
$pos_body = strpos($HTML,'<body',$pos_head_end);
$pos_body = strpos($HTML,'<',$pos_body+1);
$pos_end = strpos($HTML,'</body',$pos_body);
$head = substr($HTML, $pos_head_start, $pos_head_end-$pos_head_start);
$body = substr($HTML, $pos_body, $pos_end-$pos_body);
require_once "top.php";
require_once "nav.php";

function x_sel($file) {
    global $HTML_FILE;
    $retval = 'value="'.$file.'"';
    if ( strpos($HTML_FILE, $file) === 0 ) {
        $retval .= " selected";
    }
    return $retval;
}

?>
<script>
function onSelect() {
    console.log($('#chapters').val());
    window.location = $('#chapters').val();
}
</script>    
<div style="float:right">
<select id="chapters" onchange="onSelect();">
  <option <?= x_sel("01-intro") ?>>Κεφάλαιο 1: Εισαγωγή</option>
  <option <?= x_sel("02-variables") ?>>Κεφάλαιο 2: Μεταβλητές</option>
  <option <?= x_sel("03-conditional") ?>>Κεφάλαιο 3: Συνθήκες</option>
  <option <?= x_sel("04-functions") ?>>Κεφάλαιο 4: Συναρτήσεις</option>
  <option <?= x_sel("05-iterations") ?>>Κεφάλαιο 5: Επαναλήψεις</option>
  <option <?= x_sel("06-strings") ?>>Κεφάλαιο 6: Strings - Συμβολοσειρές</option>
  <option <?= x_sel("07-files") ?>>Κεφάλαιο 7: Αρχεία</option>
  <option <?= x_sel("08-lists") ?>>Κεφάλαιο 8: Λίστες</option>
  <option <?= x_sel("09-dictionaries") ?>>Κεφάλαιο 9: Λεξικά - Dictionaries</option>
  <option <?= x_sel("10-tuples") ?>>Κεφάλαιο 10: Πλειάδες - Tuples</option>
  <option <?= x_sel("11-regex") ?>>Κεφάλαιο 11: Σύντομες Εκφράσεις - Regex</option>
  <option <?= x_sel("12-network") ?>>Κεφάλαιο 12: Δικτυακά Προγράμματα</option>
  <option <?= x_sel("13-web") ?>>Κεφάλαιο 13: Python και Υπηρεσίες Ιστού</option>
  <option <?= x_sel("14-objects") ?>>Κεφάλαιο 14: Αντικείμενα στην Python </option>
  <option <?= x_sel("15-database") ?>>Κεφάλαιο 15: Python και Βάσεις Δεδομένων</option>
  <option <?= x_sel("16-viz") ?>>Κεφάλαιο 16: Οπτικοποίηση Δεδομένων</option>
</select>
</div>

<?php
echo($body);

$OUTPUT->footerStart();
?>
<hr/>
<p>
Αν εντοπίσετε κάποιο λάθος σε αυτό το βιβλίο μην διστάσετε να μου στείλετε τη διόρθωση στο
<a href="https://github.com/csev-gr/py4e/tree/master/book3" target="_blank">Github</a>.
</p>

<script>
function onSelectFooter() {
    console.log($('#chapters_footer').val());
    window.location = $('#chapters_footer').val();
}
</script>
<div style="float:right">
<select id="chapters_footer" onchange="onSelectFooter();">
  <option <?= x_sel("01-intro") ?>>Chapter 1: Introduction</option>
  <option <?= x_sel("02-variables") ?>>Chapter 2: Variables</option>
  <option <?= x_sel("03-conditional") ?>>Chapter 3: Conditionals</option>
  <option <?= x_sel("04-functions") ?>>Chapter 4: Functions</option>
  <option <?= x_sel("05-iterations") ?>>Chapter 5: Iterations</option>
  <option <?= x_sel("06-strings") ?>>Chapter 6: Strings</option>
  <option <?= x_sel("07-files") ?>>Chapter 7: Files</option>
  <option <?= x_sel("08-lists") ?>>Chapter 8: Lists</option>
  <option <?= x_sel("09-dictionaries") ?>>Chapter 9: Dictionaries</option>
  <option <?= x_sel("10-tuples") ?>>Chapter 10: Tuples</option>
  <option <?= x_sel("11-regex") ?>>Chapter 11: Regex</option>
  <option <?= x_sel("12-network") ?>>Chapter 12: Networked Programs</option>
  <option <?= x_sel("13-web") ?>>Chapter 13: Python and Web Services</option>
  <option <?= x_sel("14-objects") ?>>Chapter 14: Python Objects</option>
  <option <?= x_sel("15-database") ?>>Chapter 15: Python and Databases</option>
  <option <?= x_sel("16-viz") ?>>Chapter 16: Data Vizualization</option>
</select>
</div>

<?php

$OUTPUT->footerEnd();
