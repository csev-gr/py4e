<?php include("top.php"); ?>
<?php include("nav.php"); ?>
<h1>
    Ξεκινώντας με την Python σε Macintosh
</h1>
<p>
    Η Python 2 και η Python 3 είναι ήδη εγκατεστημένες στο λειτουργικό σύστημα Macintosh OS/X, οπότε το μόνο που χρειάζεται να 
    προσθέσετε είναι ένας συντάκτης κειμένου προγραμματιστή.
</p>
<b>Εγκατάσταση του Συντάκτης Κειμένου Προγραμματισμού</b>
<p>
    Εάν έχετε ήδη εγκατεστημένο κάποιον επεξεργαστή κειμένου προγραμματισμού, όπως τον 
    <a href="https://code.visualstudio.com/" target="_blank">VS-Code</a>, μπορείτε να τον χρησιμοποιήσετε ή 
    διαφορετικά μπορείτε να τον εγκαταστήσετε.
</p>
<p>
   Εάν η εγκατάσταση το VSCode σας φαίνεται κάπως περίπλοκη, προτείνουμε τη χρήση του δωρεάν και ανοιχτού κώδικα
   επεξεργαστή κειμένου <a href="https://brackets.io/" target="_blank">Brackets</a>. Η εγκατάστασή του είναι απλή
   και θα καλύψει τις ανάγκες σας, στα πλαίσια του μαθήματος.
</p>

<h1>Γράφοντας ένα πρόγραμμα Python 3 σε Macintosh</h1>
<p>
    Έχουμε ένα σύντομο 
    <a href="https://www.youtube.com/watch?v=9lOdVSNUKfY" target="_blank">
    βίντεο βήμα προς βήμα</a> που δείχνει πώς να εγκαταστήσετε την Python 3 και το Atom και να γράψετε το πρώτο σας πρόγραμμα.
</p>
<h1>Έναρξη Τερματικού σε Macintosh OS/X</h1>
<p>
    Το πρόγραμμα Terminal στα Macintosh είναι κάπως θαμμένο κάτω από ή <b>Macintosh HD -> Applications -> Utilities -> Terminal</b>
</p>   
<p>
    Υπάρχουν πολλές συντομεύσεις που μπορεί να σας φανούν χρήσιμες. Μπορείτε να μεταβείτε επάνω δεξιά στην οθόνη σας και να κάνετε
    κλικ στο κουμπί αναζήτησης Spotlight και να πληκτρολογήσετε <b>terminal</b> και μπορείτε να εκτελέσετε τερματικό από την 
    αναδυόμενη λίστα στοιχείων.
<p>
    Μπορείτε να κάνετε το Terminal να παραμείνει στο dock σας, μόλις ξεκινήσει το τερματικό κάντε κλικ και κρατήστε πατημένο το εικονίδιο
    του τερματικού στο dock και, στη συνέχεια, επιλέγοντας "Keep in Dock". Στη συνέχεια, μπορείτε να ξεκινήσετε γρήγορα το Terminal 
    κάνοντας κλικ στο εικονίδιο στο dock.
</p>

<h1>Που Βρίσκεστε?</h1>
<p>
    Όταν ξεκινά η γραμμή εντολών, βρίσκεστε στον "αρχικό" κατάλογο.
    Σε καθένα από αυτά τα παραδείγματα, θα πρέπει να εμφανίζεται ο συνδεδεμένος λογαριασμός σας αντί του csev.
</p>    
<pre>
    Macintosh Home Directory: 		/Users/csev
</pre>
<p>
    Η γραμμή γραμμής εντολών περιλαμβάνει συνήθως κάποια ένδειξη για το πού βρίσκεστε στη δομή φακέλου του σκληρού σας δίσκου. 
    Αν θέλετε πραγματικά να καταλάβετε πού βρίσκεστε, στο Macintosh χρησιμοποιήστε την εντολή <b>pwd</b>.
</p>
<pre>
    udhcp-macvpn-624:~ csev$ pwd
    /Users/csev
    udhcp-macvpn-624:~ csev$ 
</pre>

<h1>Πού μπορείτε να πάτε;</h1>
<p>
    Γενικά το πρώτο πράγμα που πρέπει να κάνετε όταν ανοίγετε μια διεπαφή γραμμής εντολών είναι να μεταβείτε στο σωστό φάκελο. 
    Πείτε ότι θέλετε να εκτελέσετε ένα αρχείο από την επιφάνεια εργασίας σας. Η εντολή είναι 
    <b>cd Desktop</b> 
