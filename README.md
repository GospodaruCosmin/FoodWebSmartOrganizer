Proiect FoSo (Food Web Smart Organizer) realizat de Sarghie Teodor și Gospodaru Cosmin în cadrul materiei Web Technologies.

1. Adresa de suport:

Email: foodapp4suport@gmail.com
Scop: Ajutorarea utilizatorilor care au uitat parola contului. Un email automat pentru schimbarea parolei este trimis de la această adresă către utilizator.

2. Părți ale Proiectului:

User App (FoSo_framework):
Descriere: Aplicația destinată utilizatorilor obișnuiți.
Caracteristici:
Suport pentru import/export JSON.
Export în format PDF (librărie utilizată: dompdf). Pentru funcționalitate completă, trebuie descărcată și adăugată librăria în folderul "app".
Admin App (FoSo_adminApp):
Descriere: Aplicația utilizată de administratorii sistemului.
Funcționalități:
Vizualizare listă de utilizatori (posibilitate de ștergere sau promovare la statut de administrator).
Modificare aspect vizual al aplicației client.
Microservicii:
Descriere: Aplicația user se folosește de microservicii pentru afișarea și livrarea de produse și rețete. Toate cererile sunt direcționate către un API-Gateway, care, în funcție de cerere, face un request către un microserviciu. Scalabilitatea este asigurată prin această arhitectură.
Folosirea API-ului pus la dispoziție de cei de la SPOONACULAR.
Pentru a obține funcționalitate completă în aplicația user, este necesară descărcarea librăriei dompdf și adăugarea folderului "dompdf" în folderul "app".
