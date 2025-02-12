<?php if ( file_exists("../booktop.php") ) {
  require_once "../booktop.php";
  ob_start();
}?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="" xml:lang="">
<head>
  <meta charset="utf-8" />
  <meta name="generator" content="pandoc" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes" />
  <title>Untitled</title>
  <style type="text/css">
      code{white-space: pre-wrap;}
      span.smallcaps{font-variant: small-caps;}
      span.underline{text-decoration: underline;}
      div.column{display: inline-block; vertical-align: top; width: 50%;}
  </style>
</head>
<body>
<h1 id="δικτυακά-προγράμματα">Δικτυακά προγράμματα</h1>
<p>Ενώ πολλά από τα παραδείγματα αυτού του βιβλίου έχουν επικεντρωθεί στην ανάγνωση αρχείων και στην αναζήτηση δεδομένων σε αυτά τα αρχεία, υπάρχουν πολλές διαφορετικές πηγές πληροφοριών, αν λάβουμε υπόψιν μας και το Διαδίκτυο.</p>
<p>Σε αυτό το κεφάλαιο θα προσποιηθούμε ότι είμαστε ένα πρόγραμμα περιήγησης ιστού και θα ανακτήσουμε ιστοσελίδες, χρησιμοποιώντας το πρωτόκολλο μεταφοράς υπερκειμένου (HTTP). Στη συνέχεια θα διαβάσουμε τα δεδομένα της ιστοσελίδας και θα τα αναλύσουμε.</p>
<h2 id="πρωτόκολλο-μεταφοράς-υπερκειμένου---http">Πρωτόκολλο μεταφοράς υπερκειμένου - HTTP</h2>
<p>Το πρωτόκολλο δικτύου, που κινεί τον Ιστό, είναι στην πραγματικότητα πολύ απλό και υπάρχει ενσωματωμένη υποστήριξη στην Python, που ονομάζεται <code>socket</code>, η οποία καθιστά πολύ εύκολη τη δημιουργία συνδέσεων δικτύου και την ανάκτηση δεδομένων μέσω αυτών των υποδοχών σε ένα πρόγραμμα Python.</p>
<p>Μια <em>υποδοχή</em> μοιάζει πολύ με ένα αρχείο, εκτός από το ότι μια μεμονωμένη υποδοχή παρέχει αμφίδρομη σύνδεση μεταξύ δύο προγραμμάτων. Μπορείτε να διαβάζετε και να γράφετε στην ίδια υποδοχή. Εάν γράψετε κάτι σε μια υποδοχή, αποστέλλεται στην εφαρμογή στο άλλο άκρο της υποδοχής. Εάν διαβάζετε από την υποδοχή, σας δίνονται τα δεδομένα που έχει στείλει η άλλη εφαρμογή.</p>
<p>Αλλά αν προσπαθήσετε να διαβάσετε μια υποδοχή όταν το πρόγραμμα στην άλλη άκρη της υποδοχής δεν έχει στείλει δεδομένα, απλά κάθεστε και περιμένετε. Εάν τα προγράμματα και στα δύο άκρα της υποδοχής απλώς περιμένουν κάποια δεδομένα χωρίς να στείλουν τίποτα, θα περιμένουν για πολύ μεγάλο χρονικό διάστημα, επομένως ένα σημαντικό μέρος των προγραμμάτων που επικοινωνούν μέσω Διαδικτύου είναι να έχουν κάποιο είδος πρωτοκόλλου.</p>
<p>Ένα πρωτόκολλο είναι ένα σύνολο από ακριβείς κανόνες που καθορίζουν ποιος θα ξεκινήσει πρώτος, τι πρέπει να κάνουν και, στη συνέχεια, ποιες είναι οι απαντήσεις σε αυτό το μήνυμα και ποιος στέλνει στη συνέχεια και ούτω καθεξής. Κατά μία έννοια, οι δύο εφαρμογές σε κάθε άκρο της υποδοχής χορεύουν και φροντίζουν να μην πατούν η μία στα δάχτυλα των ποδιών της άλλης.</p>
<p>Υπάρχουν πολλά έγγραφα που περιγράφουν αυτά τα πρωτόκολλα δικτύου. Το πρωτόκολλο μεταφοράς υπερκειμένου περιγράφεται στο ακόλουθο έγγραφο:</p>
<p><a href="https://www.w3.org/Protocols/rfc2616/rfc2616.txt" class="uri">https://www.w3.org/Protocols/rfc2616/rfc2616.txt</a></p>
<p>Αυτό είναι ένα μεγάλο και περίπλοκο έγγραφο 176 σελίδων με πολλές λεπτομέρειες. Αν το βρίσκετε ενδιαφέρον, μη διστάσετε να το διαβάσετε όλο. Αλλά αν ρίξετε μια ματιά στη σελίδα 36 του RFC2616, θα βρείτε τη σύνταξη για το αίτημα GET. Για να ζητήσουμε ένα έγγραφο από έναν διακομιστή web, κάνουμε μια σύνδεση με τον διακομιστή <code>www.pr4e.org</code> στη θύρα 80 και, στη συνέχεια, στέλνουμε μια γραμμή της μορφής</p>
<p><code>GET http://data.pr4e.org/romeo.txt HTTP/1.0</code></p>
<p>όπου η δεύτερη παράμετρος είναι η ιστοσελίδα που ζητάμε και στη συνέχεια στέλνουμε και μια κενή γραμμή. Ο διακομιστής ιστού θα απαντήσει με ορισμένες πληροφορίες κεφαλίδας για το έγγραφο και μια κενή γραμμή ακολουθούμενη από το περιεχόμενο του εγγράφου.</p>
<h2 id="το-απλούστερο-πρόγραμμα-περιήγησης-ιστού-στον-κόσμο">Το απλούστερο πρόγραμμα περιήγησης ιστού στον κόσμο</h2>
<p>Ίσως ο ευκολότερος τρόπος για να σας δείξω πώς λειτουργεί το πρωτόκολλο HTTP είναι να γράψουμε ένα πολύ απλό πρόγραμμα Python, που πραγματοποιεί μια σύνδεση με έναν διακομιστή ιστού και ακολουθώντας τους κανόνες του πρωτοκόλλου HTTP ζητά ένα έγγραφο και εμφανίζει αυτό που του στέλνει ο διακομιστής.</p>
<pre class="python"><code>import socket

