<?php include("top.php"); ?>
<?php include("nav.php"); ?>
<h1>
Χρήση της Python στην PythonAnywhere
</h1>
<p>
Η PythonAnywhere</a>
(<a href="https://www.pythonanywhere.com" target="_blank">www.pythonanywhere.com</a>)
είναι μια δωρεάν online υπηρεσία που σας δίνει τη δυνατότητα να αναπτύξετε και να εκτελεσετε
προγράμματα Python μέσω του φυλλομετρητή ιστού. Είναι ένα πλήρως εξοπλισμένο περιβάλλον
Linux με έναν επςξεργαστή κειμένου που βασίζεται στο πρόγραμμα περιήγησης, με επισήμανση
σύνταξης. Για να χρησιμοποιήσετε την Pythonanywhere για αυτήν την τάξη - το μόνο που χρειάζεστε
για την εγγραφή και την εκτέλεση κώδικα Python είναι ένα πρόγραμμα περιήγησης ιστού. 
Δεν υπάρχει απολύτως τίποτα για εγκατάσταση.
</p>
<p>
Αυτό σημαίνει ότι μπορείτε να κάνετε αυτό το μάθημα σε έναα περιβάλλον "κλειδωμένο" σε
συστήματα όπως το iPad της Apple, το iPhone, το Android, το ChromeBooks ή το Windows 10 
Home S. Μπορείτε επίσης να χρησιμοποιήσετε την PythonAnywhere εάν χρησιμοποιείτε υπολογιστή
εργασίας ή σχολείου όπου δεν επιτρέπεται η εγκατάσταση λογισμικού.</p>
<h2>Εγγραφείτε για λογαριασμό</h2>
<p>
Θα χρειαστεί να εγγραφείτε για έναν λογαριασμό για να χρησιμοποιήσετε την PythonAnywhere.
Έχουν ένα δωρεάν επίπεδο που μπορεί να καλύψει όλες τις ανάγκες σας για αυτό το μάθημα 
μέχρι και το Κεφαλαίο 15.
</p>
<p>
H PythonAnywhere έχει δεσμευτεί να σας επιτρέπει τη χρήση δωρεάν λογαριασμού για πάντα,
αρκεί να συνεχίσετε να συνδέεστε και τον επεκτήνετε. Έχουν χαμηλού κόστους παροχές, εάν θέλετε περισσότερο
χώρο στο δίσκο ή υπολογιστική ισχύ για τα έργα σας ή περισσότερη ευελιξία ή δυνατότητες. Αλλά να είστε
σίγουροι ότι το δωρεάν πρόγραμμα τους είναι αρκετό για αυτό το μάθημα.
</p>
<h2>Γράφοντας το πρώτο σας πρόγραμμα στην PythonAnywhere</h2>
<p>
Μόλις συνδεθείτε στην PythonAnywhere, μεταβείτε στην καρτέλα αρχεία και δημιουργήστε ένα νέο αρχείο με το όνομα
<b>hello.py</b> στον αρχικό σας φάκελο (πρέπει να είναι κάτι σαν <b>/home/drchuck</b>). Βάλτε την ακόλουθη γραμμή 
  στο αρχείο:</p>
