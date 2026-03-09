# User-registration Laravel Project

##  Adatbázis és Eloquent kapcsolatok

## Funkciók

### 1. Felhasználói autentikáció
    - Felhasználói regisztráció (Register)
    - Bejelentkezés (Login)
    - Kijelentkezés (Logout)
    - Emlékezz rám gomb

### 2. Eszközök kezelése (Tools + Categories + Tags)
- Új eszköz létrehozása, szerkesztése és törlése
- Kategóriákhoz rendelés: egy eszköz több kategóriába is tartozhat (`belongsToMany`)  
- Címkékkel ellátás: egy eszköz több címkével is jelölhető (`belongsToMany`)  
- Leírás és ár hozzááadása

### 3. Keresés (Search)
- Felhasználók keresése név és email alapján  
- A keresés eredménye listázza a felhasználó nevét és email címét

### 4. Adatvédelem (Privacy)
- A projekt tartalmaz egy adatvédelmi tájékoztató oldalt