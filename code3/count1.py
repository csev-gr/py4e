fname = input('Εισαγάγετε το όνομα του αρχείου: ')
try:
    fhand = open(fname)
except:
    print('Δεν είναι δυνατό το άνοιγμα του αρχείου:', fname)
    exit()

πλήθη = dict()
for γραμμή in fhand:
    λέξεις = γραμμή.split()
    for λέξη in λέξεις:
        if λέξη not in πλήθη:
            πλήθη[λέξη] = 1
        else:
            πλήθη[λέξη] += 1

print(πλήθη)
