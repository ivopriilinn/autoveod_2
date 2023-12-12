Ülesanne "Autoveod"

Veebileht koosneb kolmest vaatest:
  1. Autoveod - tutvustav esileht
  2. Tellimus - siin saab esitada tellimuse sisestades alguspunkti, sihtkoha ja soovitava kuupäeva tellimuse sooritamiseks (valida saab ühte konkreetset päeva, mitte ajavahemikku)
     Vajutades nupul "Kinnita" esitatakse tellimus andmebaasi tabelisse "tellimused".
  3. Juht ja auto - siin saab valida erinevate tellimuste vahel millele on antud unikaalne id number. (Siin on kasutadud ajax-it)
     Valitud tellimuse all kuvatakse "Tellimuse info" kus on kirjas määratud/määramata autojuht (ees- ja perekonnanimi) ja auto (reg nr).
     Lehel on võimalik määrata tellimusele autojuht ja auto (võimalikud variandid asuvad AB tabelites "autod" ja "autojuhid").
     Vajutades nupul "Kinnita tellimus" lisatakse valitud autojuhi ja auto FK tabelisse "tellimused", mille tulemusena ei saa antud autot ja autojuhti rohkem valida (Teistele tellimustele määrata).
     Vajutades nupul "Lõpeta tellimus" vabastatakse valitud tellimusega seotud auto ja autojuht ning neid on jälle võimalik määrata teistele tellimustele. Valitud tellimus ise kustutatakse.

 Andmebaas koosneb kolmest tabelist:
     1. tellimused (autod- ja autojuhid id => FK)
     2. autod
     3. autojuhid