<pre>
print('Hello world')
</pre>
Αποθηκεύστε το αρχείο και πατήστε <b>Run</b>, θα πρέπει να δείτε:
<pre>
Hello world
&gt;&gt;&gt;
</pre>
<p>Στη συνέχεια, αλλάξτε το κείμενο σε "Hello PY4E world", πατήστε <b>Save</b> και έπειτα πατήστε <b>Run</b>, θα
πρέπει να εκτελέσει το τροποποιημένο σας πρόγραμμα.
</p>
<p>
Ενώ το κουμπί <b> Run </b> λειτουργεί για προγράμματα που είναι λίγες γραμμές, μόλις ξεκινήσετε να εργάζεστε σε
πιο πολύπλοκα προγράμματα θα χρειαστεί να χρησιμοποιήσετε ένα περιβάλλον Linux (γραμμή εντολών). Μπορεί να σας φανεί
λίγο περίεργο στην αρχή, αλλά η εκμάθηση βασικών στοιχείων του Linux είναι μια εξαιρετική ιδέα καθώς είναι το
κυρίαρχο σύστημα που χρησιμοποιείται για διακομιστές.
</p>
<h2>Χρησιμοποιώντας το περιβάλλον Shell στην PythonAnywhere</h2>
<p>
Αυτό λειτουργεί καλύτερα εάν μπορείτε να έχετε δύο καρτέλες ανοιχτές ταυτόχρονα στο πρόγραμμα περιήγησης.
Μια καρτέλα πρέπει να εμφανίζει το περιεχόμενο της επιλογής <b>Files</b> και μια άλλη το περιεχόμενο της επιλογής 
<b>Consoles</b>.</p>
<pre>
14:12 ~ $
</pre>
Αυτή είναι η γραμμή εντολών Linux. Ας τρέξουμε το πρόγραμμα 'hello.py' από τη γραμμή εντολών:
<pre>
14:12 ~ $ cd
14:14 ~ $ pwd
/home/drchuck
14:15 ~ $ ls -l
-rw-rw-r--  1 drchuck registered_users   27 Mar 29 14:15 hello.py
14:16 ~ $ python3 hello.py
Hello PY4E world
14:16 ~ $
</pre>
Να τι κάνουν οι εντολές:
<ul>
<li><b>cd</b> - Αλλαγή καταλόγου στον αρχικό μου φάκελο - το κάνουμε αυτό για να βεβαιωθούμε ότι 
ξεκινάμε στο σωστό μέρος στην ιεραρχία φακέλων.</li>
<li><b>pwd</b> -Εκτύπωση καταλόγου εργασίας - αυτή η εντολή σας λέει πού βρίσκεστε στην ιεραρχία
φακέλων. Βρισκόμαστε στον αρχικό μας φάκελο. Το Linux είναι ένα σύστημα πολλαπλών χρηστών και κάθε
χρήστης έχει τον δικό του «αρχικό» κατάλογο. Μπορείτε να δημιουργήσετε υποφακέλους κάτω από τον 
αρχικό φάκελο σας.</li>
<li><b>ls -l</b> παραθέστε τα αρχεία και τους υποφακέλους στον τρέχοντα φάκελο. Η επιλογή <b>-l</b>
εμφανίζει λεπτομέρειες όπως δικαιώματα, ημερομηνία τροποποίησης και μέγεθος αρχείου.</li>
<li><b>python3 hello.py</b> εκτελεί την Python στο αρχείο σας</li>
</ul>
<p>Σας συνιστούμε να αρχίσετε να χρησιμοποιείτε το κέλυφος Linux bash για να τρέξετε τον κώδικά σας 
από την αρχή, επειδή τελικά θα χρειαστεί να χρησιμοποιήσετε το bash για να εκτελέσετε πιο πολύπλοκα
προγράμματα.</p>
<h2>Μερικές Καλές Συμβουλές για την κονσόλα bash</h2>
<p>
Μπορείτε να μετακινηθείτε προς τα πίσω στις προηγούμενες εντολές πατώντας τα βέλη πάνω και κάτω και
να εκτελέσετε ξανά τις προηγούμενες εντολές χρησιμοποιώντας το πλήκτρο Enter. Αυτό μπορεί να σας 
εξοικονομήσει πολύ χρόνο πληκτρολόγησης. Αν σας αρέσει να διατηρείτε την οθόνη σας καθαρή, μπορείτε 
να διαγράψετε το buffer κύλισης προς τα πίσω πατώντας ταυτόχρονα το <b>Command key</b> και το πλήκτρο
  <b>K</b> (σε Mac υπολογιστές).</p>

<h2>Επεξεργασία αρχείων στην PythonAnywhere</h2>
<p>
Υπάρχουν τρεις τρόποι για να επεξεργαστείτε αρχεία στο περιβάλλον σας PythonAnywhere, που κυμαίνονται από τον
ευκολότερο έως το πιο προχωρημένο. Αρκεί να επεξεργαστείτε το αρχείο με έναν από αυτούς τους τρόπους.</p>
<ol>
<li>
Μεταβείτε στον κύριο πίνακα ελέγχου PythonAnywhere, περιηγηθείτε σε αρχεία, μεταβείτε στο σωστό φάκελο κάντε edit το αρχείο.
</li><li>
Ή στη γραμμή εντολών:
<pre>
cd ~
nano hello.py
</pre>
Αποθηκεύστε το αρχείο πατώντας <b>CTRL-X</b>, <b>Y</b> και Enter.
</li><li>
Μην δοκιμάσετε αυτόν τον πιο δύσκολο και πιο προχωρημένο τρόπο για να επεξεργαστείτε αρχεία στο Linux χωρίς βοήθεια,
αν είναι η πρώτη σας φορά με τον επεξεργαστή κειμένου <b>vi</b>.
<pre>
cd ~
vi hello.py
</pre>
Μόλις ανοίξετε το <b>vi</b>, πάντε το δρομέα προς τα κάτω, στο σημείο που θέλετε να κάνετε κάποια αλλαγή και 
πατήστε το πλήκτρο <b>i</b> για να μεταβείτε στη λειτουργία 'INSERT (ΕΙΣΑΓΩΓΗ)' και, στη συνέχεια, πληκτρολογήστε
το νέο σας κείμενο και πατήστε το πλήκτρο <b>esc</b> όταν τελειώσετε. Για να αποθηκεύσετε το αρχείο, πληκτρολογήστε
<b>:wq</b> ακολουθούμενο από <b>enter</b>. Εάν χαθείτε πατήστε <b>esc</b> <b>:q!</b> και στη συνέχεια <b>enter</b> 
για να βγείτε από το αρχείο χωρίς αποθήκευση.
</li>
</ol>
<p>Εάν γνωρίζετε ήδη κάποιον _άλλον_ επεξεργαστή κειμένου της γραμμής εντολών, μπορείτε να τον χρησιμοποιήσετε για να
επεξεργαστείτε αρχεία. Σε γενικές γραμμές, θα διαπιστώσετε ότι είναι συχνά πιο γρήγορο και ευκολότερο να κάνετε μικρές 
επεξεργασίες σε αρχεία στη γραμμή εντολών και όχι στη διεπαφή χρήστη πλήρους οθόνης. Και μόλις αρχίσετε να αναπτύσσετε 
πραγματικές εφαρμογές σε περιβάλλοντα παραγωγής όπως το Google, η Amazon, η Microsoft κλπ... το μόνο που θα χρειάζεστε
είναι η γραμμή εντολών.</p>

<?php include('footer.php');?>
