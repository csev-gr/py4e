try:
    inp = input('Δώστε Ώρες: ')
    ώρες = float(inp)
    inp = input('Δώστε Ποσό/Ώρα: ')
    ωρομίσθιο = float(inp)
    if ώρες > 40:
        μισθός = ώρες * ωρομίσθιο + (ώρες - 40) * ωρομίσθιο * 1.5
    else:
        μισθός = ώρες * ωρομίσθιο
    print('Μισθός:', μισθός)
except:
    print('Σφάλμα, παρακαλώ δώστε αριθμητική είσοδο')