mysock = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
mysock.connect((&#39;data.pr4e.org&#39;, 80))
cmd = &#39;GET http://data.pr4e.org/romeo.txt HTTP/1.0\r\n\r\n&#39;.encode()
mysock.send(cmd)

while True:
    data = mysock.recv(512)
    if len(data) &lt; 1:
        break
    print(data.decode(),end=&#39;&#39;)

mysock.close()

# Code: http://www.py4e.com/code3/socket1.py</code></pre>
<p>Πρώτα το πρόγραμμα κάνει μια σύνδεση στη θύρα 80 του διακομιστή <a href="http://www.py4e.com">www.py4e.com</a>. Δεδομένου ότι το πρόγραμμά μας παίζει το ρόλο του “περιηγητή Ιστού”, το πρωτόκολλο HTTP λέει ότι πρέπει να στείλουμε την εντολή GET ακολουθούμενη από μια κενή γραμμή. Το <code>\r\n</code> σημαίνει EOL (τέλος γραμμής), οπότε το <code>\r\n\r\n</code> σημαίνει τίποτα ανάμεσα σε δύο ακολουθίες EOL. Αυτό είναι το ισοδύναμο μιας κενή γραμμής.</p>
<figure>
<img src="../images/socket.svg" alt="Μια σύνδεση Υποδοχής - Socket" style="height: 2.0in;"/>
<figcaption>
Μια σύνδεση Υποδοχής - Socket
</figcaption>
</figure>
<p>Μόλις στείλουμε αυτήν την κενή γραμμή, γράφουμε έναν βρόχο που λαμβάνει δεδομένα σε κομμάτια 512 χαρακτήρων από την υποδοχή και εκτυπώνει τα δεδομένα, μέχρι να μην υπάρχουν άλλα δεδομένα για ανάγνωση (δηλαδή, η recv() επιστρέφει μια κενή συμβολοσειρά).</p>
<p>Το πρόγραμμα παράγει την ακόλουθη έξοδο:</p>
<pre class="{text}"><code>HTTP/1.1 200 OK
Date: Wed, 11 Apr 2018 18:52:55 GMT
Server: Apache/2.4.7 (Ubuntu)
Last-Modified: Sat, 13 May 2017 11:22:22 GMT
ETag: &quot;a7-54f6609245537&quot;
Accept-Ranges: bytes
Content-Length: 167
Cache-Control: max-age=0, no-cache, no-store, must-revalidate
Pragma: no-cache
Expires: Wed, 11 Jan 1984 05:00:00 GMT
Connection: close
Content-Type: text/plain

But soft what light through yonder window breaks
It is the east and Juliet is the sun
Arise fair sun and kill the envious moon
Who is already sick and pale with grief</code></pre>
<p>Η έξοδος ξεκινά με κεφαλίδες που στέλνει ο διακομιστής ιστού, για να περιγράψει το έγγραφο. Για παράδειγμα, η κεφαλίδα <code>Content-Type</code> υποδεικνύει ότι το έγγραφο είναι έγγραφο απλού κειμένου (<code>text/plain</code>).</p>
<p>Αφού ο διακομιστής μας στείλει τις κεφαλίδες, προσθέτει μια κενή γραμμή, για να υποδείξει το τέλος των κεφαλίδων και, στη συνέχεια, στέλνει τα πραγματικά δεδομένα του αρχείου <em>romeo.txt</em>.</p>
<p>Αυτό το παράδειγμα δείχνει πώς να κάνετε μια σύνδεση δικτύου χαμηλού επιπέδου με υποδοχές. Οι υποδοχές μπορούν να χρησιμοποιηθούν για την επικοινωνία με έναν διακομιστή ιστού ή με έναν διακομιστή αλληλογραφίας ή και με πολλά άλλα είδη διακομιστών. Το μόνο που χρειάζεται είναι να βρείτε το έγγραφο που περιγράφει το πρωτόκολλο και να γράψετε τον κώδικα για να στείλετε και να λάβετε τα δεδομένα σύμφωνα με το πρωτόκολλο αυτό.</p>
<p>Ωστόσο, δεδομένου ότι το πρωτόκολλο που χρησιμοποιούμε πιο συχνά είναι το πρωτόκολλο ιστού HTTP, η Python έχει μια ειδική βιβλιοθήκη, ειδικά σχεδιασμένη ώστε να υποστηρίζει το πρωτόκολλο HTTP για την ανάκτηση εγγράφων και δεδομένων μέσω του ιστού.</p>
<p>Μία από τις απαιτήσεις για τη χρήση του πρωτοκόλλου HTTP είναι η ανάγκη αποστολής και λήψης των δεδομένων ως αντικείμενα bytes, αντί των συμβολοσειρών. Στο προηγούμενο παράδειγμα, οι μέθοδοι <code>encode()</code> και <code>decode()</code> μετατρέπουν τις συμβολοσειρές σε αντικείμενα bytes και το αντίστροφο.</p>
<p>Το επόμενο παράδειγμα χρησιμοποιεί τη σημείωση <code>b''</code> για να καθορίσει ότι μια μεταβλητή θα πρέπει να αποθηκευτεί ως αντικείμενο bytes. Το <code>encode()</code> και το <code>b''</code> είναι ισοδύναμα.</p>
<pre class="{text}"><code>&gt;&gt;&gt; b&#39;Hello world&#39;
b&#39;Hello world&#39;
&gt;&gt;&gt; &#39;Hello world&#39;.encode()
b&#39;Hello world&#39;</code></pre>
<h2 id="ανάκτηση-μιας-εικόνας-μέσω-http">Ανάκτηση μιας εικόνας μέσω HTTP</h2>
<p>  </p>
<p>Στο παραπάνω παράδειγμα, ανακτήσαμε ένα απλό αρχείο κειμένου, που είχε νέες γραμμές στο αρχείο και απλώς αντιγράψαμε τα δεδομένα στην οθόνη, καθώς το πρόγραμμα εκτελούνταν. Μπορούμε να χρησιμοποιήσουμε ένα παρόμοιο πρόγραμμα για να ανακτήσουμε μια εικόνα, χρησιμοποιώντας το HTTP. Αντί να αντιγράψουμε τα δεδομένα στην οθόνη, καθώς εκτελείται το πρόγραμμα, συγκεντρώνουμε τα δεδομένα σε μια συμβολοσειρά, κόβουμε τις κεφαλίδες και, στη συνέχεια, αποθηκεύουμε τα δεδομένα εικόνας σε ένα αρχείο ως εξής:</p>
<pre class="python"><code>import socket
import time

HOST = &#39;data.pr4e.org&#39;
PORT = 80
mysock = socket.socket(socket.AF_INET, socket.SOCK_STREAM)
mysock.connect((HOST, PORT))
mysock.sendall(b&#39;GET http://data.pr4e.org/cover3.jpg HTTP/1.0\r\n\r\n&#39;)
count = 0
picture = b&quot;&quot;

while True:
    data = mysock.recv(5120)
    if len(data) &lt; 1: break
    #time.sleep(0.25)
    count = count + len(data)
    print(len(data), count)
    picture = picture + data

mysock.close()

# Αναζήτησε το τέλος της κεφαλίδας (2 CRLF)
pos = picture.find(b&quot;\r\n\r\n&quot;)
print(&#39;Header length&#39;, pos)
print(picture[:pos].decode())

# Προσπέρασε την κεφαλίδα και αποθήκευσε τα δεδομένα της εικόνας
picture = picture[pos+4:]
fhand = open(&quot;stuff.jpg&quot;, &quot;wb&quot;)
fhand.write(picture)
fhand.close()

# Code: http://www.py4e.com/code3/urljpeg.py</code></pre>
<p>Όταν το πρόγραμμα εκτελείται, παράγει την ακόλουθη έξοδο:</p>
<pre class="{text}"><code>$ python urljpeg.py
5120 5120
5120 10240
4240 14480
5120 19600
...
5120 214000
3200 217200
5120 222320
5120 227440
3167 230607
Header length 393
HTTP/1.1 200 OK
Date: Wed, 11 Apr 2018 18:54:09 GMT
Server: Apache/2.4.7 (Ubuntu)
Last-Modified: Mon, 15 May 2017 12:27:40 GMT
ETag: &quot;38342-54f8f2e5b6277&quot;
Accept-Ranges: bytes
Content-Length: 230210
Vary: Accept-Encoding
Cache-Control: max-age=0, no-cache, no-store, must-revalidate
Pragma: no-cache
Expires: Wed, 11 Jan 1984 05:00:00 GMT
Connection: close
Content-Type: image/jpeg</code></pre>
<p>Μπορείτε να δείτε ότι για αυτήν τη διεύθυνση url, η κεφαλίδα <code>Content-Type</code> υποδεικνύει ότι το σώμα του εγγράφου είναι μια εικόνα (<code>image/jpeg</code>). Μόλις το πρόγραμμα ολοκληρωθεί, μπορείτε να προβάλετε τα δεδομένα της εικόνας ανοίγοντας το αρχείο <code>stuff.jpg</code> σε ένα πρόγραμμα προβολής εικόνων.</p>
<p>Καθώς εκτελείται το πρόγραμμα, μπορείτε να δείτε ότι δεν λαμβάνουμε 5120 χαρακτήρες, κάθε φορά που καλούμε τη μέθοδο <code>recv()</code>. τη στιγμή που καλούμε <code>recv()</code> λαμβάνουμε όσους χαρακτήρες έχουν μεταφερθεί από τον διακομιστή ιστού, μέσω του δικτύου σε εμάς. Σε αυτό το παράδειγμα με κάθε μας αίτημα, λαμβάνουμε από μόλις 3200 χαρακτήρες έως και 5120 χαρακτήρες δεδομένων.</p>
<p>Τα αποτελέσματά σας μπορεί να διαφέρουν ανάλογα με την ταχύτητα του δικτύου σας. Σημειώστε επίσης ότι στην τελευταία κλήση στο <code>recv()</code> λαμβάνουμε 3167 byte, που είναι το τέλος της ροής, και στην επόμενη κλήση στο <code>recv()</code> λαμβάνουμε μια συμβολοσειρά μηδενικού μήκους, που μας ενημερώνει ότι ο διακομιστής έχει καλέσει την <code>close()</code> στο δικό του άκρο της υποδοχής πράγμα που σημαίνει ότι δεν υπάρχουν άλλα δεδομένα.</p>
<p> </p>
<p>Μπορούμε να επιβραδύνουμε τις διαδοχικές μας κλήσεις της <code>recv()</code> αφαιρώντας το σχολιασμό από την κλήση της <code>time.sleep()</code>. Με αυτόν τον τρόπο, περιμένουμε ένα τέταρτο του δευτερολέπτου μετά από κάθε κλήση, ώστε ο διακομιστής να μπορεί να μας “προλάβει” και να μας στείλει περισσότερα δεδομένα πριν καλέσουμε ξανά τη <code>recv()</code>. Προσθέτοντας την καθυστέρηση αυτή, το πρόγραμμα εκτελείται ως εξής:</p>
<pre class="{text}"><code>$ python urljpeg.py
5120 5120
5120 10240
5120 15360
...
5120 225280
5120 230400
207 230607
Header length 393
HTTP/1.1 200 OK
Date: Wed, 11 Apr 2018 21:42:08 GMT
Server: Apache/2.4.7 (Ubuntu)
Last-Modified: Mon, 15 May 2017 12:27:40 GMT
ETag: &quot;38342-54f8f2e5b6277&quot;
Accept-Ranges: bytes
Content-Length: 230210
Vary: Accept-Encoding
Cache-Control: max-age=0, no-cache, no-store, must-revalidate
Pragma: no-cache
Expires: Wed, 11 Jan 1984 05:00:00 GMT
Connection: close
Content-Type: image/jpeg</code></pre>
<p>Τώρα, εκτός από την πρώτη και την τελευταία κλήση στο <code>recv()</code>, λαμβάνουμε πλέον 5120 χαρακτήρες, κάθε φορά που ζητάμε νέα δεδομένα.</p>
<p>Υπάρχει ένα buffer μεταξύ του διακομιστή που κάνει αιτήματα <code>send()</code> και της εφαρμογής μας που κάνει το αιτήματα <code>recv()</code>. Όταν εκτελούμε το πρόγραμμα με ενεργοποιημένη την καθυστέρηση, κάποια στιγμή ο διακομιστής μπορεί να γεμίσει το buffer στην υποδοχή και να αναγκαστεί να σταματήσει μέχρι το πρόγραμμά μας να αρχίσει να αδειάζει το buffer. Η παύση είτε της εφαρμογής αποστολής είτε της εφαρμογής λήψης ονομάζεται “έλεγχος ροής”.</p>
<p> </p>
<h2 id="ανάκτηση-ιστοσελίδων-με-την-urllib">Ανάκτηση ιστοσελίδων με την <code>urllib</code></h2>
<p>Ενώ μπορούμε να στείλουμε και να λάβουμε με μη αυτόματο τρόπο δεδομένα μέσω HTTP, χρησιμοποιώντας τη βιβλιοθήκη socket, υπάρχει ένας πολύ απλούστερος τρόπος για να εκτελέσετε αυτήν την κοινή εργασία στην Python, χρησιμοποιώντας τη βιβλιοθήκη <code>urllib</code>.</p>
<p>Χρησιμοποιώντας το <code>urllib</code>, μπορείτε να μεταχειριστείτε μια ιστοσελίδα σαν αρχείο. Απλώς υποδεικνύετε ποια ιστοσελίδα θέλετε να ανακτήσετε και το <code>urllib</code> χειρίζεται όλα τα στοιχεία του πρωτοκόλλου HTTP και της κεφαλίδας.</p>
<p>Ο ισοδύναμος κώδικας για την ανάγνωση του αρχείου <em>romeo.txt</em> από τον ιστό, χρησιμοποιώντας το <code>urllib</code> είναι ο εξής:</p>
<pre class="python"><code>import urllib.request

fhand = urllib.request.urlopen(&#39;http://data.pr4e.org/romeo.txt&#39;)
for line in fhand:
    print(line.decode().strip())

# Code: http://www.py4e.com/code3/urllib1.py</code></pre>
<p>Μόλις ανοίξει η ιστοσελίδα με το <code>urllib.request.urlopen</code>, μπορούμε να την αντιμετωπίσουμε σαν αρχείο και να την διαβάσουμε χρησιμοποιώντας έναν βρόχο <code>for</code>.</p>
<p>Όταν εκτελείται το πρόγραμμα, βλέπουμε μόνο την έξοδο των περιεχομένων του αρχείου. Οι κεφαλίδες εξακολουθούν να αποστέλλονται, αλλά ο κωδικός <code>urllib</code> δεσμέβει τις κεφαλίδες και επιστρέφει μόνο τα δεδομένα σε εμάς.</p>
<pre class="{text}"><code>But soft what light through yonder window breaks
It is the east and Juliet is the sun
Arise fair sun and kill the envious moon
Who is already sick and pale with grief</code></pre>
<p>Για παράδειγμα, μπορούμε να γράψουμε ένα πρόγραμμα για να ανακτήσουμε τα δεδομένα για το «romeo.txt» και να υπολογίσουμε τη συχνότητα κάθε λέξης στο αρχείο ως εξής:</p>
<pre class="python"><code>import urllib.request, urllib.parse, urllib.error

fhand = urllib.request.urlopen(&#39;http://data.pr4e.org/romeo.txt&#39;)

πλήθη = dict()
for γραμμή in fhand:
    λέξεις = γραμμή.decode().split()
    for λέξη in λέξεις:
        πλήθη[λέξη] = πλήθη.get(λέξη, 0) + 1
print(πλήθη)

# Code: http://www.py4e.com/code3/urlwords.py</code></pre>
<p>Και πάλι, μόλις ανοίξουμε την ιστοσελίδα, μπορούμε να τη διαβάσουμε σαν τοπικό αρχείο.</p>
<h2 id="ανάγνωση-δυαδικών-αρχείων-χρησιμοποιώντας-το-urllib">Ανάγνωση δυαδικών αρχείων χρησιμοποιώντας το <code>urllib</code></h2>
<p>Μερικές φορές θέλετε να ανακτήσετε ένα αρχείο μη-κειμένου (ή δυαδικό), όπως ένα αρχείο εικόνας ή βίντεο. Τα δεδομένα σε αυτά τα αρχεία γενικά δεν έχουν νόημα να εκτυπωθούν, αλλά με τη βοήθειά τους και χρησιμοποιώντας το <code>urllib</code> μπορείτε εύκολα να δημιουργήσετε ένα αντίγραφο μιας διεύθυνσης URL σε ένα τοπικό αρχείο, στον σκληρό σας δίσκο.</p>
<p> </p>
<p>Το μοτίβο είναι να ανοίξετε τη διεύθυνση URL και να χρησιμοποιήσετε το <code>read</code> για να κατεβάσετε ολόκληρο το περιεχόμενο του εγγράφου, σε μια μεταβλητή συμβολοσειράς (<code>img</code>) και στη συνέχεια να γράψετε αυτές τις πληροφορίες σε ένα τοπικό αρχείο ως εξής:</p>
<pre class="python"><code>import urllib.request, urllib.parse, urllib.error

img = urllib.request.urlopen(&#39;http://data.pr4e.org/cover3.jpg&#39;).read()
fhand = open(&#39;cover3.jpg&#39;, &#39;wb&#39;)
fhand.write(img)
fhand.close()

# Code: http://www.py4e.com/code3/curl1.py</code></pre>
<p>Αυτό το πρόγραμμα διαβάζει όλα τα δεδομένα ταυτόχρονα, μέσω του δικτύου, και τα αποθηκεύει στη μεταβλητή <code>img</code>, στην κύρια μνήμη του υπολογιστή σας, στη συνέχεια ανοίγει το αρχείο <code>cover3.jpg</code> και εγγράφει τα δεδομένα στο δίσκο σας. Το όρισμα <code>wb</code>, στο <code>open()</code>, ανοίγει ένα δυαδικό αρχείο μόνο για εγγραφή. Αυτό το πρόγραμμα θα λειτουργήσει μόν εάν το μέγεθος του αρχείου είναι μικρότερο από το μέγεθος της μνήμης του υπολογιστή σας.</p>
<p>Ωστόσο, εάν πρόκειται για μεγάλο αρχείο ήχου ή βίντεο, αυτό το πρόγραμμα ενδέχεται να διακοπεί ή τουλάχιστον να εκτελείται εξαιρετικά αργά όταν η μνήμη του υπολογιστή σας εξαντληθεί. Προκειμένου να αποφευχθεί η εξάντληση της μνήμης, ανακτούμε τα δεδομένα σε μπλοκ (ή buffers) και στη συνέχεια γράφουμε κάθε μπλοκ στον δίσκο μας, πριν ανακτήσουμε το επόμενο μπλοκ. Με αυτόν τον τρόπο το πρόγραμμα μπορεί να διαβάσει αρχεία οποιουδήποτε μεγέθους χωρίς να χρησιμοποιεί όλη τη μνήμη που έχει ο υπολογιστή σας.</p>
<pre class="python"><code>import urllib.request, urllib.parse, urllib.error

img = urllib.request.urlopen(&#39;http://data.pr4e.org/cover3.jpg&#39;)
fhand = open(&#39;cover3.jpg&#39;, &#39;wb&#39;)
size = 0
while True:
    info = img.read(100000)
    if len(info) &lt; 1: break
    size = size + len(info)
    fhand.write(info)

print(size, &#39;χαρακτήρες αντιγράφηκαν.&#39;)
fhand.close()

# Code: http://www.py4e.com/code3/curl2.py</code></pre>
<p>Σε αυτό το παράδειγμα, διαβάζουμε μόνο 100.000 χαρακτήρες κάθε φορά και στη συνέχεια γράφουμε αυτούς τους χαρακτήρες στο αρχείο <code>cover3.jpg</code>, πριν ανακτήσουμε τους επόμενους 100.000 χαρακτήρες δεδομένων από τον ιστό.</p>
<p>Αυτό το πρόγραμμα εκτελείται ως εξής:</p>
<pre class="{text}"><code>python curl2.py
230210 χαρακτήρες αντιγράφηκαν.</code></pre>
<h2 id="ανάλυση-html-και-web-scraping-ιστοσυγκομιδή">Ανάλυση HTML και web scraping (ιστοσυγκομιδή)</h2>
<p>  </p>
<p>Μία από τις κοινές χρήσεις της δυνατότητας <code>urllib</code> στην Python είναι η <em>ιστοσυγκομιδή (web scraping)</em>. Η ιστοσυγκομιδή είναι όταν γράφουμε ένα πρόγραμμα που προσποιείται ότι είναι πρόγραμμα περιήγησης ιστού, ανακτά σελίδες και, στη συνέχεια, εξετάζει τα δεδομένα σε αυτές τις σελίδες αναζητώντας μοτίβα.</p>
<p>Για παράδειγμα, μια μηχανή αναζήτησης, όπως η Google θα εξετάσει την πηγή μιας ιστοσελίδας, θα εξαγάγει τους συνδέσμους προς άλλες σελίδες και θα ανακτήσει αυτές τις σελίδες, θα εξάγει συνδέσμους και ούτω καθεξής. Χρησιμοποιώντας αυτήν την τεχνική, το Google <em>ανιχνεύει</em>, περνάει, σχεδόν από όλες τις σελίδες του ιστού.</p>
<p>Η Google χρησιμοποιεί επίσης τη συχνότητα των συνδέσμων, από σελίδες που βρίσκει προς μια συγκεκριμένη σελίδα, ως μέτρο του πόσο “σημαντική” είναι μια σελίδα και πόσο ψηλά πρέπει να εμφανίζεται η σελίδα αυτή στα αποτελέσματα αναζήτησής της.</p>
<h2 id="ανάλυση-html-χρησιμοποιώντας-κανονικές-εκφράσεις">Ανάλυση HTML χρησιμοποιώντας κανονικές εκφράσεις</h2>
<p>Ένας απλός τρόπος ανάλυσης HTML είναι η χρήση κανονικών εκφράσεων για επανειλημμένη αναζήτηση και εξαγωγή υποσυμβολοσειρών που ταιριάζουν με ένα συγκεκριμένο μοτίβο.</p>
<p>Εδώ είναι μια απλή ιστοσελίδα:</p>
<pre class="html"><code>&lt;h1&gt;The First Page&lt;/h1&gt;
&lt;p&gt;
If you like, you can switch to the
&lt;a href=&quot;http://www.dr-chuck.com/page2.htm&quot;&gt;
Second Page&lt;/a&gt;.
&lt;/p&gt;</code></pre>
<p>Μπορούμε να κατασκευάσουμε μια καλοσχηματισμένη κανονική έκφραση, για να ταιριάξουμε και να εξαγάγουμε τους συνδέσμου; από το παραπάνω κείμενο ως εξής:</p>
<pre class="{text}"><code>href=&quot;http[s]?://.+?&quot;</code></pre>
<p>Η κανονική έκφρασή μας αναζητά συμβολοσειρές που ξεκινούν με <em>href="http://</em> ή <em>href="https://</em>, ακολουθούμενες από έναν ή περισσότερους χαρακτήρες (<code>.+?</code>), ακολουθούμενες από ένα άλλο διπλό εισαγωγικό . Το ερωτηματικό πίσω από το <code>[s]?</code> υποδηλώνει αναζήτηση για τη συμβολοσειρά “http” ακολουθούμενη από κανένα ή ένα “s”.</p>
<p>Το ερωτηματικό που προστέθηκε στο <code>.+?</code> υποδηλώνει ότι το ταίριασμα πρέπει να γίνει με “μη άπληστο” τρόπο και όχι με “άπληστο”. Ένα μη άπληστο ταίριασμα προσπαθεί να βρει τη <em>μικρότερη</em> δυνατή συμβολοσειρά που ταιριάζει και ένα άπληστο ταίριασμα προσπαθεί να βρει τη <em>μεγαλύτερη</em> δυνατή συμβολοσειρά.</p>
<p> </p>
<p>Προσθέτουμε παρενθέσεις στην κανονική μας έκφραση για να υποδείξουμε ποιο τμήμα της αντιστοιχισμένης συμβολοσειράς θα θέλαμε να εξαγάγουμε και παράγουμε το ακόλουθο πρόγραμμα:</p>
<p> </p>
<pre class="python"><code># Αναζήτηση συνδέσμων εντός του URL εισόδου
import urllib.request, urllib.parse, urllib.error
import re
import ssl

# Αγνόηση των σφαλμάτων πιστοποιητικού SSL
ctx = ssl.create_default_context()
ctx.check_hostname = False
ctx.verify_mode = ssl.CERT_NONE

url = input(&#39;Εισάγεται - &#39;)
html = urllib.request.urlopen(url, context=ctx).read()
links = re.findall(b&#39;href=&quot;(http[s]?://.*?)&quot;&#39;, html)
for link in links:
    print(link.decode())

# Code: http://www.py4e.com/code3/urlregex.py</code></pre>
<p>Η βιβλιοθήκη <code>ssl</code> επιτρέπει σε αυτό το πρόγραμμα να έχει πρόσβαση σε ιστότοπους που επιβάλλουν αυστηρά το HTTPS. Η μέθοδος <code>read</code> επιστρέφει τον πηγαίο κώδικα HTML ως αντικείμενο bytes αντί να επιστρέφει ένα αντικείμενο HTTPResponse. Η μέθοδος κανονικής έκφρασης <code>findall</code> θα μας δώσει μια λίστα με όλες τις συμβολοσειρές που ταιριάζουν με την κανονική μας έκφραση, επιστρέφοντας μόνο το κείμενο σύνδεσης μεταξύ των διπλών εισαγωγικών.</p>
<p>Όταν εκτελούμε το πρόγραμμα και εισάγουμε μια διεύθυνση URL, έχουμε την ακόλουθη έξοδο:</p>
<pre class="{text}"><code>Εισάγετε - https://docs.python.org
https://docs.python.org/3/index.html
https://www.python.org/
https://docs.python.org/3.8/
https://docs.python.org/3.7/
https://docs.python.org/3.5/
https://docs.python.org/2.7/
https://www.python.org/doc/versions/
https://www.python.org/dev/peps/
https://wiki.python.org/moin/BeginnersGuide
https://wiki.python.org/moin/PythonBooks
https://www.python.org/doc/av/
https://www.python.org/
https://www.python.org/psf/donations/
http://sphinx.pocoo.org/</code></pre>
<p>Οι κανονικές εκφράσεις λειτουργούν πολύ καλά όταν το HTML σας είναι καλά μορφοποιημένο και προβλέψιμο. Αλλά επειδή υπάρχουν πολλές “σπασμένες” σελίδες HTML εκεί έξω, μια λύση που χρησιμοποιεί μόνο κανονικές εκφράσεις μπορεί είτε να χάσει ορισμένους έγκυρους συνδέσμους είτε να καταλήξει με κατεστραμένα δεδομένα.</p>
<p>Αυτό μπορεί να λυθεί χρησιμοποιώντας μια ισχυρή βιβλιοθήκη ανάλυσης HTML.</p>
<h2 id="ανάλυση-html-χρησιμοποιώντας-το-beautifulsoup">Ανάλυση HTML χρησιμοποιώντας το BeautifulSoup</h2>
<p></p>
<p>Παρόλο που η HTML μοιάζει με την XML<a href="#fn1" class="footnote-ref" id="fnref1"><sup>1</sup></a> και ορισμένες σελίδες έχουν κατασκευαστεί προσεκτικά ώστε να είναι XML, οι περισσότερες σελίδες HTML γενικά περιέχουν σφάλματα τέτοια που αναγκάζουν έναν αναλυτή XML να απορρίψει ολόκληρη τη σελίδα του HTML ως ακατάλληλα σχηματισμένη.</p>
<p>Υπάρχει ένας αριθμός βιβλιοθηκών Python που μπορούν να σας βοηθήσουν να αναλύσετε HTML και να εξαγάγετε δεδομένα από σελίδες. Κάθε μία από αυτές τις βιβλιοθήκες έχει τα δυνατά και τα αδύνατα σημεία της και μπορείτε να επιλέξετε κάποια, με βάση τις ανάγκες σας.</p>
<p>Ως παράδειγμα, θα χρησιμοποιήσουμε τη βιβλιοθήκη <em>BeautifulSoup</em> και απλώς θα αναλύσουμε ορισμένες εισόδους HTML και θα εξαγάγουμε συνδέσμους. Η BeautifulSoup ανέχεται εξαιρετικά ελαττωματικό HTML και εξακολουθεί να σας επιτρέπει να εξαγάγετε εύκολα τα δεδομένα που χρειάζεστε. Μπορείτε να κατεβάσετε και να εγκαταστήσετε τον κώδικα BeautifulSoup από:</p>
<p><a href="https://pypi.python.org/pypi/beautifulsoup4" class="uri">https://pypi.python.org/pypi/beautifulsoup4</a></p>
<p>Πληροφορίες σχετικά με την εγκατάσταση του BeautifulSoup με το εργαλείο ευρετηρίου πακέτων <code>pip</code> της Python είναι διαθέσιμες στη διεύθυνση:</p>
<p><a href="https://packaging.python.org/tutorials/installing-packages/" class="uri">https://packaging.python.org/tutorials/installing-packages/</a></p>
<p>Θα χρησιμοποιήσουμε το <code>urllib</code> για να διαβάσουμε τη σελίδα και στη συνέχεια θα χρησιμοποιήσουμε τη <code>BeautifulSoup</code> για να εξαγάγουμε τα χαρακτηριστικά <code>href</code> από τις ετικέτες αγκύρωσης (<code>a</code>).</p>
<p>  </p>
<pre class="python"><code># Για να το εκτελέσετε, κάντε λήψη του αρχείου zip BeautifulSoup
# από  http://www.py4e.com/code3/bs4.zip
# και αποσυμπιέστε το στον ίδιο κατάλογο με αυτό το αρχείο

import urllib.request, urllib.parse, urllib.error
from bs4 import BeautifulSoup
import ssl

# Αγνόηση των σφαλμάτων πιστοποιητικού SSL
ctx = ssl.create_default_context()
ctx.check_hostname = False
ctx.verify_mode = ssl.CERT_NONE

url = input(&#39;Εισάγετε - &#39;)
html = urllib.request.urlopen(url, context=ctx).read()
soup = BeautifulSoup(html, &#39;html.parser&#39;)

# Ανάκτηση όλων των ετικετών αγκύρωσης
tags = soup(&#39;a&#39;)
for tag in tags:
    print(tag.get(&#39;href&#39;, None))

# Code: http://www.py4e.com/code3/urllinks.py</code></pre>
<p>Το πρόγραμμα ζητά μια διεύθυνση ιστού, στη συνέχεια ανοίγει την ιστοσελίδα, διαβάζει τα δεδομένα και μεταβιβάζει τα δεδομένα στον αναλυτή BeautifulSoup και, στη συνέχεια, ανακτά όλες τις ετικέτες αγκύρωσης και εκτυπώνει το χαρακτηριστικό <code>href</code> για κάθε ετικέτα.</p>
<p>Όταν το πρόγραμμα εκτελείται, παράγει την ακόλουθη έξοδο:</p>
<pre class="{text}"><code>Εισάγετε - https://docs.python.org
genindex.html
py-modindex.html
https://www.python.org/
#
whatsnew/3.6.html
whatsnew/index.html
tutorial/index.html
library/index.html
reference/index.html
using/index.html
howto/index.html
installing/index.html
distributing/index.html
extending/index.html
c-api/index.html
faq/index.html
py-modindex.html
genindex.html
glossary.html
search.html
contents.html
bugs.html
about.html
license.html
copyright.html
download.html
https://docs.python.org/3.8/
https://docs.python.org/3.7/
https://docs.python.org/3.5/
https://docs.python.org/2.7/
https://www.python.org/doc/versions/
https://www.python.org/dev/peps/
https://wiki.python.org/moin/BeginnersGuide
https://wiki.python.org/moin/PythonBooks
https://www.python.org/doc/av/
genindex.html
py-modindex.html
https://www.python.org/
#
copyright.html
https://www.python.org/psf/donations/
bugs.html
http://sphinx.pocoo.org/</code></pre>
<p>Αυτή η λίστα είναι πολύ μεγάλη επειδή ορισμένες ετικέτες αγκύρωσης HTML είναι σχετικές διαδρομές (π.χ. tutorial/index.html) ή αναφορές στη σελίδα (π.χ. ‘#’), που δεν περιλαμβάνουν “http://” ή "https:// », που αποτελούσε απαίτησή μας όταν χρησιμοποιήσαμε κανονική έκφραση.</p>
<p>Μπορείτε επίσης να χρησιμοποιήσετε το BeautifulSoup για να βγάλετε διάφορα μέρη κάθε ετικέτας:</p>
<pre class="python"><code># Για να το εκτελέσετε, κάντε λήψη του αρχείου zip BeautifulSoup
# από  http://www.py4e.com/code3/bs4.zip
# και αποσυμπιέστε το στον ίδιο κατάλογο με αυτό το αρχείο

from urllib.request import urlopen
from bs4 import BeautifulSoup
import ssl

# Αγνόηση των σφαλμάτων πιστοποιητικού SSL
ctx = ssl.create_default_context()
ctx.check_hostname = False
ctx.verify_mode = ssl.CERT_NONE

url = input(&#39;Εισάγετε - &#39;)
html = urlopen(url, context=ctx).read()
soup = BeautifulSoup(html, &quot;html.parser&quot;)

# Ανάκτηση όλων των ετικετών αγκύρωσης
tags = soup(&#39;a&#39;)
for tag in tags:
    # Εξέταση των μερών μιας ετικέτας
    print(&#39;TAG:&#39;, tag)
    print(&#39;URL:&#39;, tag.get(&#39;href&#39;, None))
    print(&#39;Contents:&#39;, tag.contents[0])
    print(&#39;Attrs:&#39;, tag.attrs)

# Code: http://www.py4e.com/code3/urllink2.py</code></pre>
<pre class="{text}"><code>python urllink2.py
Εισάγετε - http://www.dr-chuck.com/page1.htm
TAG: &lt;a href=&quot;http://www.dr-chuck.com/page2.htm&quot;&gt;
Second Page&lt;/a&gt;
URL: http://www.dr-chuck.com/page2.htm
Content: [&#39;\nSecond Page&#39;]
Attrs: [(&#39;href&#39;, &#39;http://www.dr-chuck.com/page2.htm&#39;)]</code></pre>
<p>Το <code>html.parser</code> είναι ο αναλυτής HTML που περιλαμβάνεται στην τυπική βιβλιοθήκη της Python 3. Πληροφορίες για άλλους αναλυτές HTML είναι διαθέσιμες στη διεύθυνση:</p>
<p><a href="http://www.crummy.com/software/BeautifulSoup/bs4/doc/#installing-a-parser" class="uri">http://www.crummy.com/software/BeautifulSoup/bs4/doc/#installing-a-parser</a></p>
<p>Αυτά τα παραδείγματα μόνο ενδεικτικά μας μυούν στη δύναμη της BeautifulSoup για την ανάλυση HTML.</p>
<h2 id="μπόνους-ενότητα-για-χρήστες-unix-linux">Μπόνους ενότητα για χρήστες Unix / Linux</h2>
<p>Εάν διαθέτετε υπολογιστή Linux, Unix ή Macintosh, πιθανότατα διαθέτετε ενσωματωμένες εντολές, στο λειτουργικό σας σύστημα, που ανακτούν τόσο απλό κείμενο όσο και δυαδικά αρχεία, χρησιμοποιώντας τα πρωτόκολλα HTTP ή File Transfer (FTP). Μία από αυτές τις εντολές είναι το <code>curl</code>:</p>
<p></p>
<pre class="bash"><code>$ curl -O http://www.py4e.com/cover.jpg</code></pre>
<p>Η εντολή <code>curl</code> είναι συντομογραφία για το “copy URL” και έτσι τα δύο παραδείγματα που παρατέθηκαν προηγουμένως, για την ανάκτηση δυαδικών αρχείων με χρήση της <code>urllib</code> ονομάζονται έξυπνα <code>curl1.py</code> και <code>curl2.py</code> στο <a href="http://www.gr.py4e.com/code3">www.gr.py4e.com/code3</a>, καθώς υλοποιούν παρόμοια λειτουργικότητα με την εντολή <code>curl</code>. Υπάρχει επίσης ένα δείγμα προγράμματος <code>curl3.py</code>, που κάνει αυτήν την εργασία λίγο πιο αποτελεσματικά, σε περίπτωση που θέλετε πραγματικά να ενσωματώσετε αυτό το μοτίβο σε κάποιο πρόγραμμα που γράφετε.</p>
<p>Μια δεύτερη εντολή που λειτουργεί πολύ παρόμοια είναι η <code>wget</code>:</p>
<p></p>
<pre class="bash"><code>$ wget http://www.py4e.com/cover.jpg</code></pre>
<p>Και οι δύο αυτές εντολές απλοποιούν την ανάκτηση ιστοσελίδων και απομακρυσμένων αρχείων.</p>
<h2 id="γλωσσάριο">Γλωσσάριο</h2>
<dl>
<dt>BeautifulSoup</dt>
<dd>Μια βιβλιοθήκη Python για την ανάλυση εγγράφων HTML και την εξαγωγή δεδομένων από έγγραφα HTML που αντισταθμίζει τις περισσότερες από τις ατέλειες στην HTML, που τα προγράμματα περιήγησης γενικά αγνοούν. Μπορείτε να κατεβάσετε τον κώδικα BeautifulSoup από <a href="http://www.crummy.com">www.crummy.com</a>.
</dd>
<dt>ανίχνευση - spider</dt>
<dd>Η πράξη μιας μηχανής αναζήτησης Ιστού, που ανακτά μια σελίδα και στη συνέχεια όλες τις σελίδες που συνδέονται με τη σελίδα αυτή και ούτω καθεξής μέχρι να έχουν σχεδόν όλες τις σελίδες στο Διαδίκτυο, τις οποίες χρησιμοποιούν για τη δημιουργία του ευρετηρίου αναζήτησής τους.
</dd>
<dt>θύρα - port</dt>
<dd>Ένας αριθμός που γενικά υποδεικνύει με ποια εφαρμογή επικοινωνείτε όταν πραγματοποιείτε σύνδεση υποδοχής σε διακομιστή. Για παράδειγμα, η κυκλοφορία Ιστού χρησιμοποιεί συνήθως τη θύρα 80, ενώ η κυκλοφορία ηλεκτρονικού ταχυδρομείου χρησιμοποιεί τη θύρα 25.
</dd>
<dt>ιστοσυγκομιδή</dt>
<dd>Όταν ένα πρόγραμμα προσποιείται ότι είναι πρόγραμμα περιήγησης ιστού και ανακτά μια ιστοσελίδα και, στη συνέχεια, εξετάζει το περιεχόμενο της ιστοσελίδας. Συχνά τα προγράμματα αυτά ακολουθούν τους συνδέσμους σε μια σελίδα για να βρουν την επόμενη σελίδα, ώστε να μπορούν να διασχίσουν ένα δίκτυο σελίδων ή ένα κοινωνικό δίκτυο.
</dd>
<dt>υποδοχή - socket</dt>
<dd>Μια σύνδεση δικτύου μεταξύ δύο εφαρμογών, όπου οι εφαρμογές μπορούν να στέλνουν και να λαμβάνουν δεδομένα προς οποιαδήποτε κατεύθυνση.
</dd>
</dl>
<h2 id="ασκήσεις">Ασκήσεις</h2>
<p><strong>Άσκηση 1: Αλλάξτε το πρόγραμμα υποδοχής <code>socket1.py</code> ώστε να ζητά από τον χρήστη τη διεύθυνση URL και να μπορεί να διαβάσει οποιαδήποτε ιστοσελίδα. Μπορείτε να χρησιμοποιήσετε το <code>split('/')</code> για να σπάσετε τη διεύθυνση URL στα συστατικά μέρη της, ώστε να μπορέσετε να εξαγάγετε το όνομα του κεντρικού υπολογιστή για την κλήση <code>connect</code> της υποδοχής. Προσθέστε τον έλεγχο σφαλμάτων χρησιμοποιώντας <code>try</code> και <code>except</code> για να χειριστείτε την κατάσταση όπου ο χρήστης εισάγει μια διεύθυνση URL με ακατάλληλη μορφή ή ανύπαρκτη.</strong></p>
<p><strong>Άσκηση 2: Αλλάξτε το πρόγραμμα υποδοχής σας έτσι ώστε να μετράει τον αριθμό των χαρακτήρων που έχει λάβει και να σταματά να εμφανίζει οποιοδήποτε κείμενο όταν εμφανίσει 3000 χαρακτήρες. Το πρόγραμμα θα πρέπει να ανακτήσει ολόκληρο το έγγραφο και να μετρήσει τον συνολικό αριθμό χαρακτήρων και να εμφανίσει τον αριθμό των χαρακτήρων στο τέλος του εγγράφου.</strong></p>
<p><strong>Άσκηση 3: Χρησιμοποιήστε το <code>urllib</code> για να αναπαραγάγετε την προηγούμενη άσκηση ώστε (1) να ανακτά το έγγραφο από μια διεύθυνση URL, (2) να εμφανίζει έως 3000 χαρακτήρες και (3) να μετρά τον συνολικό αριθμό χαρακτήρων στο έγγραφο. Μην ανησυχείτε για τις κεφαλίδες σε αυτήν την άσκηση, απλώς εμφανίστε τους πρώτους 3000 χαρακτήρες του περιεχομένου του εγγράφου.</strong></p>
<p><strong>Άσκηση 4: Αλλάξτε το πρόγραμμα <code>urllinks.py</code> για να εξαγάγετε και να μετρήσετε τις ετικέτες παραγράφου (p) από το ανακτηθέν έγγραφο HTML και να εμφανίσετε την καταμέτρηση των παραγράφων ως έξοδο του προγράμματός σας. Μην εμφανίσετε το κείμενο των παραγράφων, μόνο μετρήστε τις. Δοκιμάστε το πρόγραμμά σας σε πολλές μικρές ιστοσελίδες καθώς και σε ορισμένες μεγαλύτερες ιστοσελίδες.</strong></p>
<p><strong>Άσκηση 5: (Για προχωρημένους) Αλλάξτε το πρόγραμμα υποδοχής έτσι ώστε να εμφανίζει δεδομένα μόνο αφού ληφθούν οι κεφαλίδες και μια κενή γραμμή. Να θυμάστε ότι το <code>recv</code> λαμβάνει χαρακτήρες (νέες γραμμές και όλους), όχι γραμμές.</strong></p>
<section class="footnotes">
<hr />
<ol>
<li id="fn1"><p>Η μορφή XML περιγράφεται στο επόμενο κεφάλαιο.<a href="#fnref1" class="footnote-back">↩</a></p></li>
</ol>
</section>
</body>
</html>
<?php if ( file_exists("../bookfoot.php") ) {
  $HTML_FILE = basename(__FILE__);
  $HTML = ob_get_contents();
  ob_end_clean();
  require_once "../bookfoot.php";
}?>