</p>    
<pre>
    udhcp-macvpn-624:~ csev$ pwd
    /Users/csev
    udhcp-macvpn-624:~ csev$ cd Desktop
    udhcp-macvpn-624:Desktop csev$ pwd
    /Users/csev/Desktop
    udhcp-macvpn-624:Desktop csev$
</pre>
<p> 
    <b>Έξυπνο Κόλπο:</b> Στην εντολή cd, μπορείτε να πληκτρολογήσετε μερικώς ένα όνομα φακέλου, όπως Desktop, και στη συνέχεια 
    να πατήσετε το πλήκτρο TAB και το σύστημα θα συμπληρώσει αυτόματα το όνομα του φακέλου, εάν έχετε πληκτρολογήσει αρκετά ώστε το 
    σύστημα να μπορεί να μαντέψει με ακρίβεια τι σκοπεύατε να πληκτρολογήσετε.
</p>
<p>Πηγαίνοντας Προς τα Πίσω (ή Προς τα Επάνω)</p>
<p>
    Μπορείτε να αλλάξετε τον τρέχον κατάλογο στον γονικό φάκελο (ο φάκελος "πάνω" από τον φάκελο στον οποίο βρίσκεστε)
    χρησιμοποιώντας την εντολή <b>cd ..</b>. Σημαίνει απλώς "ανέβα έναν".
</p>    
<pre>
    udhcp-macvpn-624:Desktop csev$ pwd
    /Users/csev/Desktop
    udhcp-macvpn-624:Desktop csev$ cd ..
    udhcp-macvpn-624:~ csev$ pwd
    /Users/csev
    udhcp-macvpn-624:~ csev$ 
</pre>
<p>Αν χαθείτε...</p>
<p>
    Εάν δεν μπορείτε να καταλάβετε σε ποιο φάκελο βρίσκεστε και/ή δεν μπορείτε να καταλάβετε πώς να φτάσετε 
    στον φάκελο στον οποίο θέλετε να φτάσετε - απλώς κλείστε και ανοίξτε ξανά το παράθυρο Γραμμή εντολών/Τερματικό.
    Θα επιστρέψετε στον "αρχικό" κατάλογο - έτσι θα μπορέσετε να ξεκινήσετε από μια γνωστή τοποθεσία.
</p>     
<p><b>Τι αρχεία/φάκελοι υπάρχουν εδώ;</b></p> 
<p>Μπορείτε να εμφανίσετε τα περιεχόμενα του τρέχοντος καταλόγου χρησιμοποιώντας την εντολή <b>ls -l</b>.</p>
<pre>
    udhcp-macvpn-624:Desktop csev$ pwd
    /Users/csev/Desktop
    udhcp-macvpn-624:Desktop csev$ ls -l 
    total 8
    -rw-r--r--  1 csev  staff   15 Sep 16 15:17 hello.py
    udhcp-macvpn-624:Desktop csev$ 
</pre>
<h1>Εκτέλεση της Python στο Terminal</h1>
<p>
   Ξεκινήστε το πρόγραμμα Terminal, μεταβείτε στον κατάλληλο κατάλογο και πληκτρολογήστε την ακόλουθη εντολή:
</p>     
<pre>
    python3 hello.py
</pre>
<p>
    Αυτό φορτώνει τον διερμηνέα Python 3 και εκτελεί το <b>firstprog.py</b>, εμφανίζοντας την έξοδο του 
    προγράμματος και/ή τα σφάλματα στο παράθυρο του τερματικού.
<p>
    Μερικές Καλές Συμβουλές για το Τερματικό των Macintosh
</p>     
<p>
    Μπορείτε να μετακινηθείτε πίσω στις προηγούμενες εντολές πατώντας τα βέλη πάνω και κάτω και να εκτελέσετε 
    ξανά τις εντολές χρησιμοποιώντας το πλήκτρο enter. Αυτό μπορεί να εξοικονομήσει πολύ χρόνο πληκτρολόγησης.
</p>
<p>
    Εάν σας αρέσει να κρατάτε την οθόνη σας καθαρή, μπορείτε να διαγράψετε το buffer κύλισης προς τα πίσω πατώντας 
    ταυτόχρονα το πλήκτρο Command και το πλήκτρο K.
</p>
<?php include('footer.php');?>
